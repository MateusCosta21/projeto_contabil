@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-primary">
                    <div class="card-header ">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cogs fa-3x text-white"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-white">{{ $objetosAguardando }}</div>
                        </div>
                        <div class="text-center text-white">Em processamento</div>
                    </div>
                    <a href='#em-processamento'>
                        <div class="card-footer text-center">
                            <span style="color:#fff;">Ver detalhes</span>
                            <i style="color:#fff;" class="fas fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-motorcycle fa-3x text-white"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-white">{{ $objetosEmRota }}</div>
                        </div>
                        <div class="text-center text-white">Em rota</div>
                    </div>
                    <a href='#em-processamento'>
                        <div class="card-footer text-center">
                            <span style="color:#fff;">Ver detalhes</span>
                            <i style="color:#fff;" class="fas fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-warning">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-building fa-3x text-white"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-white">30</div>
                        </div>
                        <div class="text-center text-white">No Condomínio/Cliente</div>
                    </div>
                    <a href='#em-processamento'>
                        <div class="card-footer text-center">
                            <span style="color:#fff;">Ver detalhes</span>
                            <i style="color:#fff;" class="fas fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-danger">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-hourglass fa-3x text-white"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-white">30</div>
                        </div>
                        <div class="text-center text-white">Fora do prazo</div>
                    </div>
                    <a href='#em-processamento'>
                        <div class="card-footer text-center">
                            <span style="color:#fff;">Ver detalhes</span>
                            <i style="color:#fff;" class="fas fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-info btn-lg mt-5 ml-3" data-toggle="modal" data-target="#cadastroModal">
            <i class="fas fa-plus"></i> Cadastrar objeto
        </button>
        <hr>
        <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar objeto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('adiciona_objeto') }}">
                            @csrf
                            <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="status" value="Aguardando">
                            <div class="form-group">
                                <label for="tipo_id">Tipo de objeto</label>
                                <select class="form-control" id="tipo_id" name="tipo_id">
                                    @foreach ($tiposObjetos as $tipoObjeto)
                                        <option value="{{ $tipoObjeto->id }}">{{ $tipoObjeto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="remetente">Remetente/Destinatário:</label>
                                <select class="form-control" id="cliente_id" name="cliente_id">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição do objeto</label>
                                <input type="text" class="form-control" name="descricao" id="descricao">
                            </div>
                            <div class="form-group">
                                <label for="observacao">Observações sobre o Objeto</label>
                                <input type="text" class="form-control" name="observacao" id="observacao">
                            </div>
                            <div class="form-group">
                                <label for="data_envio">Data envio</label>
                                <input type="date" class="form-control" name="data_envio" id="data_envio"
                                    min="{{ date('Y-m-d', strtotime('-1 day')) }}">
                            </div>
                            <div class="form-group">
                                <label for="data_limite">Data Limite para entrega</label>
                                <input type="date" class="form-control" name="data_limite" id="data_limite"
                                    min="{{ date('Y-m-d', strtotime('-1 day')) }}">
                            </div>
                            <div class="form-group">
                                <label for="op_envio">Selecione o Tipo de Endereçamento da Correspondência</label>
                                <select class="form-control" id="op_envio" name="op_envio">
                                    <option value="1">Da Pontual para o Cliente</option>
                                    <option value="2">Do Cliente para a Pontual</option>
                                    <option value="3">Da Pontual para o Cliente e retorna para a Pontual</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="card-header">
                        <h4 class="card-title text-dark">Objetos aguardando envio <small class="text-muted">Na
                                Pontual</small></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive overflow-auto">
                            <table class="table table-sm" id="op1">
                                <thead>
                                    <tr>
                                        <th>Objeto</th>
                                        <th>Destinatário</th>
                                        <th class="d-none d-sm-table-cell">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($retornaCadastro as $objeto)
                                        @if ($objeto->op_envio == 1 && $objeto->status == 'Aguardando')
                                            <tr>
                                                <td class="text-wrap">{{ $objeto->descricao }}</td>

                                                <td class="text-wrap">{{ $objeto->cliente->nome }}</td>

                                                <td>
                                                    <div class="btn-group d-block" role="group">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#informacaoObjeto{{ $objeto->id }}">
                                                            <i class="fas fa-info-circle"></i>
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                            <div class="modal fade" id="informacaoObjeto{{ $objeto->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="informacaoObjeto{{ $objeto->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="informacaoObjeto{{ $objeto->id }}">Informações do
                                                                objeto #{{ $objeto->id }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="id">Número</label>
                                                                    <input type="text" class="form-control"
                                                                        id="id" name="id"
                                                                        value="{{ $objeto->id }}"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id">Objeto</label>
                                                                    <input type="text" class="form-control"
                                                                        id="objeto" name="objeto"
                                                                        value="{{ $objeto->descricao }}"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id">Tipo</label>
                                                                    <input type="text" class="form-control"
                                                                        id="objeto" name="objeto"
                                                                        value="{{ $objeto->tipo->nome }}"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="destinatario">Destinatário:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="destinatario" name="destinatario"
                                                                        value="{{ $objeto->cliente->nome }}" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="id">Cadastrado por:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="id"
                                                                        value="{{ $objeto->usuario->name }}"name="id"
                                                                        readonly>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer" id="botoes">
                                                            <button title="Editar Objeto" type="button"
                                                                class="btn btn-secondary btn-sm" data-dismiss="modal"><i
                                                                    class="fa fa-edit"></i> Editar</button>
                                                            <button title="Imprimir Protocolo" type="button"
                                                                class="btn btn-info btn-sm"><i class="fa fa-print"
                                                                    aria-hidden="true"></i> Imprimir Protocolo</button>

                                                                    <form action="{{ route('deletaRota', ['id' => $objeto->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este item?')">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancelar envio</button>
                                                                    </form>
                                                        </div>
                                                        <center>
                                                            <form method="POST" action="{{ route('enviaRota') }}">
                                                                @csrf
                                                                <input type="hidden" name="objeto_id"
                                                                    value="{{ $objeto->id }}">
                                                                <button type="submit"
                                                                    onclick="return confirm('Tem certeza que deseja colocar este objeto em rota?')"
                                                                    class="btn btn-success btn-sm text-center">
                                                                    <i class="fa fa-motorcycle"></i> Incluir na Rota
                                                                </button>
                                                            </form>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-default">
            <div class="card-header">
                <h4 class="card-title text-dark">Objetos aguardando envio <small class="text-muted">No
                        Cliente</small></h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive overflow-auto">
                    <table class="table table-sm" id="op1">
                        <thead>
                            <tr>
                                <th>Objeto</th>
                                <th>Destinatário</th>
                                <th class="d-none d-sm-table-cell">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($retornaCadastro as $objeto)
                                @if ($objeto->op_envio == 2)
                                    <tr>
                                        <td class="text-wrap">{{ $objeto->descricao }}</td>

                                        <td class="text-wrap">{{ $objeto->cliente->nome }}</td>

                                        <td>
                                            <div class="btn-group d-block" role="group">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#informacaoObjeto{{ $objeto->id }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="informacaoObjeto{{ $objeto->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="informacaoObjeto{{ $objeto->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="informacaoObjeto{{ $objeto->id }}">
                                                        Informações do
                                                        objeto #{{ $objeto->id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="id">Número</label>
                                                            <input type="text" class="form-control" id="id"
                                                                name="id" value="{{ $objeto->id }}"readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id">Objeto</label>
                                                            <input type="text" class="form-control" id="objeto"
                                                                name="objeto" value="{{ $objeto->descricao }}"readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id">Tipo</label>
                                                            <input type="text" class="form-control" id="objeto"
                                                                name="objeto" value="{{ $objeto->tipo->nome }}"readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="destinatario">Destinatário:</label>
                                                            <input type="text" class="form-control" id="destinatario"
                                                                name="destinatario" value="{{ $objeto->cliente->nome }}"
                                                                readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id">Cadastrado por:</label>
                                                            <input type="text" class="form-control" id="id"
                                                                value="{{ $objeto->usuario->name }}"name="id"
                                                                readonly>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer" id="botoes">
                                                    <button title="Editar Objeto" type="button"
                                                        class="btn btn-secondary btn-sm" data-dismiss="modal"><i
                                                            class="fa fa-edit"></i> Editar</button>
                                                    <button title="Imprimir Protocolo" type="button"
                                                        class="btn btn-info btn-sm"><i class="fa fa-print"
                                                            aria-hidden="true"></i> Imprimir Protocolo</button>
                                                    <a onclick="return confirm('Tem certeza que deseja cancelar o envio deste objeto?')"
                                                        href="controller/cancelar_objeto.php?objeto_id=11412">
                                                        <button type="button" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-ban"></i> Cancelar Envio</button>
                                                    </a>
                                                </div>
                                                <center> <a
                                                        onclick="return confirm('Tem certeza que deseja colocar este objeto em rota?')"
                                                        href="controller/incluir_rota.php?objeto_id=11412"
                                                        alt="Incluir na rota">
                                                        <button type="button"
                                                            class="btn btn-success btn-sm text-center"><i
                                                                class="fa fa-motorcycle"></i> Incluir na
                                                            Rota</button>
                                                    </a></center>
                                            </div>
                                        </div>
                                    </div>
                </div>
            </div>
            @endif
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-header">
                <h4 class="card-title text-dark" style="font-size: 1.25rem;">Objetos em rota <small
                        class="text-muted">Até:<?php echo date('d/m/Y'); ?></small></h4>

            </div>
            <div class="panel-body">
                <div class="table-responsive overflow-auto">
                    <table class="table table-sm" id="objetos_rota">
                        <thead>
                            <tr>
                                <th class="col-12 col-sm-6">Destinatário</th>
                                <th class="col-12 col-sm-6">Objeto</th>
                                <th class="d-none d-sm-table-cell">Ação</th>
                            </tr>
                        </thead>
                        <tbody id="font-tamanho">
                            @foreach ($retornaCadastro as $objeto)
                                @if ($objeto->status == 'Em rota')
                                    <tr>
                                        <td class="col-12 col-sm-6">{{ $objeto->cliente->nome }} </td>
                                        <td class="col-12 col-sm-6" style="word-wrap: break-word;">
                                            <strong>Descrição:</strong> {{ $objeto->descricao }}<br>
                                            <strong>Tipo:</strong> {{ $objeto->tipo->nome }}
                                            <br>
                                            <strong>Observação:</strong>{{ $objeto->observacao }}<br>
                                            <strong>Cadastrado por:</strong>{{ $objeto->usuario->name }}<br>
                                            <strong>Data
                                                limite:</strong>{{ date('d/m/Y', strtotime($objeto->data_limite)) }}
                                        </td>
                                        <td class="d-none d-sm-table-cell"> acao </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
