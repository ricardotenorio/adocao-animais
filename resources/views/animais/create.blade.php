@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Cadastrar') }}</div>

        <div class="card-body">
          <form method="POST" action="/animais">
            @csrf

            <div class="row mb-3">
              <label for="nome" class="col-md-4 col-form-label text-md-end">Nome</label>

              <div class="col-md-6">
                <input id="nome" type="text" class="form-control @error('name') is-invalid @enderror" name="nome"
                  value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="tipo" class="col-md-4 col-form-label text-md-end">tipo</label>

              <div class="col-md-6">
                <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo"
                  value="{{ old('tipo') }}" required autocomplete="tipo">

                @error('tipo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="descricao" class="col-md-4 col-form-label text-md-end">descricao</label>

              <div class="col-md-6">
                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror"
                  name="descricao" value="{{ old('descricao') }}" required autocomplete="descricao">

                @error('descricao')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="raca" class="col-md-4 col-form-label text-md-end">Raça</label>

              <div class="col-md-6">
                <input id="raca" type="text" class="form-control @error('raca') is-invalid @enderror" name="raca"
                  value="{{ old('raca') }}" autocomplete="raca">

                @error('raca')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="idade" class="col-md-4 col-form-label text-md-end">Idade</label>

              <div class="col-md-6">
                <input id="idade" type="number" class="form-control @error('idade') is-invalid @enderror" name="idade"
                  value="{{ old('idade') }}" autocomplete="idade">

                @error('idade')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="rua" class="col-md-4 col-form-label text-md-end">Rua</label>

              <div class="col-md-6">
                <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua"
                  value="{{ old('rua') }}" autocomplete="rua">

                @error('rua')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="numero" class="col-md-4 col-form-label text-md-end">Número</label>

              <div class="col-md-6">
                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero"
                  value="{{ old('numero') }}" autocomplete="numero">

                @error('numero')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="bairro" class="col-md-4 col-form-label text-md-end">Bairro</label>

              <div class="col-md-6">
                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                  value="{{ old('bairro') }}" autocomplete="bairro">

                @error('bairro')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="complemento" class="col-md-4 col-form-label text-md-end">Complemento</label>

              <div class="col-md-6">
                <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror"
                  name="complemento" value="{{ old('complemento') }}" autocomplete="complemento">

                @error('complemento')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="cidade" class="col-md-4 col-form-label text-md-end">Cidade</label>

              <div class="col-md-6">
                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                  value="{{ old('cidade') }}" required autocomplete="cidade">

                @error('cidade')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="estado" class="col-md-4 col-form-label text-md-end">Estado</label>

              <div class="col-md-6">
                <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado"
                  value="{{ old('estado') }}" required autocomplete="estado">

                @error('estado')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Cadastrar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection