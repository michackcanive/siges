<?php
namespace App\Controllers;
use App\Models\Usuario_puro;
use App\Models\UserModel;


class AuthController  extends BaseController  {

public $connect_usuario_p;

public function autenticar(){
  if(!session_id()){
    session_start();
   }

   //$this->session=new Session();
   //$this->help=new Help();
   $this->connect_usuario_p=new Usuario_puro();

      $this->connect_usuario_p->__set('email', $this->request->getPost('email'));
      $this->connect_usuario_p->__set('senha', $this->request->getPost('senha'));
      $resposta=$this->connect_usuario_p->autenticarDado();

    if(!empty($resposta['id'])&&!empty($resposta['email'])){ 
      if($resposta['senha']==$this->request->getPost('senha')){

    $_SESSION['id']=$resposta['id'];
    $_SESSION['nome']=$resposta['nome'];
    $_SESSION['email']=$resposta['email'];
    $_SESSION['tipo_de_conta']=$resposta['tipo_acesso'];
    $_SESSION['tipo_de_conta_init']=$this->request->getPost('tipo_de_acesso');
    $id=$_SESSION['id'];
       

   // return redirect()->route('login');
   return redirect()->to('/inicio'); 

      }else {
        return view('inicio/login',[
          'mensagem'=>'Dados Incorretos',
          'cor'=>'red'
        ]);
      }

    }else {
      return view('inicio/login',[
        'mensagem'=>'Dados invalidos',
        'cor'=>'red'
      ]);
    }   
  }
}
