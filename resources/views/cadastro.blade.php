@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if( Request::is('*/edit'))  
          <form action="{{ route('update', ['id' => $livro->id]) }}" method="post">

            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" value="{{ $livro->nome}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">autor</label>
              <input type="text" class="form-control" name="autor" id="autor" value="{{ $livro->autor}}">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </form>
          @else
          <form action="{{ route('add')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">autor</label>
              <input type="text" class="form-control" name="autor" id="autor">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
          @endif
        </div>
    </div>
</div>
@endsection
