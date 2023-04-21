@extends('layouts.app')

@section('content')
    <br>
    <h3> Pesquisar objetos </h3>
    <hr>
    <div class="container">
        <div class="card border-info">
          <div class="card-header" id="icon">
            Busca por <strong>Cliente</strong>
          </div>
          <div class="card-body">
            <form method="post" action="objetoResult.php" class="d-flex justify-content-center">
              <div class="form-row align-items-center">
                <div class="col-lg-12 text-center">
                  <form method="" action="">
                    @foreach ($clientes as $cliente)
                    <select name="op_clientes" id="op_clientes" class="form-control form-control">
                      <option value="">Selecione uma opção</option>
                      <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    </select>
                    <br>
                    @endforeach
                    <button type="submit" value="Consultar" class="btn btn-primary"> Consultar </button>
                </form>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card border-info">
            <div class="card-header" id="icon">
              Busca por <strong>tipo de objeto</strong>
            </div>
            <div class="card-body">
              <form method="post" action="objetoResult.php" class="d-flex justify-content-center">
                <div class="form-row align-items-center">
                  <div class="col-lg-12 text-center">
                    <form method="" action="">
                        @foreach ($tiposObjetos as $tipo)
                        <select name="op_clientes" id="op_clientes" class="form-control">
                          <option value="">Selecione uma opção</option>
                          <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                        </select>
                        <br>
                        @endforeach
                        <button type="submit" value="Consultar" class="btn btn-primary"> Consultar </button>
                    </form>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="card border-info">
            <div class="card-header" id="icon">
              Busca por <strong>id do Objeto</strong>
            </div>
            <div class="card-body">
              <form method="post" action="objetoResult.php" class="d-flex justify-content-center">
                <div class="form-row align-items-center">
                  <div class="col-lg-12 text-center">
                    <form method="" action="">
                        <input type="number" id="op_clientes" class="form-control ">
                        <br>
                      <button type="submit" value="Consultar" class="btn btn-primary"> Consultar </button>
                    </form>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
@endsection