<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuridicoController extends Controller
{
    public function index(){
        return view('juridico.assuntos');
    }
    public function new(){
        return view('juridico.cadastra_assuntos');
    }
}
