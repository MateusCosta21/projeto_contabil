<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historico extends Model
{
    use HasFactory;

    protected $fillable = ['objeto_id',
    'usuario_id', 'status'
];


    public function tipo()
    {
        return $this->belongsTo(TipoObjeto::class, 'tipo_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function objeto()
    {
        return $this->belongsTo(Objetos::class, 'objeto_id');
    }

}
