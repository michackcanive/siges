<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use Exception;
use App\Models\CadastrarSlModel;
use App\Models\AddservicoModel;
use App\Models\UserModel;
use App\Models\AddsoliciatacaoModel;
use App\Models\Addassociacao_solicitacao_servico_Model;
use Cezpdf;
use Dompdf;
use Dompdf\Dompdf as DompdfDompdf;

session_start();


class OperacaoSl extends BaseController
{

    public $v_foto1;
    public $v_foto2;
    public $v_foto3;
    public $teste_foto;
    public $total_servicos;
    public $CadastrarSlModel;
    public $AddsoliciatacaoModel;
    public $userModel;
    public $Addassociacao_solicitacao_servico_Model;

    public function __construct()
    {   
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
          
      $this->CadastrarSlModel=new CadastrarSlModel();
      $this->AddservicoModel=new AddservicoModel();
      $this->Addassociacao_solicitacao_servico_Model =new Addassociacao_solicitacao_servico_Model();
      $this->AddsoliciatacaoModel=new AddsoliciatacaoModel();
      $id=$_SESSION['id'];
        $query = $this->AddservicoModel->query("SELECT * FROM servicos_salao where id_usuario= $id");
        $this->total_servicos = $query->getResultArray();
    }

    public function cadastrar_sl()
    {
        //
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
            return view('acesso/cadastrar_sl',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer')
            ]);
    }

    /*function htmlToPDF(){
        
        $dompdf->loadHtml(view('pdf_view'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }*/

    function SIGEPDF(){
        //Cpdf
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('gestao_reservas');
          }
          //result
          $id=$_GET['ped'];
          if(empty($id)){
            return redirect()->route('login');
          }
          $query = $this->AddsoliciatacaoModel->query("SELECT * FROM tb_solicitacoes_sl_usuario where id= $id");
          $row = $query->getResultArray();
        
          include_once 'pdf/Cezpdf.php';
        
          // Initialize a ROS PDF class object using DIN-A4, with background color gray
          $pdf = new Cezpdf('a4','portrait');
          // Set pdf Bleedbox
          $pdf->ezSetMargins(20,20,20,20);
          // Use one of the pdf core fonts
          $mainFont = 'Times-Roman';
          // Select the font
          $pdf->selectFont($mainFont);
          // Define the font size
          $size=12;
          // Modified to use the local file if it can
          $pdf->openHere('Fit');
          
          // Output some colored text by using text directives and justify it to the right of the document
          $pdf->ezText(view('pdf_view',['dado'=>$row]), $size, ['justification'=>'left']);
          // Output the pdf as stream, but uncompress
          $pdf->ezStream(['compress'=>0]);

        $this->output = $pdf->ezOutput(true);

        $this->savePdf(__FUNCTION__ . '.pdf');

        // reference the Dompdf namespace



      

     
    }
    /**
     * save the pdf output into a file
     */
    private function savePdf($filename)
    {
        file_put_contents($this->outDir . '/' . $filename, $this->output);
    }



    public function criar_sl(){
       
        //var_dump($_POST);

        $this->v_foto1=$_FILES['foto1'];
        $this->v_foto2=$_FILES['foto2'];
        $this->v_foto3=$_FILES['foto3'];
            $tdr=$this->v_foto1??'';
           
        $resulta='';
        $this->teste_foto= $this->ordena_foto();
       
       if(1){
         $data=[
            'foto1'=>$this->v_foto1,
            'foto2'=>$this->v_foto2,
            'foto3'=>$this->v_foto3,
            'id_usuario'=>$_SESSION['id'],
            'nome_salao'=>$this->request->getPost('nome_salao'),
            'localizacao_sl'=>$this->request->getPost('localizacao_sl'),
            'telefone'=>$this->request->getPost('telefone'),
            'quantidade_de_lugar'=>$this->request->getPost('quantidade_de_lugar'),
            'discricao'=> $this->request->getPost('discricao'),
            'valor_cada_lugar'=>$this->request->getPost('valor_cada_lugar'),
            'preco_padrao'=>$this->request->getPost('preco_padrao')
         ];
        if($this->CadastrarSlModel->insert($data)){
            return view('acesso/cadastrar_sl',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer')
            ]);
        }
       }else{
        echo"Erro !";
       }
    }

    public function pagar_salao(){
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
          $id=$this->request->getPost('id_solicitado');
    $dado=[
        'valor_pago'=>$this->request->getPost('valor_pago'),
        'estado_do_processo'=>1
    ];   
        if($this->AddsoliciatacaoModel->update($id,$dado)){
         echo"OK";
    }else{
        echo"Erro no seu pagamento";
    }
}

public function liberar_espaco(){
    if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
        return redirect()->route('login');
      }
      $id=$this->request->getPost('id_solicitacao');
$dado=[
    'dia_ocupado'=>$this->request->getPost('dia_ocupado'),
    'estado_do_processo'=>2
];   
    if($this->AddsoliciatacaoModel->update($id,$dado)){
     echo"OK";
}else{
    echo"Erro no seu pagamento";
}
}
    public function listar_reservas_no_pagas(){
        if($_SESSION['tipo_de_conta_init']=='Admin'){

            $id=$_SESSION['id'];
            $query = $this->AddservicoModel->query("SELECT 
            tb_solicitacoes_sl_usuario.*,tb_salao_usuario.nome_salao
            FROM  
            tb_solicitacoes_sl_usuario 
            INNER JOIN 
            tb_salao_usuario 
            ON tb_solicitacoes_sl_usuario.id_salao  =  tb_salao_usuario.id
             WHERE tb_salao_usuario.id_usuario = $id  and tb_solicitacoes_sl_usuario.estado_do_processo=0  ORDER BY tb_solicitacoes_sl_usuario.id");

        return view('acesso/listar_reservas_no_pagas',[
            'header'=>view('acesso/header'),
            'footer'=>view('acesso/footer'),
            'dados'=>$row = $query->getResultArray()
        ]);

    }else{
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
    }
}

    public function listar_reservas_pagas(){
        if($_SESSION['tipo_de_conta_init']=='Admin'){
                 //result
    
     $id=$_SESSION['id'];
     $query = $this->AddservicoModel->query("SELECT 
     tb_solicitacoes_sl_usuario.*,tb_salao_usuario.nome_salao
     FROM  
     tb_solicitacoes_sl_usuario 
     INNER JOIN 
     tb_salao_usuario 
     ON tb_solicitacoes_sl_usuario.id_salao  =  tb_salao_usuario.id
      WHERE tb_salao_usuario.id_usuario = $id  and tb_solicitacoes_sl_usuario.estado_do_processo>=1  ORDER BY tb_solicitacoes_sl_usuario.id");

     //$row = $query->getResultArray()
        return view('acesso/listar_reservas_pagas',[
            'header'=>view('acesso/header'),
            'footer'=>view('acesso/footer'),
            'dados'=>$row = $query->getResultArray()
        ]);
    }
    else{
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
    }
    } 


    public function detalhes_sl_add_servico(){
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }

    $id_salao=$_GET['id_salao'];
    $query_ser = $this->AddservicoModel->query("SELECT * FROM servicos_salao where id_salao= $id_salao ");
     
     $query_tb_salao_usuario = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario where id= $id_salao ");

     $id_solicitacao=$_GET['id_solicitacao'];
     $query = $this->AddsoliciatacaoModel->query("SELECT * FROM tb_solicitacoes_sl_usuario where id= $id_solicitacao ");

     //

     if($_SESSION['tipo_de_conta_init']=='Admin'){ 

            return view('acesso/detalhe_sl_admin',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer'),
                'dados_salao'=>$row = $query_tb_salao_usuario->getResultArray(),
                'dados'=>$row = $query->getResultArray(),
                'servicos'=>$row = $query_ser->getResultArray()
            ]);
        }else{
            return view('acesso/detalhe_sl',[
                'header'=>view('acesso/header_clit'),
                'footer'=>view('acesso/footer'),
                'dados_salao'=>$row = $query_tb_salao_usuario->getResultArray(),
                'dados'=>$row = $query->getResultArray(),
                'servicos'=>$row = $query_ser->getResultArray()
            ]);

        }
    }

    public function detalhes_sl(){
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }

          $id=$_GET['id_salao'];
          $queryser = $this->AddservicoModel->query("SELECT * FROM servicos_salao where id_salao= $id ");
     

          $id=$_GET['id_salao'];
     $query = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario where id= $id ");

     //

     if($_SESSION['tipo_de_conta_init']=='Admin'){ 

            return view('acesso/detalhe_sl_admin',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer'),
                'dados'=>$row = $query->getResultArray(),
                'servicos'=>$row = $queryser->getResultArray()
            ]);
        }else{
            return view('acesso/detalhe_sl_ver_mais',[
                'header'=>view('acesso/header_clit'),
                'footer'=>view('acesso/footer'),
                'dados'=>$row = $query->getResultArray(),
                'servicos'=>$queryser->getResultArray()
            ]);

        }
    }
    public function   add_servico_salao_solicitado(){
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }

            $id_solicitacao=$this->request->getPost('id_solicitacao');
            $id_servico=$this->request->getPost('id_servico');
   $query = $this->AddsoliciatacaoModel->query("SELECT * FROM tb_associacao_solicitaco_servicos where id_solicitacoa_salao= $id_solicitacao ");

                if(!empty($row = $query->getResultArray())){
                    echo"Este serviço já foi adicionado !";
                    return ;
                }

                $dado=[
                    'id_servico'=>$this->request->getPost('id_servico'),
                    'id_solicitacoa_salao'=>$this->request->getPost('id_solicitacao'),
                    'id_usuario_operacao'=>$_SESSION['id'],
                    'id_salao'=>$this->request->getPost('id_salao')
                ];

          if($this->Addassociacao_solicitacao_servico_Model->save($dado)){

            $id_solicitacao=$this->request->getPost('id_solicitacao');

            $dado=[
                'valor_pago'=>$this->request->getPost('valor_pago'),
            ];  
                if($this->AddsoliciatacaoModel->update($id_solicitacao,$dado)){
                     echo"OK";
            return ;
            }
            echo"ERROoo";
            return ;
       }else{
        echo"Erro na Reserva";
        return;
       }

          $_SESSION['servicos_add_t']=$_SESSION['servicos_add']??''.$this->request->getPost('id_servico_add');
    }
    ///////////////////////////////////////////////////////////////////////////
    public function   cadastrar_servicos(){
        // abrir os campos para cadastrar v id_salao
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
           return redirect()->route('login');
         }

        $id=$_SESSION['id'];
        $query = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario where id_usuario= $id");

           return view('acesso/cadastrar_servicos',[
               'header'=>view('acesso/header'),
               'footer'=>view('acesso/footer'),
               'dados'=>$row = $query->getResultArray()
           ]);
   }

   public function   solicitar_salao(){
    // abrir os campos para cadastrar
    if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
       return redirect()->route('login');
     }

    /* $this->CadastrarSlModel->set('id_servicos', $this->request->getPost('id_servicos'), FALSE);
     $this->CadastrarSlModel->set('id_usuario', $_SESSION['id'], FALSE);
     $this->CadastrarSlModel->set('id_salao', $this->request->getPost('id_salao'), FALSE);
    // $this->CadastrarSlModel->where('id_salao', 2);
    // $this->CadastrarSlModel->update('mytable');
     $this->CadastrarSlModel->insert('associar_servicos_salao');
     echo"viva";*/

     
        $todas_codicoes  =  array( 'dia_actoa_actocao'  => $this->request->getPost('dia_actoa_actocao'));
        $data = $this->AddsoliciatacaoModel->where($todas_codicoes)->first();
        if(!empty($data)){
                echo"EXISTE";
                return;
        } 

     if($this->AddsoliciatacaoModel->save($this->request->getPost())){
        echo"OK";
        return ;
   }else{
    echo"Erro na Reserva";
    return;
   }

     return;
}
   public function   gestao_servicos(){
    // abrir os campos para cadastrar
   
    if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
       return redirect()->route('login');
     }
     //result
     $id=$_SESSION['id'];
     $query = $this->AddservicoModel->query("SELECT * FROM servicos_salao where id_usuario= $id");
     //$row = $query->getResultArray()
     
       return view('acesso/listar_servicos',[
           'header'=>view('acesso/header'),
           'footer'=>view('acesso/footer'),
           'dados'=>$row = $query->getResultArray()

       ]);
}

public function eliminar(){
    if($this->AddservicoModel->delete($this->request->getPost('id'))){
        echo"OK";
        return ;
   }else{
    echo"Erro no eliminação";
    return;
   }
}





public function gestao_reservas(){
    if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
        return redirect()->route('login');
      }
      //result
      $id=$_SESSION['id'];
      $query = $this->AddsoliciatacaoModel->query("SELECT * FROM tb_solicitacoes_sl_usuario where id_usuario = $id");
      
        return view('acesso/listar_reservas',[
            'header'=>view('acesso/header_clit'),
            'footer'=>view('acesso/footer'),
            'dados'=>$row = $query->getResultArray()
 
        ]);
}

   public function criar_servicos(){

       if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
           return redirect()->route('login');
         }

         if($this->AddservicoModel->save($this->request->getPost())){
            return redirect()->to('operacaosl/gestao_servicos');
          
       }
   }

    private  function ordena_foto(){
  
        try{

      
            $fotosPermitidos=array("png","jpg","jpeg");
            // Verificando se existe a pasta do cliente
     if(is_dir('assets/img/usuarios/'.$_SESSION['id'])){
        
        // Verificando se existe o arquivo
                    $troca1= "1".$_SESSION['id'].$segundo=date('s').date('Y');
                    $troca2="2".$_SESSION['id'].$segundo=date('s').date('Y');
                    $troca3="3".$_SESSION['id'].$segundo=date('s').date('Y');
                    $extencao1=".".pathinfo($this->v_foto1['name'],PATHINFO_EXTENSION);
                    $extencao2=".".pathinfo($this->v_foto2['name'],PATHINFO_EXTENSION);
                    $extencao3=".".pathinfo($this->v_foto3['name'],PATHINFO_EXTENSION);
                    $novonome1=$troca1.$extencao1;
                    $novonome2=$troca2.$extencao2;
                    $novonome3=$troca3.$extencao3;
                    

   // while(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome1)|| file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome2)){ 
                        if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome1))
                             $troca1.date('s');
                        if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome2))
                             $troca2.date('s');
                             if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome3))
                             $troca3.date('s');
                            

                    $novonome1=$troca1.$extencao1;
                    $novonome2=$troca2.$extencao2;
                    $novonome3=$troca3.$extencao3;
                   
      //          }
                    move_uploaded_file($this->v_foto1['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome1);
                    $this->v_foto1=$_SESSION['id'].'/'.$novonome1;
              

                    move_uploaded_file($this->v_foto2['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome2);
                    $this->v_foto2=$_SESSION['id'].'/'.$novonome2;

                    move_uploaded_file($this->v_foto3['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome3);
                    $this->v_foto3=$_SESSION['id'].'/'.$novonome3;


                  
            }else{
                mkdir('assets/img/usuarios/'.$_SESSION['id'],0764,true);
                    $this->ordena_foto();
                }
                return true;

            }catch(Exception $e){
                    return $e;
            }
       
}

}
