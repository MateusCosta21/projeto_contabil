<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestadores;


class PrestadoresController extends Controller
{
    public function index(){
        $prestadores = Prestadores::get();
        return view('prestadores.prestadores',['prestadores' => $prestadores]);
    }
    public function new(){
        return view('prestadores.cadastra_prestador');
    }


    public function add(Request $request){
        try {
   
        $prestador = new Prestadores();
        $prestador = $prestador->create($request->all());
        return redirect()->route('prestadores')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }

    public function edit($id){
        $prestadores = Prestadores::findOrFail($id);
        return view('prestadores.cadastra_prestador', ['prestadores' => $prestadores]);
    }

    public function update(Request $request, $id){
        try {
            $prestadores = Prestadores::findOrFail($id);
            $prestadores->update($request->all());
            return redirect()->route('prestadores')->with('success', 'Cadastro atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cliente não pode ser atualizado']);
        }  
    }

    public function delete($id){
        $prestadores = Prestadores::findOrFail($id);      
        $prestadores->delete();
        return redirect()->route('prestadores')->with('success', 'Registro deletado');
    }


}

                  //cpf_cnpj,nome_razao,telefone,dados_bancarios

