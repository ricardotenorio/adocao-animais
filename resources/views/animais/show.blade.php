@extends('layouts.app')

@section('content')

<div class="container min-vh-100">

    <div class="row shadow d-flex justify-content-center mx-5 border bg-white rounded-2 border-secondary">

        <div class="card shadow-sm col-md-8 mt-4 mb-4 mx-2">
            <img class="card-img-top img-fluid"
                src="{{ $animal->foto ? asset('storage/' . $animal->foto->url) : asset('/images/not_found.png') }}"
                alt="">
            <div class="card-body h-25">
                <h2 class="card-title text-center">{{ $animal->nome }}</h2>
                <p class="text-muted">{{ $animal->cidade }}, {{ $animal->estado }}</p>
                <hr>
                <p class="my-1">Situação: {{ $animal->status }}</p>
                <p class="my-1">Raça: {{ $animal->raca ? : "Não Informada" }}</p>
                <p class="my-1">Idade: {{ $animal->idade ? : "Não Informada" }}</p>

                <p class="my-1">
                    Endereço:
                    @isset($animal->rua)
                    {{ $animal->endereco() }}
                    @else
                    Indisponível
                    @endisset
                </p>

                <hr>

                <p class="card-text text-justify">
                    @isset($animal->descricao)
                    {{ substr($animal->descricao, 0, 140) }}
                    @else
                    Sem descrição
                    @endisset
                </p>

                <div class="d-flex justify-content-end">
                    <form method="POST" action="/adocoes">
                        @csrf
                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                        <button class="btn btn-outline-danger btn-block" type="submit">Adotar</button>
                    </form>
                </div>


            </div>
        </div>

    </div>
</div>

@endsection