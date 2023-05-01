@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12" style="margin-right:15em;">
                <a href="{{ route('cadastra_cliente') }}"> <button type="button" class="btn btn-primary btn-sm">Novo
                        Cliente</button></a>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="clientes">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Razão Social</th>
                                <th scope="col">Cnpj</th>
                                <th scope="col">Atualizado por:</th>
                                <th scope="col">Data Cadastro</th>
                                <th scope="col">Data Update</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                
                                    <td class="text-wrap">{{$cliente->nome}}</td>
                                    <td class="text-wrap">{{$cliente->razao_social}}</td>
                                    <td>{{ $cliente->cnpj }}</td>
                                    <td>{{$cliente->usuario->name}}</td>
                                    <td>{{ date('d/m/Y', strtotime($cliente->created_at)) }}
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($cliente->updated_at)) }}
                                    </td>
                                    <td><a href="{{ route('edit', ['id' => $cliente->id]) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                    <td class>
                                        <form action="{{ route('delete', ['id' => $cliente->id]) }}" method="post"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
