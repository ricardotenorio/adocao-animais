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

                @if ($animal->status == 'adoção' && $animal->user_id != auth()->id())
                <div class="d-flex justify-content-end">
                    <form method="POST" action="/adocoes">
                        @csrf
                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                        <button class="btn btn-outline-danger btn-block" type="submit">Adotar</button>
                    </form>
                </div>
                @endif

            </div>
        </div>

        @if ($adocoes && $animal->status == 'adoção')
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adocoes as $adocao)
                <tr>
                    <th>{{ explode(' ', $adocao->created_at)[0] }}</th>
                    <td>
                        <a href="/perfil/{{ $adocao->user->id }}" class="text-decoration-none">
                            {{ $adocao->user->name }}
                        </a>
                    </td>
                    <td>{{ $adocao->status }}</td>
                    <td>
                        @if($adocao->status != "cancelada")
                        <form method="POST" action="/adocoes/{{ $adocao->id }}">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="status" value="concluida">
                            <input type="hidden" name="animal_id" value="{{ $adocao->animal_id }}">
                            <button class="btn btn-danger" type="submit">Finalizar</button>
                        </form>

                        @else
                        <button class="btn btn-secondary" disabled>Finalizar</a>
                            @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </div>
</div>

@endsection