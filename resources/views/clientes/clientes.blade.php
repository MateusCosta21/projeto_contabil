@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{ route('cadastra_cliente') }}"><button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#novoClienteModal">Novo Cliente</button></a>
          <hr>
        </div>
    </div>
</div>
@endsection
