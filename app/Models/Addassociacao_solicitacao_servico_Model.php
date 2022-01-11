<?php

namespace App\Models;

use CodeIgniter\Model;

class Addassociacao_solicitacao_servico_Model extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_associacao_solicitaco_servicos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_usuario',
        'id_solicitacoa_salao',
        'id_usuario_operacao',
        'id_salao',
        'id_servico'
    ];

}
