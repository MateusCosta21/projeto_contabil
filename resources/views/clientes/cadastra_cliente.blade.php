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
                        <h1 class="text-center"> Novo cliente </h1>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="{{ $cliente->nome }}">
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj"
                                value="{{ $cliente->cnpj }}">
                        </div>
                        <div class="form-group">
                            <label for="razao_social">Razão Social:</label>
                            <input type="text" class="form-control" id="razao_social" name="razao_social"
                                value="{{ $cliente->razao_social }}">
                        </div>
                        <div class="form-group">
                            <label for="nome_fantasia">Nome Fantasia</label>
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
                            <input type="radio" name="tipo" value="1" onchange="limparFormulario()" style="display: inline-block;"> Condomínio
                            <input type="radio" name="tipo" value="2" onchange="limparFormulario()" style="display: inline-block;"> Condômino
                            <input type="radio" name="tipo" value="3" onchange="limparFormulario()" style="display: inline-block;"> Outros
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
                            <label for="razao_social">Razão Social:</label>
                            <input type="text" class="form-control" id="razao_social" name="razao_social" required>
                        </div>
                        <div class="form-group">
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" required>
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
        const radioButtons = document.querySelectorAll('input[name="tipo"]');

        // Adicione um evento de mudança a todos os botões de rádio
        radioButtons.forEach(button => {
            button.addEventListener('change', () => {
                // Verifique qual botão de rádio foi selecionado
                if (button.value === "1") {
                    // Exiba o campo CNPJ e oculte o campo CPF
                    cnpjLabel.style.display = "block";
                    cnpjInput.style.display = "block";
                    cnpjCpfLabel.style.display = "none";
                    cpfCpnjInput.style.display = "none";
                    cpfLabel.style.display = "none";
                    cpfInput.style.display = "none";
                } else if (button.value === "2") {
                    // Exiba o campo CPF e oculte o campo CNPJ
                    cnpjLabel.style.display = "none";
                    cnpjInput.style.display = "none";
                    cpfLabel.style.display = "block";
                    cpfInput.style.display = "block";
                    cnpjCpfLabel.style.display = "none";
                    cpfCpnjInput.style.display = "none";
                } else if (button.value === "3") {
                    cnpjLabel.style.display = "none";
                    cnpjInput.style.display = "none";
                    cpfLabel.style.display = "none";
                    cpfInput.style.display = "none";
                    cnpjCpfLabel.style.display = "block";
                    cpfCpnjInput.style.display = "block";
                } else {
                    // Oculte ambos os campos
                    cnpjLabel.style.display = "none";
                    cnpjInput.style.display = "none";
                    cpfLabel.style.display = "none";
                    cpfInput.style.display = "none";
                    cnpjCpfLabel.style.display = "none";
                    cpfCpnjInput.style.display = "none";
                }
            });
        });
    </script>
@endsection


@section('scripts')
@endsection
