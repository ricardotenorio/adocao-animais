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
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animais as $animal)
                <tr>
                    <th>{{ explode(' ', $animal->created_at)[0] }}</th>
                    <td>
                        <a href="/animais/{{ $animal->id }}">
                            {{ $animal->nome }}
                        </a>
                    </td>
                    <td>{{ $animal->status }}</td>
                    <td>
                        @if($animal->status == "adoção")
                        <form method="POST" action="/animais/{{ $animal->id }}">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Apagar</button>
                        </form>

                        @else
                        <button class="btn btn-secondary" disabled>Apagar</a>
                            @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection