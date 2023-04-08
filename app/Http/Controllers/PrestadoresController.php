<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestadores;


class PrestadoresController extends Controller
{
    public function index(){
        return view('prestadores.prestadores');
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
            dd($e);
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }

}

                  //cpf_cnpj,nome_razao,telefone,dados_bancarios

