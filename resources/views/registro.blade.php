@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Autor</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($livros as $livro)
                <td>{{ $livro->nome }}</td>
                <td>{{ $livro->autor }}</td>
                <td><a href="{{ route('edit',['id'=>$livro->id])}}" class="btn btn-success">Editar</a></td>
                <td>
                    <form action="{{ route('delete',['id'=>$livro->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"> Deletar </button>
                </form>
                 
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>

        </div>
    </div>
</div>
@endsection
