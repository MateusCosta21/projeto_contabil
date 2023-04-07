@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#novoClienteModal">Novo Cliente</button>
          <a href="{{ route('cadastra_cliente') }}"><button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#novoClienteModal">Novo Cliente</button></a>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="novoClienteModal" tabindex="-1" role="dialog" aria-labelledby="novoClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="novoClienteModalLabel">Novo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  $('#novoClienteModal').on('shown.bs.modal', function () {
    $('#nome').focus();
  })
</script>
@endsection