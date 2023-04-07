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
      <a href="{{ route('new') }}"> <button type="button" class="btn btn-primary btn-sm">Novo Tipo</button></a>
      <hr>
      <div class="table-responsive-sm" style="max-width: 95%;">
        <table class="table" id="clientes">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col" class="d-none d-sm-table-cell">Atualizado por:</th>
              <th scope="col" class="d-none d-sm-table-cell">Data Cadastro</th>
              <th scope="col" class="d-none d-sm-table-cell">Data Update</th>
              <th scope="col"></th>
              <th scope="col" class="d-none d-sm-table-cell"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tipo_objeto as $tipo)
              <tr>
                <td>{{ $tipo->nome }}</td>
                <td class="d-none d-md-table-cell">{{ $tipo->usuario->name }}</td> 
                <td class="d-none d-md-table-cell">{{ date("d/m/Y", strtotime($tipo->created_at)) }}</td> 
                <td class="d-none d-md-table-cell">{{ date("d/m/Y", strtotime($tipo->updated_at)) }}</td> 
                <td><a href="{{ route('edita_tipo',['id'=>$tipo->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                <td class="d-none d-sm-table-cell">
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
