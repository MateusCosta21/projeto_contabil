<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assunto extends Model
{
    protected $fillable = ['usuario_id','titulo','status'];
}
