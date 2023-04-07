<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoObjeto;

class TiposObjetoController extends Controller
{
    public function index(){
        $tipoObjetos = TipoObjeto::get();
        return view('tiposobjetos.tipo',['tipo_objeto' => $tipoObjetos]);
    }

    public function new(){
        return view('tiposobjetos.cadastra_tipo');
    }
    public function add(Request $request){
        try {
        $tipoObjeto = new TipoObjeto();
        $tipoObjeto = $tipoObjeto->create($request->all());
        return redirect()->route('tipo_objeto')->with('success', 'Cadastro realizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }

    }
    public function edit($id){
        $tipoObjeto = TipoObjeto::findOrFail($id);
        return view('tiposobjetos.cadastra_tipo', ['tipo_objeto' => $tipoObjeto]);
    }

    public function update(Request $request, $id){
        try {
            $tipoObjeto = TipoObjeto::findOrFail($id);
            $tipoObjeto->update($request->all());
            return redirect()->route('tipo_objeto')->with('success', 'Cadastro atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cliente não pode ser atualizado']);
        }  
    }
    public function delete($id){
        $tipoObjeto = TipoObjeto::findOrFail($id);
        $tipoObjeto->delete();
        return redirect()->route('tipo_objeto')->with('success', 'Registro deletado');
    }
}
