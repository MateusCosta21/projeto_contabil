@section('modal')
    @foreach ($retornaCadastro as $objeto)
        <!-- Modal -->
        <div class="modal fade" id="atualizarStatusModal{{ $objeto->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="atualizarStatusModalLabel">Atualizar Status - {{ $objeto->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form method="POST" action="{{ route('finaliza_processo') }}">
                                @csrf
                                <input type="hidden" name="objeto_id" value="{{ $objeto->id }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="statusSelect">Status:</label>
                                        <select class="form-control" id="statusSelect" name="statusSelect">
                                            @if ($objeto->op_envio == 3 && $objeto->status == 'Em Rota')
                                                <option value="1">No condominio/Cliente</option>
                                                <option value="2">Entregue</option>
                                            @else
                                                <option value="2">Entregue</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    @foreach ($retornaCadastro as $objeto)
        <!-- Modal -->
        <div class="modal fade" id="historico{{ $objeto->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="atualizarStatusModalLabel">Histórico do objeto id n° {{ $objeto->id }}
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
                        @foreach ($historicos as $historico)
                                <strong> Status: </strong> {{ $historico->status }}
                                <br>
                                <strong> Cadastrado por: </strong>{{ $historico->id }}
                                <hr>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($retornaCadastro as $objeto)
        <!-- Modal -->
        <div class="modal fade" id="incluirRota{{ $objeto->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="atualizarStatusModalLabel">Incluir Status - {{ $objeto->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form method="POST" action="{{ route('retorna_processo') }}">
                                @csrf
                                <input type="hidden" name="objeto_id" value="{{ $objeto->id }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        @if ($objeto->op_envio == 3 && $objeto->tipo->nome == 'Notificações')
                                            <label for="data_envio">Data envio</label>
                                            <input type="date" class="form-control" name="data_envio" id="data_envio"
                                                min="{{ date('Y-m-d', strtotime('-1 day')) }}"><br>
                                            <label for="statusSelect">Status:</label>
                                            <select class="form-control" id="statusSelect" name="statusSelect">
                                                <option value="1">Colocar em Rota</option>
                                            </select>
                                        @else
                                            <label for="statusSelect">Status:</label>
                                            <select class="form-control" id="statusSelect" name="statusSelect">
                                                <option value="1">Colocar em Rota</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($retornaCadastro as $objeto)
        {{-- MODAL Objetos aguardando envio Na pontual  --}}

        <div class="modal fade" id="informacaoObjeto{{ $objeto->id }}" tabindex="-1" role="dialog"
            aria-labelledby="informacaoObjeto{{ $objeto->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="informacaoObjeto{{ $objeto->id }}">Informações do
                            objeto #{{ $objeto->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="id">Número</label>
                                <input type="text" class="form-control" id="id" name="id"
                                    value="{{ $objeto->id }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="id">Objeto</label>
                                <input type="text" class="form-control" id="objeto" name="objeto"
                                    value="{{ $objeto->descricao }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="id">Tipo</label>
                                <input type="text" class="form-control" id="objeto" name="objeto"
                                    value="{{ $objeto->tipo->nome }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="destinatario">Destinatário:</label>
                                <input type="text" class="form-control" id="destinatario" name="destinatario"
                                    value="{{ $objeto->cliente->nome }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="id">Cadastrado por:</label>
                                <input type="text" class="form-control" id="id"
                                    value="{{ $objeto->usuario->name }}"name="id" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" id="botoes">
                        <button title="Editar Objeto" type="button" class="btn btn-secondary btn-sm"
                            data-dismiss="modal"><i class="fa fa-edit"></i> Editar</button>
                        <button title="Imprimir Protocolo" type="button" class="btn btn-info btn-sm"><i
                                class="fa fa-print" aria-hidden="true"></i> Imprimir Protocolo</button>

                        <form action="{{ route('deletaRota', ['id' => $objeto->id]) }}" method="post"
                            onsubmit="return confirm('Tem certeza que deseja excluir este item?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancelar
                                envio</button>
                        </form>
                    </div>
                    <center>
                        <form method="POST" action="{{ route('enviaRota') }}">
                            @csrf
                            <input type="hidden" name="objeto_id" value="{{ $objeto->id }}">
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
        {{-- FIM MODAL Objetos aguardando envio Na pontual  --}}


        {{-- MODAL Objetos aguardando envio No Cliente  --}}
        <div class="modal fade" id="informacaoObjeto{{ $objeto->id }}" tabindex="-1" role="dialog"
            aria-labelledby="informacaoObjeto{{ $objeto->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="informacaoObjeto{{ $objeto->id }}">
                            Informações do
                            objeto #{{ $objeto->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="id">Número</label>
                                <input type="text" class="form-control" id="id" name="id"
                                    value="{{ $objeto->id }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="id">Objeto</label>
                                <input type="text" class="form-control" id="objeto" name="objeto"
                                    value="{{ $objeto->descricao }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="id">Tipo</label>
                                <input type="text" class="form-control" id="objeto" name="objeto"
                                    value="{{ $objeto->tipo->nome }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="destinatario">Destinatário:</label>
                                <input type="text" class="form-control" id="destinatario" name="destinatario"
                                    value="{{ $objeto->cliente->nome }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="id">Cadastrado por:</label>
                                <input type="text" class="form-control" id="id"
                                    value="{{ $objeto->usuario->name }}"name="id" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" id="botoes">
                        <button title="Editar Objeto" type="button" class="btn btn-secondary btn-sm"
                            data-toogle="modal" data-target=""><i class="fa fa-edit"></i> Editar</button>
                        <button title="Imprimir Protocolo" type="button" class="btn btn-info btn-sm"><i
                                class="fa fa-print" aria-hidden="true"></i> Imprimir Protocolo</button>
                        <a onclick="return confirm('Tem certeza que deseja cancelar o envio deste objeto?')"
                            href="controller/cancelar_objeto.php?objeto_id=11412">
                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancelar
                                Envio</button>
                        </a>
                    </div>
                    <center> <a onclick="return confirm('Tem certeza que deseja colocar este objeto em rota?')"
                            href="controller/incluir_rota.php?objeto_id=11412" alt="Incluir na rota">
                            <button type="button" class="btn btn-success btn-sm text-center"><i
                                    class="fa fa-motorcycle"></i> Incluir na
                                Rota</button>
                        </a></center>
                </div>
            </div>
        </div>
        {{-- FIM MODAL Objetos aguardando envio No Cliente  --}}
    @endforeach
    {{-- modal cadastro --}}
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
    {{-- FIM MODAL CADASTRO --}}
@endsection
