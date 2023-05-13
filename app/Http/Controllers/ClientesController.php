<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::get();
        return view('clientes.clientes', ['clientes' => $clientes]);
    }
    public function add(Request $request)
    {
        try {
            $cliente = new Cliente();
            $cliente = $cliente->create($request->all());
            return redirect('clientes')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->withErrors(['Cadastro não pode ser realizado']);
        }
    }
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.cadastra_cliente', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            return redirect('clientes')->with('success', 'Cliente atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Cliente não pode ser atualizado']);
        }
    }

    public function delete($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return back()->with('success', 'Registro Deletado');
    }

    public function buscaCNPJ(Request $request)
    {
        $cnpj = $request->route('cnpj');
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://www.receitaws.com.br/v1/cnpj/' . $cnpj);
        $data = json_decode($response->getBody());
        if (isset($data->uf)) {
            $bairro = $data->bairro ?? '';
            $cidade = $data->municipio ?? '';
            $estado = $data->uf ?? '';
            $razao = $data->nome ?? '';
            $telefone = $data->telefone ?? '';
            $email = $data->email ?? '';
            $cnpj = $data->cnpj ?? '';
            $cep = $data->cep ?? '';
            $rua = $data->logradouro ?? '';
            $numero = $data->numero ?? '';
            $cidade = $data->municipio ?? '';
            $estado = $data->uf ?? '';

            
            // preencha os campos de bairro, cidade e estado com os valores obtidos
            return response()->json([
                'bairro' => $bairro,
                'cidade' => $cidade,
                'estado' => $estado,
                'razao_social' => $razao,
                'nome'=>  $razao,
                'telefone' => $telefone,
                'email'=> $email,
                'cnpj' => $cnpj,
                'cep' => $cep,
                'rua' => $rua,
                'numero' => $numero, 
                'cidade' => $cidade,
                'estado' => $estado
            ]);
        }
    
        return response()->json([]);
    }
 
}
