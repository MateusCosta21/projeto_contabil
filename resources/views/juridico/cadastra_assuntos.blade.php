@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-bottom: 50px; margin-top:15px;">
            @if( Request::is('*/edit'))  
            <form action="{{ route('update_assuntos', ['id' => $assunto->id]) }}" method="post"> 
              <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">                
                @csrf
                <br> 
                <h1 class="text-center"> Editar Assunto </h1>
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" name="titulo" value="{{$assunto->titulo}}">
                </div>
                <button type="button" class="btn btn-danger btn-sm">Voltar</button>
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                
            </form>
            @else
            <form action="{{ route('adiciona_assunto')}}" method="post">
                @csrf
                <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}"> 
                <br>
                <h1 class="text-center"> Novo Assunto </h1>
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" name="titulo">
                </div>
                <button type="button" class="btn btn-danger btn-sm">Voltar</button>
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
            @endif
        </div>
    </div>
</div>

@endsection


@section('scripts')
@endsection