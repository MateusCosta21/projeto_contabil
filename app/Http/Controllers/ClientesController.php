<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente::get();
        return view('clientes.clientes',['clientes' => $clientes]);
    }
    public function add(Request $request){
        try {
        $cliente = new Cliente();
        $cliente = $cliente->create($request->all());
        return redirect('clientes')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }
}
