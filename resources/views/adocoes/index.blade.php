@extends('layouts.app')

@section('content')

<div class="container min-vh-100">

    <div class="row shadow d-flex justify-content-center mx-5 border bg-white rounded-2 border-secondary">

        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Finalizada Em</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adocoes as $adocao)
                <tr>
                    <th>{{ $adocao->created_at }}</th>
                    <td>
                        @isset($adocao->animal)
                        {{ $adocao->animal->nome }}
                        @endisset
                    </td>
                    <td>{{ $adocao->status }}</td>
                    <td>{{ $adocao->finalizadaEm }}</td>
                    <td>
                        @if($adocao->status == "em andamento")
                        <form method="POST" action="/adocoes/{{ $adocao->id }}">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="animal_id" value="{{ $adocao->animal->id }}">
                            <input type="hidden" name="status" value="cancelada">
                            <button class="btn btn-danger" type="submit">Cancelar</button>
                        </form>
                        
                        @else
                        <button class="btn btn-secondary" disabled>Cancelar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection