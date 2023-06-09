<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetos;
use App\Models\historico;
use App\Models\Cliente;
use App\Models\TipoObjeto;
use Dompdf\Dompdf;



class ObjetoController extends Controller
{

    public function index()
    {
        $clientes = Cliente::get();
        $objetos = Objetos::Get();
        $tiposObjetos = TipoObjeto::get();
        return view('consulta-objetos.consulta_objetos', compact('clientes', 'tiposObjetos'));
    }


    public function add(Request $request)
    {
        try {

            $objeto = new Objetos();
            $objeto = $objeto->create($request->all());
            return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }
    public function enviaRota(Request $request)
    {
        $objetoId = $request->input('objeto_id');
        $status = 'Em Rota';

        $objeto = Objetos::find($objetoId);
        $objeto->status = $status;
        $objeto->save();

        $usuarioId = auth()->user()->id;
        $historico = new Historico;
        $historico->objeto_id = $objetoId;
        $historico->usuario_id = $usuarioId;
        $historico->status = $status;
        $historico->save();

        return redirect()->back()->with('success', 'Objeto colocado em rota.');
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

        $usuarioId = auth()->user()->id;
        $historico = new Historico;
        $historico->objeto_id = $objeto->id;
        $historico->usuario_id = $usuarioId;
        $historico->status = $objeto->status;
        $historico->save();

        return redirect()->back()->with('success', 'Objeto atualizado com sucesso.');
    }

    public function retorna_processo()
    {
        $status = request('statusSelect');
        $dataEnvio = \Carbon\Carbon::parse(request('data_envio') . ' ' . request('hora_envio'));
        $objeto = Objetos::find(request('objeto_id'));

        if ($status == 1) {
            $objeto->status = 'Em Rota';
        }
        if ($dataEnvio) {
            $objeto->data_envio = $dataEnvio;
        }

        $objeto->save();

        $usuarioId = auth()->user()->id;
        $historico = new Historico;
        $historico->objeto_id = $objeto->id;
        $historico->usuario_id = $usuarioId;
        $historico->status = $objeto->status;
        $historico->save();

        // redireciona o usuário para alguma página de sucesso
        return redirect()->back()->with('success', 'Objeto atualizado com sucesso.'); // Redireciona de volta para a página anterior com uma mensagem de sucesso
    }

    public function update(Request $request, $id)
    {
        try {
            $objeto = Objetos::findOrFail($id);
            $objeto->update($request->all());
            return redirect()->route('home')->with('success', 'Cadastro atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Objeto não pode ser atualizado']);
        }
    }

    public function buscaCliente(Request $request)
    {
        $opcao = $request->input('opcao_consulta');
        $tipoBusca = $request->input('tipo');

        if ($tipoBusca == 'cliente') {
            $objetos = Objetos::where('cliente_id', $opcao)->get();
        }
        if ($tipoBusca == 'tipo') {
            $objetos = Objetos::where('tipo_id', $opcao)->get();
        }
        if ($tipoBusca == 'id') {
            $objetos = Objetos::where('id', $opcao)->get();
        }


        // Busca os objetos correspondentes ao cliente selecionado

        // Retorna a view com os objetos encontrados
        return view('consulta-objetos.objetosRespostas', ['objetos' => $objetos]);
    }

    public function gerarPdf($id)
    {
        // Busque o objeto com o ID fornecido
        $objeto = Objetos::findOrFail($id);

        // Renderize o HTML do protocolo
        $html = view('protocolo', compact('objeto'))->render();

        // Instancie o Dompdf
        $dompdf = new Dompdf();

        // Carregue o HTML no Dompdf
        $dompdf->loadHtml($html);

        // Renderize o PDF
        $dompdf->render();

        // Retorne o PDF gerado
        return $dompdf->stream('protocolo.pdf');
    }


    public function delete($id)
    {
        $objeto = Objetos::findOrFail($id);
        $objeto->delete();
        return redirect()->back()->with('success', 'Objeto excluído com sucesso.');
    }
}
