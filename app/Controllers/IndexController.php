<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Usuario_puro;
use Exception;

class IndexController extends BaseController  {

public $erroDupli;
private $usuario;
public $numero;
public $versao;
public $presentacao;
public $referenciaerro;
public $referenciavalor;
public $dados;

public $userModel;
public $connect_usep;

   public function __construct()
   {
     if(!session_id()){
      session_start();
     }
     $this->userModel=new UserModel();
     $this->connect_usep=new Usuario_puro();
   }
//Index
         public function index(){
         
          $this->validadorDesession();
          if(!(!isset($_SESSION['id'])!='')&&!(!isset($_SESSION['name'])!='')){
            redirect('inicio');
       }
            return view('inicio/login');
         }

         public function inicio(){
         $this-> validadorDesession();
            return view('acesso/inicio');
         }
         

         public function login(){
          redirect('inicio');
          $this-> validadorDesession();
          if(!(!isset($_SESSION['id'])!='')&&!(!isset($_SESSION['name'])!='')){
            header('Location:/inicio');  
       }
       $this->request->getPost('email');
           
          if(isset($_GET['login'])){ 
            $this->errologin="Erro, dados incorretos.";
          } 
          //views para login
            return view("inicio/login");
         }

//Increver        
        public function inscreverse(){
            //
            $this-> validadorDesession();
            if(!(!isset($_SESSION['id'])!='')&&!(!isset($_SESSION['name'])!='')){
              header('Location:/inicio');  
         }
            $this->erroDupli="";
            $this->name="";
            $this->email="";
            $this->senha="";
            $this->telefone="";
              // views para criar conta
            return view("inicio/cadastrar");
          }

//registrar
        public function registrar(){
          $this-> validadorDesession();
          $resultado=$this->userModel->where('email' ,  $this->request->getPost('email'))->first();

      if(!empty($resultado)){
        return view('inicio/cadastrar',[
          'mensagem'=>'Usuario já Existente',
          'cor'=>'red',
          'email'=> $this->request->getPost('email'),
          'nome'=>$this->request->getPost('nome'),
          'telefone'=>$this->request->getPost('telefone')
         ]);
      }
       if($this->userModel->save($this->request->getPost())){
        $nome= explode(' ',$this->request->getPost('nome'));
         return view('inicio/cadastrar',[
          'mensagem'=>'Parabéns Pelos Seu cadastro Sr.'.$nome[0],
          'cor'=>'#44ec52',
          
         ]);
         echo"Sucesso";
       }else{
         echo"erro";
        return view('inicio/cadastrar',[
          'mensagem'=>'Erro no cadatramento',
          'cor'=>'red',
          'email'=> $this->request->getPost('email'),
          'nome'=>$this->request->getPost('nome'),
          'telefone'=>$this->request->getPost('telefone')
         ]);
       }
         }
//Cadastro
public function cadastro(){

            $this->erroDupli="";
            $this->name="";
            $this->email="";
            $this->senha="";
            $this->telefone="";

            // views para agadecer
           // $this->render("cadastro","layout_inicio");
          }

  public function validadorDesession(){
            if(empty($_SESSION['id'])&&empty($_SESSION['nome'])){
              header('Location:/?process=erro');  
            }else{
              header('Location:/inicio');
            }
               
       }
  public function sair(){
        $this->destroiSission();             
   }
   public function destroiSission(){   
    session_start();
    session_destroy();
    header('Location:/login');        
}
   



    }
      
    ?>
