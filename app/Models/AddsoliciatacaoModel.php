<?php

namespace App\Models;

use CodeIgniter\Model;

class AddsoliciatacaoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_solicitacoes_sl_usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_usuario',
        'id_salao',
        'nome_salao',
        'qtd_lugar',
        'telefone',
        'dia_actoa_actocao',
        'dia_actoa_actocao_fim',
        'dia_termino_acto',
        'valor_pago',
        'estado_do_processo',
        'dia_ocupado'
    ];

 
}
