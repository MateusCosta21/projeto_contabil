@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<br>
<div class="container">
  <div class="row">
    <div class="col-md-2">
      <!-- Menu aqui -->
    </div>
    <div class="col-md-12" style="margin-right:15em;">
      <a href="{{ route('cadastra_cliente') }}"><button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#novoClienteModal">Novo Cliente</button></a>
      <hr>
      <div class="table-responsive-sm" style="max-width: 95%;">
        <table class="table">
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
            @foreach($clientes as $cliente)
              <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->razao_social }}</td>
                <td>{{ $cliente->cnpj}}</td> 
                <td>{{ $cliente->cnpj}}</td> 
                <td>{{ date("d/m/Y", strtotime($cliente->created_at)) }}</td> 
                <td>{{ date("d/m/Y", strtotime($cliente->updated_at)) }}</td> 
                <td><a href="{{ route('edit',['id'=>$cliente->id])}}" class="btn btn-success">Editar</a></td>              
                  <td><button class="btn btn-danger"> Deletar </button></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
