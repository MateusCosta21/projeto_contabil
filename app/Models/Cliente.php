<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   protected $fillable = [
    'nome',
    'cnpj','razao_social',
    'nome_fantasia','telefone',
    'email','cep','rua','numero',
    'complemento','bairro',
    'cidade','estado'
    ];
}
