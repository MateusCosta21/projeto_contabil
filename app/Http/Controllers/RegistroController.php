<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblioteca;
use Illuminate\Support\Facades\Redirect;

class RegistroController extends Controller
{
    public function index()
    {
        $livros = Biblioteca::get();
        return view('registro',['livros' => $livros]);
    }
    public function new(){
        return view('cadastro');
    }
    public function add(Request $request){
        $livro = new Biblioteca();
        $livro = $livro->create($request->all());
        return Redirect::to('registro');
    }

    public function edit($id){
        $livro = Biblioteca::findOrFail($id);
        return view('cadastro', ['livro' => $livro]);
    }

    public function update(Request $request, $id){
        try {
            $livro = Biblioteca::findOrFail($id);
            $livro->update($request->all());
            return redirect('registro')->with('success', 'Livro atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Livro não pôde ser atualizado']);
        }
    }
    public function delete($id){
        $livro = Biblioteca::findOrFail($id);
        $livro->delete();
        return redirect('registro')->with('success', 'Registro Deletado');
    }
}
