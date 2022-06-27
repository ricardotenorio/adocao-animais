@extends('layouts.app')

@section('content')


<div class="container min-vh-100">

    <div class="d-flex justify-content-center my-2">
        <form class="w-lg-25" action="/">
            @csrf
            <div class="input-group align-items-center">
                <input type="text" name="filtro" class="form-control" placeholder="buscar..." />
                
                <button type="submit" class="btn btn-primary rounded-1">
                    Buscar
                </button>
                
                <div class="form-check ms-3">
                    <input class="form-check-input" type="radio" name="tipo" id="gato" value="gato" checked>
                    <label class="form-check-label" for="gato">
                        Gato
                    </label>
                </div>
                
                <div class="form-check ms-3">
                    <input class="form-check-input" type="radio" name="tipo" id="cachorro" value="cachorro">
                    <label class="form-check-label" for="cachorro">
                        Cachorro
                    </label>
                </div>
            </div>
        </form>
    </div>

    <div class="row shadow d-flex justify-content-center mx-5 border bg-white rounded-2 border-secondary">

        @foreach ($animais as $animal)

        <div class="card min-vh-50 max-vh-50 shadow-sm col-md-3 mt-2 mb-1 mx-2">
            <img class="card-img-top img-thumbnail"
                src="{{ $animal->foto ? asset('storage/' . $animal->foto->url) : asset('/images/not_found.png') }}"
                alt="">
            <div class="card-body h-25">
                <h4 class="card-title text-center">{{ $animal->nome }}</h2>
                <p class="text-muted">{{ $animal->cidade }}, {{ $animal->estado }}</p>
                <p class="text-muted">{{ $animal->tipo }}</p>
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

        @endforeach

    </div>
</div>

@endsection