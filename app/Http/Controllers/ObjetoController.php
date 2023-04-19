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
        $status = 'Em Rota'; // Defina o novo status aqui

        $objeto = Objetos::find($objetoId);
        $objeto->status = $status;
        $objeto->save();

        return redirect()->back()->with('success', 'Objeto atualizado com sucesso.'); // Redireciona de volta para a página anterior com uma mensagem de sucesso
    }

    public function finaliza_processo()
    {
        $status = request('statusSelect');
        $objeto = Objetos::find(request('objeto_id'));
    
        if ($status == 1) {
            $objeto->status = 'No condominio/Cliente';
        } elseif ($status == 2) {
            $objeto->status = 'Entregue';
        }
    
        $objeto->save();
    
        // redireciona o usuário para alguma página de sucesso
        return redirect()->back()->with('success', 'Objeto atualizado com sucesso.'); // Redireciona de volta para a página anterior com uma mensagem de sucesso
    }

    public function retorna_processo()
    {
        $status = request('statusSelect');
        $dataEnvio = request('data_envio');
        $objeto = Objetos::find(request('objeto_id'));
    
        if ($status == 1) {
            $objeto->status = 'Em Rota';
        }

        $objeto->save();
    
        // redireciona o usuário para alguma página de sucesso
        return redirect()->back()->with('success', 'Objeto atualizado com sucesso.'); // Redireciona de volta para a página anterior com uma mensagem de sucesso
    }

    

    public function delete($id){
        $objeto = Objetos::findOrFail($id);      
        $objeto->delete();
        return redirect()->back()->with('success', 'Objeto excluído com sucesso.'); 
    }
}
