<?php

namespace App\Models;

use CodeIgniter\Model;

class AddservicoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'servicos_salao';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome_servico',
        'preco_servicos',
        'id_usuario',
        'id_salao'
    ];

}
