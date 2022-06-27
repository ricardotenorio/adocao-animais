@extends('layouts.app')

@section('content')

<div class="container min-vh-100">

    <div class="row shadow d-flex justify-content-center mx-5 border bg-white rounded-2 border-secondary">

        <div class="card min-vh-50 max-vh-50 shadow-sm col-md-3 mt-2 mb-1 mx-2">
            <img class="card-img-top img-thumbnail"
                src="{{ $animal->foto ? asset('storage/' . $animal->foto->url) : asset('/images/not_found.png') }}"
                alt="">
            <div class="card-body h-25">
                <h2 class="card-title text-center">{{ $animal->nome }}</h2>
                <p class="text-muted">{{ $animal->cidade }}, {{ $animal->estado }}</p>
                <hr />

                <p class="card-text text-justify">
                    @isset($animal->descricao)
                    {{ substr($animal->descricao, 0, 140) }}
                    @else
                    Sem descrição
                    @endisset
                </p>

                <div class="d-grid d-block">
                    <a href="/animais/{{ $animal->id }}" class="btn btn-outline-primary btn-block">Visualizar</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection