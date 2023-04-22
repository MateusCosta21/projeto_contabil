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
                <a href="{{ route('novo_assunto') }}"> <button type="button" class="btn btn-primary btn-sm">Novo
                        Assunto</button></a>
                <hr>
                <div class="table-responsive-sm" style="max-width: 95%;">
                    <table class="table" id="clientes">
                        <thead>
                            <tr>
                                <th scope="col">Assunto</th>
                                <th scope="col" class="d-none d-sm-table-cell">Cadastrado por:</th>
                                <th scope="col" class="d-none d-sm-table-cell">Data de Cadastro</th>
                                <th scope="col" class="d-none d-sm-table-cell">Ultima Atualização</th>
                                <th scope="col" class="d-none d-sm-table-cell">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assuntos as $assunto)
                            <tr>
                                <td>{{$assunto->titulo}}</td>
                                <td>{{$assunto->usuario->name}}</td>
                                <td>{{date("d/m/Y", strtotime($assunto->created_at)) }}</td>
                                <td>{{date("d/m/Y", strtotime($assunto->updated_at)) }}</td>
                                <td> 
                                    <a href="{{ route('edita_assunto', ['id' => $assunto->id]) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('deletaRota', ['id' => $assunto->id]) }}"
                                        onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este assunto?)) deleteItem('{{ route('deletaRota', ['id' => $assunto->id]) }}');"
                                        title="Remover" class="btn btn-danger btn-sm">
                                        <i class="fa fa-times-circle"></i>
                                    </a> 
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
