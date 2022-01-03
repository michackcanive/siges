<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;
use CodeIgniter\Database\Query;


class Usuario_puro extends Model
{

public $telefone;
public $email;
public $nome;
public $id;
public $senha;
public $userModel;


    public function __get($atributos)
{
          return $this->$atributos;
}
public function __set($atributos, $value )
{
          $this->$atributos=$value;
}

    // VERIFICAR EMAIL DO UTILIZADOR 
    public function autenticarDado(){
        //$this->help=new Help();
        $this->userModel=new UserModel();
        $todas_codicoes  =  array( 'email'  =>  $this->__get('email') , 'senha'  => $this->__get('senha')); 
             return   $data = $this->userModel->where($todas_codicoes)->first();
        $sql = "SELECT * FROM tb_usuarios WHERE  email=?";
        $this->db->query($sql, array($this->__get('email')));

    }



}
