<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Debug\Toolbar\Collectors\BaseCollector;

class Usuarios extends BaseCollector{
    private $userModel;
    public function __construct()
    {
        $this->userModel=new UserModel();
    }
    
    public function __get($atributos)
{
          return $this->$atributos;
}
public function __set($atributos, $value )
{
          $this->$atributos=$value;
}
    public function index(){
        //enviando dados para a views
        return view('users',[
            'users'=>$this->userModel->findAll()
        ]);

    }
    
}