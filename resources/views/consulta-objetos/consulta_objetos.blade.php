@extends('layouts.app')

@section('content')
    <br>
    <h3> Pesquisar objetos </h3>
    <hr>
    <div class="container">
        <div class="card border-info">
            <div class="card-header" id="icon">
                Busca por <strong>Cliente</strong>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('buscaCliente') }}" class="d-flex justify-content-center">
                    @csrf
                    <input type="hidden" name="tipo" value="cliente">
                    <div class="form-row align-items-center">
                        <div class="col-lg-12 text-center">
                            <select name="opcao_consulta" id="opcao_consulta" class="form-control form-control">
                                <option value="">Selecione uma opção</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" value="Consultar" class="btn btn-primary"> Consultar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-info">
            <div class="card-header" id="icon">
                Busca por <strong>tipo de objeto</strong>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('buscaCliente') }}" class="d-flex justify-content-center">
                    @csrf
                    <input type="hidden" name="tipo" value="tipo">
                    <div class="form-row align-items-center">
                        <div class="col-lg-12 text-center">
                            <select name="opcao_consulta" id="opcao_consulta" class="form-control">
                                <option value="">Selecione uma opção</option>
                                @foreach ($tiposObjetos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" value="Consultar" class="btn btn-primary"> Consultar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-info">
            <div class="card-header" id="icon">
                Busca por <strong>id do Objeto</strong>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('buscaCliente') }}" class="d-flex justify-content-center">
                    <div class="form-row align-items-center">
                        <div class="col-lg-12 text-center">
                            <form method="post" action="{{ route('buscaCliente') }}" class="d-flex justify-content-center">
                                @csrf
                                <input type="hidden" name="tipo" value="id">
                                <input type="number" id="opcao_consulta" name="opcao_consulta" class="form-control ">
                                <br>
                                <button type="submit" value="Consultar" class="btn btn-primary"> Consultar </button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
