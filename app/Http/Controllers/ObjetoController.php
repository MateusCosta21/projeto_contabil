<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetos;


class ObjetoController extends Controller
{
    
    public function add(Request $request){
        try {
   
        $objeto = new Objetos();
        $objeto = $objeto->create($request->all());
        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }
}
