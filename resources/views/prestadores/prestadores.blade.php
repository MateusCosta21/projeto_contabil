@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<br>
<div class="container mx-auto" style="max-width: 95%; overflow-x: hidden;">
  <div class="row">
    <div class="col-md-12" style="margin-right:15em;">
      <a href="{{ route('novo_prestador') }}"> <button type="button" class="btn btn-primary btn-sm">Novo prestador</button></a>
      <hr>
      <div class="table-responsive-sm" style="max-width: 95%;">
        <table class="table" id="clientes">
          <thead>
            <tr>
              <th scope="col">Nome/Razão</th>
              <th scope="col" class="d-none d-sm-table-cell">CPF/CNPJ</th>
              <th scope="col" class="d-none d-sm-table-cell">Telefone</th>
              <th scope="col" class="d-none d-sm-table-cell">Dados bancários</th>
              <th scope="col" class="d-none d-sm-table-cell">Atualizado por</th>
              <th scope="col" class="d-none d-sm-table-cell">Data Cadastro</th>
              <th scope="col" class="d-none d-sm-table-cell">Data Update</th>
              <th scope="col"></th>
              <th scope="col" class="d-none d-sm-table-cell"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($prestadores as $prestador)
            <tr>
              <td>{{ $prestador->nome_razao }}</td>
              <td class="d-none d-md-table-cell">{{ $prestador->cpf_cnpj}}</td> 
              <td class="d-none d-md-table-cell">{{ $prestador->telefone }}</td> 
              <td class="d-none d-md-table-cell">{{ $prestador->dados_bancarios }}</td> 
              <td class="d-none d-md-table-cell">{{ $prestador->usuario->name }}</td> 
              <td class="d-none d-md-table-cell">{{ date("d/m/Y", strtotime($prestador->created_at)) }}</td> 
              <td class="d-none d-md-table-cell">{{ date("d/m/Y", strtotime($prestador->updated_at)) }}</td> 
              <td><a href="{{ route('edita_prestador',['id'=>$prestador->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
              <td class="d-none d-sm-table-cell">
                  <form action="{{ route('delete_prestador',['id'=>$prestador->id])}}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este item?')">
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