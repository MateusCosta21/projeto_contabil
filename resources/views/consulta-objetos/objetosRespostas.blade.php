@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div class="container mx-auto" style="max-width: 95%; overflow-x: hidden;">
        <div class="row">
            <div class="col-md-12" style="margin-right:15em;">
                <hr>
                <div class="table-responsive-sm" style="max-width: 95%;">
                    <table class="table" id="clientes">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="d-none d-sm-table-cell">Descrição</th>
                                <th scope="col" class="d-none d-sm-table-cell">Cliente</th>
                                <th scope="col" class="d-none d-sm-table-cell">Tipo de objeto</th>
                                <th scope="col" class="d-none d-sm-table-cell">Cadastrado por</th>
                                <th scope="col" class="d-none d-sm-table-cell">Data Cadastro</th>
                                <th scope="col" class="d-none d-sm-table-cell">Ultima atualização</th>
                                <th scope="col" class="d-none d-sm-table-cell">Status Atual</th>
                                <th scope="col" class="d-none d-sm-table-cell">Digitalizado</th>
                                <th scope="col" class="d-none d-sm-table-cell">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($objetos as $objeto)
                                <tr>
                                
                                    <td class="text-wrap">{{$objeto->id}}</td>
                                    <td class="text-wrap d-none d-sm-table-cell">{{$objeto->descricao}}</td>
                                    <td class="d-none d-sm-table-cell">{{ $objeto->cliente->nome }}</td>
                                    <td class="text-wrap d-none d-sm-table-cell">{{$objeto->tipo->nome}}</td>
                                    <td class="text-wrap d-none d-sm-table-cell">{{$objeto->usuario->name}}</td>
                                    <td class="d-none d-sm-table-cell">{{ date('d/m/Y', strtotime($objeto->created_at)) }}
                                    </td>
                                    <td class="d-none d-sm-table-cell">{{ date('d/m/Y', strtotime($objeto->updated_at)) }}
                                    </td>
                                    <td class="text-wrap d-none d-sm-table-cell">{{$objeto->status}}</td>
                                    <td class="text-wrap d-none d-sm-table-cell">{{$objeto->Digitalizado}}</td>
                                    <th scope="col" class="d-none d-sm-table-cell">Ações</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
