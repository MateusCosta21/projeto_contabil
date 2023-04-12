<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoObjeto;
use App\Models\Cliente;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tiposObjetos = TipoObjeto::all();
        $clientes = Cliente::all();
        return view('home', compact('tiposObjetos','clientes'));
    }
}
