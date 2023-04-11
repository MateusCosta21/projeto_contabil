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
                  <div class="huge text-white">30</div>
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
                  <div class="huge text-white">30</div>
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
</div>
@endsection
