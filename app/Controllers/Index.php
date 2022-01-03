<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\Usuario_puro;
use App\Models\AddservicoModel;
use App\Models\CadastrarSlModel;

session_start();
class Index extends BaseController  {

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
         $this->userModel=new UserModel();
         $this->connect_usep=new Usuario_puro();
         $this->CadastrarSlModel=new CadastrarSlModel();

        $query = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario ");
        $this->total_servicos = $query->getResultArray();
       }
    //Index
             public function index(){
             
             // $this->validadorDesession();
               if(!empty($_SESSION['id'])&&!empty($_SESSION['nome'])){
                //return redirect()->route('inicio');
                 
                return redirect()->to('/inicio'); 
           }
           $query = $this->CadastrarSlModel->query("SELECT * FROM tb_salao_usuario ");
            $this->total_servicos = $query->getResultArray();
                return view('inicio/index',
                [
                  'salaos'=>$query->getResultArray()
                ]
              );
             }
    

             
    
             public function login(){

              if(!empty($_SESSION['id'])&&!empty($_SESSION['nome'])){
                //return redirect()->route('inicio'); 
               return redirect()->to('/inicio'); 
           }
              //views para login
                return view("inicio/login");
             }
    
    //Increver        
            public function inscreverse(){
                //
              
                if(!empty($_SESSION['id'])&&!empty($_SESSION['nome'])){
                    //return redirect()->route('inicio'); 
                   return redirect()->to('/inicio'); 
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
                if(!empty($_SESSION['id'])&&!empty($_SESSION['nome'])){
                    //return redirect()->route('inicio'); 
                   return redirect()->to('/inicio'); 
               }
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
             return view('inicio/login',[
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
        }
