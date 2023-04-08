<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestadores extends Model
{
    protected $fillable = ['cpf_cnpj','nome_razao','telefone','dados_bancarios','usuario_id'];

}
