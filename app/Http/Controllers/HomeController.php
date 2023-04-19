<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoObjeto;
use App\Models\Cliente;
Use App\Models\Objetos;
use Illuminate\Support\Facades\DB;


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
        $retornaCadastro = Objetos::get();
        $objetosAguardando = DB::table('objetos')->where('status', '=', 'Aguardando')->count();
        $objetosEmRota = DB::table('objetos')->where('status', '=', 'Em rota')->count();
        $objetosCondominio = DB::table('objetos')->where('status', '=', 'No Condomínio/Cliente')->count();
        $objetosEmAtraso = DB::table('objetos')->where('data_limite', '<', date('Y-m-d'))->count();

        return view('home', compact('tiposObjetos', 'clientes', 'objetosAguardando', 'retornaCadastro', 'objetosEmRota','objetosCondominio','objetosEmAtraso'));

    }

    public function countObjetosAguardando()
    {
        $count = DB::table('objetos')->where('status', '=', 'Aguardando')->count();
        return view('home', ['count' => $count]);
    }
}
