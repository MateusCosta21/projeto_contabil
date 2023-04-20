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
    public function edit($id){
        $cliente = Cliente::findOrFail($id);
        return view('clientes.cadastra_cliente', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id){
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            return redirect('clientes')->with('success', 'Cliente atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cliente não pode ser atualizado']);
        }  
    }

    public function delete($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return back()->with('success', 'Registro Deletado');
    }

}
