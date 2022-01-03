<?php

namespace App\Models;

use CodeIgniter\Model;

class CadastrarSlModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_salao_usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'foto1',
        'foto2',
        'foto3',
        'id_usuario',
        'nome_salao',
        'localizacao_sl',
        'telefone',
        'quantidade_de_lugar',
        'discricao',
        'valor_cada_lugar',
        'preco_padrao'
        
    ];


}
