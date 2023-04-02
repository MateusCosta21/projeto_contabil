@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 bg-info p-5 d-flex flex-column justify-content-center align-items-center">
            <!-- Coloque aqui seu conteúdo para o banner informativo -->
            <h1 style="margin-top: 45px;" id="titulo">Sistema Contabilidade</h1>
        </div>

        <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center align-items-center">
            <!-- Coloque aqui o formulário de login -->
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-wid">{{ __('Login') }}</button>
                            </div>
                        </div>
                
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection