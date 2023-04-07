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
}
