@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-bottom: 50px; margin-top:15px;">
                @if (Request::is('*/edit'))
                    <form action="{{ route('update', ['id' => $cliente->id]) }}" method="post">
                        <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                        @csrf
                        <br>
                        <h1 class="text-center"> Editar Cliente </h1>
                        <div class="form-group">
                            <label>Tipo de cliente:</label><br>
                            <input type="radio" name="tipo" value="1"
                                style="display: inline-block;" {{ $cliente->tipo == 1 ? 'checked' : '' }}> Condomínio
                            <input type="radio" name="tipo" value="2"
                                style="display: inline-block;" {{ $cliente->tipo == 2 ? 'checked' : '' }}> Condômino
                            <input type="radio" name="tipo" value="3"
                                style="display: inline-block;" {{ $cliente->tipo == 3 ? 'checked' : '' }}> Outros
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="{{ $cliente->nome }}">
                            </div>

                            <div class="form-group">
                                <label for="cnpj">CNPJ:</label>
                                <input type="text" class="form-control" id="cnpj_cadastro" value="{{ $cliente->cnpj }}" name="cnpj"
                                    onblur="preencherEndereco()">
                            </div>
    
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf_cadastro" value="{{ $cliente->cpf }}" name="cpf">
                            </div>
    
                            <div class="form-group">
                                <label for="cnpj_cpf">CNPJ/CPF</label>
                                <input type="text" class="form-control" id="cnpj_cpf_cadastro" value="{{ $cliente->cnpj_cpf }}" name="cnpj_cpf"
                                    onblur="verificarTipoDocumento()">
                            </div>
                            <div class="form-group">
                                <label for="lbl_razao">Razão Social:</label>
                                <input type="text" class="form-control" id="razao_social" name="razao_social"
                                    value="{{ $cliente->razao_social }}">
                            </div>
                            <div class="form-group">
                                <label for="nm_fantasia">Nome Fantasia</label>
                                <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia"
                                    value="{{ $cliente->nome_fantasia }}">
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone"
                                    value="{{ $cliente->telefone }}">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $cliente->email }}">
                            </div>
                            <div class="form-group">
                                <label for="cep">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep"
                                    value="{{ $cliente->cep }}">
                            </div>
                            <div class="form-group">
                                <label for="rua">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua"
                                    value="{{ $cliente->rua }}">
                            </div>
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero"
                                    value="{{ $cliente->numero }}">
                            </div>
                            <div class="form-group">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento"
                                    value="{{ $cliente->complemento }}">
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro"
                                    value="{{ $cliente->bairro }}">
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade"
                                    value="{{ $cliente->cidade }}">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado"
                                    value="{{ $cliente->estado }}">
                            </div>
                            <a href="{{ route('clientes') }}"><button type="button"
                                    class="btn btn-danger">Voltar</button></a>
                            <button type="submit" class="btn btn-success">Salvar</button>

                    </form>
                @else
                    <form action="{{ route('add') }}" method="post">
                        <!-- Modal de carregamento -->
                        <div class="modal" id="loadingModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Cabeçalho da modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">Carregando...</h5>
                                    </div>

                                    <!-- Corpo da modal -->
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Carregando...</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                        <br>
                        <h1 class="text-center"> Novo cliente </h1>
                        <div class="form-group">
                            <label>Tipo de cliente:</label><br>
                            <input type="radio" name="tipo" value="1" onchange="limparFormulario()"
                                style="display: inline-block;"> Condomínio
                            <input type="radio" name="tipo" value="2" onchange="limparFormulario()"
                                style="display: inline-block;"> Condômino
                            <input type="radio" name="tipo" value="3" onchange="limparFormulario()"
                                style="display: inline-block;"> Outros
                        </div>

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="cnpj" style="display: none">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpj_cadastro" name="cnpj"
                                onblur="preencherEndereco()">
                        </div>

                        <div class="form-group">
                            <label for="cpf" style="display: none">CPF:</label>
                            <input type="text" class="form-control" id="cpf_cadastro" name="cpf">
                        </div>

                        <div class="form-group">
                            <label for="cnpj_cpf" style="display: none">CNPJ/CPF</label>
                            <input type="text" class="form-control" id="cnpj_cpf_cadastro" name="cnpj_cpf"
                                onblur="verificarTipoDocumento()">
                        </div>

                        <div class="form-group">
                            <label for="lbl_razao">Razão Social:</label>
                            <input type="text" class="form-control" id="razao_social" name="razao_social">
                        </div>
                        <div class="form-group">
                            <label for="nm_fantasia">Nome Fantasia</label>
                            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="cep">Cep</label>
                            <input type="text" class="form-control" id="cep" name="cep" required>
                        </div>
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" required>
                        </div>
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" required>
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" required>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm">Voltar</button>
                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Obtenha os elementos DOM relevantes
        const cnpjLabel = document.querySelector('label[for="cnpj"]');
        const cnpjCpfLabel = document.querySelector('label[for="cnpj_cpf"]');
        const cpfLabel = document.querySelector('label[for="cpf"]');
        const cnpjInput = document.querySelector('#cnpj_cadastro');
        const cpfInput = document.querySelector('#cpf_cadastro');
        const cpfCpnjInput = document.querySelector("#cnpj_cpf_cadastro");
        const razaoSocial = document.querySelector("#razao_social");
        const nomeFantasia = document.querySelector("#nome_fantasia");
        const lblRazao = document.querySelector('label[for="lbl_razao"]');
        const lblNomeFantasia = document.querySelector('label[for="nm_fantasia"]');
    
        const radioButtons = document.querySelectorAll('input[name="tipo"]');
      
        // Função para exibir ou ocultar os campos com base no valor do botão de opção selecionado
        function exibirCampos() {
          const selectedOption = document.querySelector('input[name="tipo"]:checked');
          if (selectedOption) {
            if (selectedOption.value === "1") {
              // Exiba o campo CNPJ e oculte o campo CPF e CNPJ/CPF
              cnpjLabel.style.display = "block";
              cnpjInput.style.display = "block";
              cpfCpnjInput.style.display = "none";
              cpfLabel.style.display = "none";
              cpfInput.style.display = "none";
              cnpjCpfLabel.style.display = "none";
              lblRazao.style.display = "block";
              lblNomeFantasia.style.display = "block";
            } else if (selectedOption.value === "2") {
              // Exiba o campo CPF e oculte o campo CNPJ e CNPJ/CPF
              cpfLabel.style.display = "block";
              cpfInput.style.display = "block";
              cnpjInput.style.display = "none";
              cnpjCpfLabel.style.display = "none";
              cnpjLabel.style.display = "none";
              cpfCpnjInput.style.display = "none";
              razaoSocial.style.display = "none";
              nomeFantasia.style.display = "none";
              lblRazao.style.display = "none";
              lblNomeFantasia.style.display = "none";
            } else if (selectedOption.value === "3") {
              // Exiba o campo CNPJ/CPF e oculte o campo CPF e CNPJ
              cnpjCpfLabel.style.display = "block";
              cpfCpnjInput.style.display = "block";
              cpfInput.style.display = "none";
              cnpjInput.style.display = "none";
              cnpjLabel.style.display = "none";
              cpfLabel.style.display = "none";
            } else {
              // Oculte todos os campos
              cnpjLabel.style.display = "none";
              cnpjInput.style.display = "none";
              cpfCpnjInput.style.display = "none";
              cpfLabel.style.display = "none";
              cpfInput.style.display = "none";
              cnpjCpfLabel.style.display = "none";
            }
          }
        }
      
        // Execute a função para exibir ou ocultar os campos no carregamento da página
        exibirCampos();
      
        // Adicione um evento de mudança a todos os botões de rádio
        radioButtons.forEach(button => {
          button.addEventListener('change', () => {
            exibirCampos();
          });
        });
      </script>
@endsection


@section('scripts')
@endsection
