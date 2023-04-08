@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-bottom: 50px; margin-top:15px;">
            @if( Request::is('*/edit'))  
            <form action="{{ route('update_prestador', ['id' => $prestadores->id]) }}" method="post"> 
              @csrf
              <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}"> 
              <br>
              <h1 class="text-center"> Novo Prestador </h1>
              <div class="form-group">
                <label for="cpf_cnpj">CPF/CNPJ</label>
                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$prestadores->cpf_cnpj}}">
              </div>
              <div class="form-group">
                <label for="nome_razao">Nome / Razão Social</label>
                <input type="text" class="form-control" id="nome_razao" name="nome_razao" value="{{$prestadores->nome_razao}}">
              </div>
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$prestadores->telefone}}">
              </div>
              <div class="form-group">
                <label for="dados_bancarios">Dados Bancários</label>
                <input type="text" class="form-control" id="dados_bancarios" name="dados_bancarios" value="{{$prestadores->dados_bancarios}}">
              </div>
              <button type="button" class="btn btn-danger btn-sm">Voltar</button>
              <button type="submit" class="btn btn-success btn-sm">Atualizar</button>
          </form>
                
            </form>
            @else
            <form action="{{ route('adiciona_prestador')}}" method="post">
                @csrf
                <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}"> 
                <br>
                <h1 class="text-center"> Novo Prestador </h1>
                <div class="form-group">
                  <label for="cpf_cnpj">CPF/CNPJ</label>
                  <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj">
                </div>
                <div class="form-group">
                  <label for="nome_razao">Nome / Razão Social</label>
                  <input type="text" class="form-control" id="nome_razao" name="nome_razao">
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="form-group">
                  <label for="dados_bancarios">Dados Bancários</label>
                  <input type="text" class="form-control" id="dados_bancarios" name="dados_bancarios">
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