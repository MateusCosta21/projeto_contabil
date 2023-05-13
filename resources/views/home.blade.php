@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid pt-4 px-4">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 col-xl-3">
                <div class="card pp-color" style="background-color:#ADD8E6	;">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cogs fa-3x text-blue"></i>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-blue" style="font-weight: bold;">
                                <h3>{{ $objetosAguardando }}</h3>
                            </div>
                        </div>
                        <div class="text-center text-blue">Em processamento</div>
                    </div>
                    <a href='#em-processamento'>
                        <div class="card-footer text-center">
                            <span class="text-blue">Ver detalhes</span>
                            <i class="fas fa-arrow-circle-right text-blue"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card" style="background-color:#DCDCDC" ;>
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-motorcycle fa-3x text-cinza"></i>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-cinza" style="font-weight: bold;">
                                <h3>{{ $objetosEmRota }}</h3>
                            </div>
                        </div>
                        <div class="text-center text-cinza">Em rota</div>
                    </div>
                    <a href='#rota'>
                        <div class="card-footer text-center">
                            <span class="text-cinza">Ver detalhes</span>
                            <i class="fas fa-arrow-circle-right text-cinza"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card" style="background-color:#FFD700">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-building fa-3x text-laranja"></i>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-laranja" style="font-weight: bold;">
                                <h3>{{ $objetosCondominio }}</h3>
                            </div>
                        </div>
                        <div class="text-center text-laranja">No Condomínio/Cliente</div>
                    </div>
                    <a href='#condominio'>
                        <div class="card-footer text-center">
                            <span class="text-laranja">Ver detalhes</span>
                            <i class="fas fa-arrow-circle-right text-laranja"></i>
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
                        <br>
                        <div class="d-flex justify-content-center">
                            <div class="huge text-white" style="font-weight: bold;">
                                <h3>{{ $objetosEmAtraso }}</h3>
                            </div>
                        </div>
                        <div class="text-center text-black">Fora do prazo</div>
                    </div>
                    <a href='#fora_prazo'>
                        <div class="card-footer text-center">
                            <a href="#objetos_atraso"><span style="color:#fff;">Ver detalhes</span></a>
                            <i style="color:#fff;" class="fas fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-info btn-lg mt-5 ml-3" data-toggle="modal" data-target="#cadastroModal">
            <i class="fas fa-plus"></i> Cadastrar objeto
        </button>
        @include('layouts.modals');
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="panel panel-default" id="em-processamento">
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
                                <tbody id="font-tamanho">
                                    @foreach ($retornaCadastro as $objeto)
                                        @if (
                                            ($objeto->op_envio == 1 && $objeto->status == 'Aguardando') ||
                                                ($objeto->op_envio == 3 && $objeto->status == 'Aguardando'))
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
                                            @include('layouts.modals', ['objeto' => $objeto])
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="panel panel-default" id="em-processamento">
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
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody id="font-tamanho">
                                    @foreach ($retornaCadastro as $objeto)
                                        @if ($objeto->op_envio == 2)
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
                                            @include('layouts.modals', ['objeto' => $objeto])
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="panel panel-default mt-5" id="rota">
                    <div class="card-header">
                        <h4 class="card-title text-dark" style="font-size: 1.25rem;">Objetos em rota <small
                                class="text-muted">Até:<?php echo date('d/m/Y'); ?></small></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive overflow-auto">
                            <table class="table table-sm" id="clientes">
                                <thead>
                                    <tr>
                                        <th>Destinatário</th>
                                        <th>Objeto</th>
                                        <th width="7%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody id="font-tamanho">
                                    @foreach ($retornaCadastro as $objeto)
                                        @if ($objeto->status == 'Em Rota')
                                            <tr>
                                                <td class="text-wrap">{{ $objeto->cliente->nome }} </td>
                                                <td class="text-wrap">
                                                    <strong>Descrição:</strong> {{ $objeto->descricao }}<br>
                                                    <strong>Tipo:</strong> {{ $objeto->tipo->nome }}
                                                    <br>
                                                    <strong>Observação:</strong>{{ $objeto->observacao }}<br>
                                                    <strong>Cadastrado por:</strong>{{ $objeto->usuario->name }}<br>
                                                    <strong>Data
                                                        limite:</strong>{{ date('d/m/Y', strtotime($objeto->data_limite)) }}
                                                </td>
                                                <td>
                                                    <div class="btn-group d-block" role="group">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-12 mb-2">
                                                                <button type="button" class="btn btn-light btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#atualizarStatusModal{{ $objeto->id }}">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-lg-2 col-12 mb-2">
                                                                <button title="Historico" type="button"
                                                                    class="btn btn-primary btn-sm" data-toggle="modal"
                                                                    data-target="#historico{{ $objeto->id }}">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-lg-2 col-12 mb-2">
                                                                <a href="{{ route('deletaRota', ['id' => $objeto->id]) }}"
                                                                    onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este item?')) deleteItem('{{ route('delete', ['id' => $objeto->id]) }}');"
                                                                    title="Remover" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('layouts.modals', ['objeto' => $objeto])
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="panel panel-default mt-5" id="condominio">
                    <div class="card-header">
                        <h4 class="card-title text-dark" style="font-size: 1.25rem;">Objetos no Condomínio/Cliente <small
                            class="text-muted">Até:<?php echo date('d/m/Y'); ?></small></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive overflow-auto">
                            <table class="table table-sm" id="objetos_condominio">
                                <thead>
                                    <tr>
                                        <th>Objeto</th>
                                        <th>Destinatário</th>
                                        <th>Tipo de objeto</th>
                                        <th width="10%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody id="font-tamanho">
                                    @foreach ($retornaCadastro as $objeto)
                                        @if ($objeto->status == 'No condominio/Cliente' && $objeto->op_envio == 3)
                                            <tr>
                                                <td class="text-wrap">{{ $objeto->descricao }} </td>
                                                <td class="text-wrap">
                                                    {{ $objeto->cliente->nome }}
                                                    <h6><span class="badge badge-secondary">Este objeto deve retornar para
                                                            a
                                                            Administradora até
                                                            {{ \Carbon\Carbon::parse($objeto->data_limite)->format('d/m/Y') }}
                                                        </span></h6>
                                                </td>
                                                <td class="text-wrap">
                                                    {{ $objeto->tipo->nome }}
                                                </td>
                                                <td>
                                                    <div class="btn-group d-block" role="group">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-12 mb-2">
                                                                <button type="button" class="btn btn-light btn-sm text-center"
                                                                data-toggle="modal"
                                                                data-target="#incluirRota{{ $objeto->id }}">
                                                                <i class="fa fa-motorcycle"></i>
                                                            </button>
                                                            </div>
                                                            <div class="col-lg-2 col-12 mb-2">
                                                                <button title="Historico" type="button"
                                                                    class="btn btn-primary btn-sm" data-toggle="modal"
                                                                    data-target="#historico{{ $objeto->id }}">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-lg-2 col-12 mb-2">
                                                                <a href="{{ route('deletaRota', ['id' => $objeto->id]) }}"
                                                                    onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este item?')) deleteItem('{{ route('deletaRota', ['id' => $objeto->id]) }}');"
                                                                    title="Remover" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('layouts.modals', ['objeto' => $objeto])
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="panel panel-default mt-5" id="fora_prazo">
                    <div class="card-header">
                        <h4 class="card-title text-dark" style="font-size: 1.25rem;">Objetos com entrega em atraso <small
                                class="text-muted">Até:<?php echo date('d/m/Y'); ?></small></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive overflow-auto">
                            <table class="table table-sm" id="clientes">
                                <thead>
                                    <tr>
                                        <th>Objeto</th>
                                        <th class="d-none d-sm-table-cell">Destinatário</th>
                                        <th class="d-none d-sm-table-cell">Tipo de objeto</th>
                                        <th class="d-none d-sm-table-cell">Status atual</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="font-tamanho">
                                    @foreach ($retornaCadastro as $objeto)
                                        @php
                                            $dataLimite = \Carbon\Carbon::parse($objeto->data_limite);
                                        @endphp
                                        @if ($dataLimite->isPast() && $objeto->status !== "Entregue")
                                            <tr>
                                                <td>{{ $objeto->descricao }}</td>
                                                <td>{{ $objeto->cliente->nome }}</td>
                                                <td>{{ $objeto->tipo->nome }}</td>
                                                <td>{{ $objeto->status }}</td>
                                                <td>
                                                    <button title="Historico" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#historico{{ $objeto->id }}">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FIM Condominio cliente -->
@endsection
