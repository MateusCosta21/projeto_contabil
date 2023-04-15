<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetos;


class ObjetoController extends Controller
{

    public function add(Request $request)
    {
        try {

            $objeto = new Objetos();
            $objeto = $objeto->create($request->all());
            return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }
    public function enviaRota(Request $request)
    {
        $objetoId = $request->input('objeto_id');
        $status = 'Em rota'; // Defina o novo status aqui

        $objeto = Objetos::find($objetoId);
        $objeto->status = $status;
        $objeto->save();

        return redirect()->back()->with('success', 'Objeto atualizado com sucesso.'); // Redireciona de volta para a página anterior com uma mensagem de sucesso
    }

    public function delete($id){
        $objeto = Objetos::findOrFail($id);      
        $objeto->delete();
        return redirect()->back()->with('success', 'Objeto excluído com sucesso.'); 
    }
}
