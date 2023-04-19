<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsuariosController extends Controller
{
    public function add(Request $request){
        try {
            $usuario = new User();
            $usuario = $usuario->create($request->all());
            $request->session()->flash('success', 'Usuário cadastrado com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            $request->session()->flash('error', 'Cadastro não pode ser realizado');
            return redirect()->back()->withInput();
        }
    }
}    
