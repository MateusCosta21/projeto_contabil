@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-bottom: 50px; margin-top:15px;">
            <form action="{{ route('add')}}" method="post">
                @csrf
                <br>
                <h1 class="text-center"> Novo cliente </h1>
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                  <label for="cnpj">CNPJ:</label>
                  <input type="text" class="form-control" id="sobrenome" name="cnpj">
                </div>
                <div class="form-group">
                  <label for="razao_social">Razão Social:</label>
                  <input type="text" class="form-control" id="razao_social" name="razao_social">
                </div>
                <div class="form-group">
                  <label for="nome_fantasia">Nome Fantasia</label>
                  <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="cep">Cep</label>
                  <input type="text" class="form-control" id="cep" name="cep">
                </div>
                <div class="form-group">
                  <label for="rua">Rua</label>
                  <input type="text" class="form-control" id="rua" name="rua">
                </div>
                <div class="form-group">
                  <label for="numero">Número</label>
                  <input type="text" class="form-control" id="numero" name="numero">
                </div>
                <div class="form-group">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
                <div class="form-group">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro">
                </div>
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="form-group">
                  <label for="estado">Estado</label>
                  <input type="text" class="form-control" id="estado" name="estado">
                </div>
                <button type="button" class="btn btn-danger btn-lg">Voltar</button>
                <button type="submit" class="btn btn-success btn-lg">Salvar</button>
            </form>
        </div>
    </div>
</div>

@endsection


@section('scripts')
@endsection