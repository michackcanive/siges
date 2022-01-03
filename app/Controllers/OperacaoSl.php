<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;
use App\Models\CadastrarSlModel;
use App\Models\AddservicoModel;
use App\Models\AddsoliciatacaoModel; 


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

    public function __construct()
    {   
      $this->CadastrarSlModel=new CadastrarSlModel();
      $this->AddservicoModel=new AddservicoModel();
      $this->AddsoliciatacaoModel=new AddsoliciatacaoModel(); //
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

        /* $this->v_foto1;
           $data['foto2']= $this->v_foto2;
           $data['foto3']= $this->v_foto3;
           $data['id_usuario']= $_SESSION['id'];
           $data['nome_salao']= $this->request->getPost('nome_salao');
           $data['localizacao_sl']= $this->request->getPost('localizacao_sl');
           $data['telefone']= $this->request->getPost('telefone');
           $data['quantidade_de_lugar']= $this->request->getPost('qtd_lugar');
           $data['discricao']= $this->request->getPost('discricao');
           $data['valor_cada_lugar']= $this->request->getPost('preco_cada');
           $data['preco_padrao']= $this->request->getPost('valor_padrao');*/
           

           //$this->CadastrarSlModel->db->inser
          // $data["autor"] = $algumValorDaSessaoPorExemplo;
           //cadastrar_servico
           /*$id=$this->request->getPost('id_solicitado');
           $dado=[
            'valor_pago'=>$this->request->getPost('valor_pago'),
            'estado_do_processo'=>1
        ]; */

        

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

            /*
            iner com a tabela tb_solicitacoes_sl_usuario onde id do salao de ser igual a o id do salao da tabela tb_salao_usuario ,
             feito isto pegasomente  os dados onde o id do usuario é igual ao id da sessão
            
            */


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

    public function detalhes_sl(){
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
          $id=$_GET['id_salao'];
     $query = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario where id= $id ");
     //

            return view('acesso/detalhe_sl',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer'),
                'dados'=>$row = $query->getResultArray()
            ]);
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
