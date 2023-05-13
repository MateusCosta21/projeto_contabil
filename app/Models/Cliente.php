<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   protected $fillable = [
    'nome',
    'cnpj', 'tipo', 'cpf', 'cnpj_cpf','razao_social',
    'nome_fantasia','telefone',
    'email','cep','rua','numero',
    'complemento','bairro',
    'cidade','estado', 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
