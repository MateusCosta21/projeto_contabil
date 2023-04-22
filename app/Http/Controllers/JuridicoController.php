<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\assunto;


class JuridicoController extends Controller
{
    public function index(){
        return view('juridico.assuntos');
    }
    public function new(){
        return view('juridico.cadastra_assuntos');
    }

    public function add(Request $request){
        try {
        $assunto = new assunto();
        $assunto = $assunto->create($request->all());
        return redirect()->route('assuntos_juridicos')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }
}
