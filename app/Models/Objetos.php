<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetos extends Model
{
    protected $fillable = [
        'usuario_id', 'tipo_id',
        'cliente_id',
        'descricao',
        'observacao','data_envio',
        'data_limite','op_envio','status'
        ];
    
}
