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
      <a href="{{ route('new') }}"> <button type="button" class="btn btn-primary btn-sm">Novo Tipo</button></a>
      <hr>
      <div class="table-responsive">
        <table class="table" id="clientes" style="overflow-x: auto;">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col" >Atualizado por:</th>
              <th scope="col" >Data Cadastro</th>
              <th scope="col" >Data Update</th>
              <th scope="col"></th>
              <th scope="col" ></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tipo_objeto as $tipo)
              <tr>
                <td>{{ $tipo->nome }}</td>
                <td>{{ $tipo->usuario->name }}</td> 
                <td>{{ date("d/m/Y", strtotime($tipo->created_at)) }}</td> 
                <td>{{ date("d/m/Y", strtotime($tipo->updated_at)) }}</td> 
                <td><a href="{{ route('edita_tipo',['id'=>$tipo->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                <td >
                    <form action="{{ route('delete_tipos',['id'=>$tipo->id])}}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este item?')">
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