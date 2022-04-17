<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $table      = 'carrinho';
    protected $primaryKey = 'id';

    protected $fillable   = [
        'id_produto',
        'nome_produto',
        'valor_produto',
        'qtd_produto',
        'valor_total_compra',
        'ip_usuario'
    ];
    
}
