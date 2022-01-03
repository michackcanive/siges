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

        $resulta='';
       if($this->ordena_foto()){

         $data['foto1']= $this->v_foto1;
           $data['foto2']= $this->v_foto2;
           $data['foto3']= $this->v_foto3;
           $data['id_usuario']= $_SESSION['id'];
           $data['nome_salao']= $this->request->getPost('nome_salao');
           $data['localizacao_sl']= $this->request->getPost('localizacao_sl');
           $data['telefone']= $this->request->getPost('telefone');
           $data['quantidade_de_lugar']= $this->request->getPost('qtd_lugar');
           $data['discricao']= $this->request->getPost('discricao');
           $data['valor_cada_lugar']= $this->request->getPost('preco_cada');
           $data['preco_padrao']= $this->request->getPost('valor_padrao');


           //$this->CadastrarSlModel->db->inser
          // $data["autor"] = $algumValorDaSessaoPorExemplo;
           //cadastrar_servico
           
           

        if($this->CadastrarSlModel->save($this->request->getPost())){
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
    // $this->AddsoliciatacaoModel->insert('associar_servicos_salao');
    }
    public function detalhes_sl(){
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
            return redirect()->route('login');
          }
          $id=$_GET['id_salao'];
     $query = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario where id= $id");
     //

            return view('acesso/detalhe_sl',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer'),
                'dados'=>$row = $query->getResultArray()
            ]);
    }
    ///////////////////////////////////////////////////////////////////////////
    public function   cadastrar_servicos(){
        // abrir os campos para cadastrar
        if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
           return redirect()->route('login');
         }
           return view('acesso/cadastrar_servicos',[
               'header'=>view('acesso/header'),
               'footer'=>view('acesso/footer')
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

    private  function ordena_foto():bool{
        try{
            $fotosPermitidos=array("png","jpg","jpeg");
            // Verificando se existe a pasta do cliente
     if(is_dir('assets/img/usuarios/'.$_SESSION['id'])){
        
        // Verificando se existe o arquivo
                    $troca1=1;
                    $troca2=2;
                    $troca3=3;
                    $extencao1=".".pathinfo($this->v_foto1['foto1']['name'],PATHINFO_EXTENSION);
                    $extencao2=".".pathinfo($this->v_foto2['foto2']['name'],PATHINFO_EXTENSION);
                    $extencao3=".".pathinfo($this->v_foto3['foto3']['name'],PATHINFO_EXTENSION);
                    $novonome1=$troca1.$extencao1;
                    $novonome2=$troca2.$extencao2;
                    $novonome3=$troca3.$extencao3;

    while(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome1)|| file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome2)|| file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome3)){ 
                        if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome1))
                             $troca1++;
                        if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome2))
                             $troca2++;
                             if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome3))
                             $troca3++;

                    $novonome1=$troca1.$extencao1;
                    $novonome2=$troca2.$extencao2;
                    $novonome3=$troca3.$extencao3;
                }
                    move_uploaded_file($this->v_foto1['foto1']['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome1);
                    $this->v_foto1=$_SESSION['id'].'/'.$novonome1;

                    move_uploaded_file($this->v_foto2['foto2']['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome2);
                    $this->v_foto2=$_SESSION['id'].'/'.$novonome2;

                    move_uploaded_file($this->v_foto3['foto3']['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome3);
                    $this->v_foto3=$_SESSION['id'].'/'.$novonome3;
            }else{
                mkdir('assets/img/usuarios/'.$_SESSION['id'],0764,true);
                    $this->ordena_foto();
                }
                    return true;

        }catch(Exception $erro){
            return true;
        }
        return true;
       
}

}
