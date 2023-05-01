@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<br>
<div class="container mx-auto">
  <div class="row">
    <div class="col-md-12" style="margin-right:15em;">
      <a href="{{ route('novo_prestador') }}"> <button type="button" class="btn btn-primary btn-sm">Novo prestador</button></a>
      <hr>
      <div class="table-responsive">
        <table class="table" id="clientes">
          <thead>
            <tr>
              <th scope="col">Nome/Razão</th>
              <th scope="col" >CPF/CNPJ</th>
              <th scope="col" >Telefone</th>
              <th scope="col" >Dados bancários</th>
              <th scope="col" >Atualizado por</th>
              <th scope="col" >Data Cadastro</th>
              <th scope="col" >Data Update</th>
              <th scope="col"></th>
              <th scope="col" ></th>
            </tr>
          </thead>
          <tbody>
            @foreach($prestadores as $prestador)
            <tr>
              <td>{{ $prestador->nome_razao }}</td>
              <td >{{ $prestador->cpf_cnpj}}</td> 
              <td >{{ $prestador->telefone }}</td> 
              <td >{{ $prestador->dados_bancarios }}</td> 
              <td >{{ $prestador->usuario->name }}</td> 
              <td >{{ date("d/m/Y", strtotime($prestador->created_at)) }}</td> 
              <td >{{ date("d/m/Y", strtotime($prestador->updated_at)) }}</td> 
              <td><a href="{{ route('edita_prestador',['id'=>$prestador->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
              <td >
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
