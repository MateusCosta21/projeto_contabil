@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div class="container mx-auto" style="max-width: 95%; overflow-x: hidden;">
        <div class="row">
            <div class="col-md-12" style="margin-right:15em;">
                <hr>
                <div class="table-responsive-sm" style="max-width: 95%;">
                    <table class="table" id="clientes">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" >Descrição</th>
                                <th scope="col" >Cliente</th>
                                <th scope="col" >Tipo de objeto</th>
                                <th scope="col" >Cadastrado por</th>
                                <th scope="col" >Data Cadastro</th>
                                <th scope="col" >Ultima atualização</th>
                                <th scope="col" >Status Atual</th>
                                <th scope="col" >Digitalizado</th>
                                <th scope="col" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($objetos as $objeto)
                                <tr>
                                    <td class="text-wrap">{{$objeto->id}}</td>
                                    <td class="text-wrap ">{{$objeto->descricao}}</td>
                                    <td class="text-wrap ">{{ $objeto->cliente->nome }}</td>
                                    <td class="text-wrap ">{{$objeto->tipo->nome}}</td>
                                    <td class="text-wrap ">{{$objeto->usuario->name}}</td>
                                    <td >{{ date('d/m/Y', strtotime($objeto->created_at)) }}
                                    </td>
                                    <td >{{ date('d/m/Y', strtotime($objeto->updated_at)) }}
                                    </td>
                                    <td class="text-wrap ">{{$objeto->status}}</td>
                                    <td class="text-wrap ">
                                        <span class="badge {{ $objeto->digitalizado == 0 ? 'badge-warning' : 'badge-success' }}">
                                            {{ $objeto->digitalizado == 0 ? 'Não digitalizado' : 'Digitalizado' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button title="Historico" type="button" class="btn btn-primary btn-sm"
                                            data-toggle="modal" data-target="#historico{{ $objeto->id }}">
                                            <i class="fa fa-search"></i>
                                        </button>

                                        <button title="Historico" type="button" class="btn btn-secondary btn-sm"
                                        data-toggle="modal" data-target="#upload{{ $objeto->id }}">
                                        <i class="fas fa-file-upload"></i>
                                    </button>

                                    </td>
                                </tr>
                                <div class="modal fade" id="historico{{ $objeto->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="atualizarStatusModalLabel">Histórico do objeto id n°
                                                    {{ $objeto->id }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong> Cadastrado em: </strong> {{ date('d/m/Y', strtotime($objeto->created_at)) }}
                                                <br>
                                                <strong> Data de Envio: </strong>{{ date('d/m/Y', strtotime($objeto->data_envio)) }}
                                                <br>
                                                <strong> Prazo limite de Entrega: </strong>{{ date('d/m/Y', strtotime($objeto->data_limite)) }}
                                                <br>
                                                <strong> Observações: </strong>{{ $objeto->observacao }}
                                                <br>
                                                <strong> Cadastrado por: </strong>{{ $objeto->usuario->name }}
                                                <hr>
                        
                                                @foreach (DB::table('historicos')->join('users', 'historicos.usuario_id', '=', 'users.id')->select('historicos.*', 'users.name as user_name')->where('objeto_id', $objeto->id)->get() as $historico)
                                                    <strong> Data </strong>{{ date('d/m/Y', strtotime($historico->created_at)) }}<br>
                                                    <strong> Status </strong>{{ $historico->status }}<br>
                                                    <strong> Cadastrado por: </strong>{{ $historico->user_name }}
                                                    <hr>
                                                @endforeach
                        
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="upload{{ $objeto->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="atualizarStatusModalLabel">Upload
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <input type="file"> 
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
