<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CadastrarSlModel;
session_start();
class Inicio extends BaseController
{

    public $carregar_view='';
    public $v_foto1;
    public $v_foto2;
    public $CadastrarSlModel;
 
    public function __construct()
    {
        $this->CadastrarSlModel=new CadastrarSlModel();
    }
public function index()
    {
       if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
        return redirect()->route('login');
      }

      if(!empty($_SESSION['tipo_de_conta_init'])){
        if($_SESSION['tipo_de_conta_init']=='Admin'){ 
            // ADMINS

           
            $id=$_SESSION['id'];
            $query = $this->CadastrarSlModel->query("SELECT 
            tb_salao_usuario.*,tb_usuarios.nome
            FROM  
            tb_salao_usuario 
            INNER JOIN 
            tb_usuarios 
            ON tb_salao_usuario.id_usuario  =  tb_usuarios.id
             WHERE tb_usuarios.id = $id  ORDER BY tb_salao_usuario.id");

            return view('acesso/inicio',[
                'header'=>view('acesso/header'),
                'footer'=>view('acesso/footer'),
                'dados'=>$row = $query->getResultArray()
                
            ]);
        }
    }
    // CLIENTES


  $id=$_SESSION['id'];
    $query = $this->CadastrarSlModel->query("SELECT 
    tb_salao_usuario.*,tb_usuarios.nome
    FROM  
    tb_salao_usuario 
    INNER JOIN 
    tb_usuarios 
    ON tb_salao_usuario.id_usuario =  tb_usuarios.id
     WHERE tb_usuarios.id != $id  ORDER BY tb_salao_usuario.id");
     

  
    return view('acesso/inicio_clit',[
        'header'=>view('acesso/header_clit'),
        'footer'=>view('acesso/footer'),
        'dados'=>$row = $query->getResultArray()
        
    ]);
}

public function sair(){$this->destroiSission();return redirect()->route('login');}

public function destroiSission(){session_destroy();}

    private  function ordena_foto():bool{
        $fotosPermitidos=array("png","jpg","jpeg");
            // Verificando se existe a pasta do cliente
     if(is_dir('assets/img/usuarios/'.$_SESSION['id'])){
        
        // Verificando se existe o arquivo
                    $troca1=1;
                    $troca2=2;
                    $extencao1=".".pathinfo($this->v_foto1['foto1']['name'],PATHINFO_EXTENSION);
                    $extencao2=".".pathinfo($this->v_foto1['foto2']['name'],PATHINFO_EXTENSION);
                    $novonome1=$troca1.$extencao1;
                    $novonome2=$troca2.$extencao2;

    while(file_exists(base_url().'assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome1)|| file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome2)){ 
                        if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome1))
                             $troca1++;
                        if(file_exists('assets/img/usuarios/'.$_SESSION['id'].'/'. $novonome2))
                             $troca2++;

                    $novonome1=$troca1.$extencao1;
                    $novonome2=$troca2.$extencao2;


                }
                
                    move_uploaded_file($this->v_foto1['foto1']['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome1);
                    $this->v_foto1=$_SESSION['id'].'/'.$novonome1;

                    move_uploaded_file($this->v_foto2['foto2']['tmp_name'],
                    'assets/img/usuarios/'.$_SESSION['id'].'/'.$novonome2);

                    $this->v_foto2=$_SESSION['id'].'/'.$novonome2;

            }else{
                mkdir('assets/img/usuarios/'.$_SESSION['id'],0764,true);
                    $this->ordena_foto();

            };

    return true;
}

}
