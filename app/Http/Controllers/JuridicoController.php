<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\assunto;


class JuridicoController extends Controller
{
    public function index(){
        $assuntos = assunto::get();
        return view('juridico.assuntos',compact('assuntos'));
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

    public function edit($id){
        $assunto = assunto::findOrFail($id);
        return view('juridico.cadastra_assuntos', ['assunto' => $assunto]);
    }

    public function update(Request $request, $id){
        try {
            $assunto = assunto::findOrFail($id);
            $assunto->update($request->all());
            return redirect()->route('assuntos_juridicos')->with('success', 'Assunto atualizado');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Assunto não pode ser atualizado']);
        }  
    }
}
