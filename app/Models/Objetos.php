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
        'observacao', 'data_envio',
        'data_limite', 'op_envio', 'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function tipo()
    {
        return $this->belongsTo(TipoObjeto::class, 'tipo_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
