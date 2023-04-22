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
                                <th scope="col">Nome</th>
                                <th scope="col" class="d-none d-sm-table-cell">Razão Social</th>
                                <th scope="col" class="d-none d-sm-table-cell">Cnpj</th>
                                <th scope="col" class="d-none d-sm-table-cell">Atualizado por:</th>
                                <th scope="col" class="d-none d-sm-table-cell">Data Cadastro</th>
                                <th scope="col" class="d-none d-sm-table-cell">Data Update</th>
                                <th scope="col"></th>
                                <th scope="col" class="d-none d-sm-table-cell"></th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
