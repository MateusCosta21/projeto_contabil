@section('modal')
    @foreach ($retornaCadastro as $objeto)
    <!-- Modal -->
    <div class="modal fade" id="atualizarStatusModal{{ $objeto->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="atualizarStatusModalLabel">Atualizar Status - {{$objeto->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="statusSelect">Status:</label>
                        <select class="form-control" id="statusSelect">
                            <option value="1">Entregue</option>
                            <option value="2">No Cliente</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
    
@endsection
