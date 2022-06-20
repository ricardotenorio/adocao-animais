@extends('layouts.app')

@section('content')

    @foreach ($animais as $animal)
        
        <a href="/animais/{{ $animal->id }}">
        <h2>Id: {{ $animal->id }}</h2>
        <h2>Nome: {{ $animal->nome }}</h2>
        <h3>cidade: {{ $animal->cidade }}</h3>
        <h3>estado: {{ $animal->estado }}</h3>
        <h3>descrição: {{ $animal->descricao }}</h3>
        </a>
        
        <br>
        <br>
        <br>

    @endforeach

@endsection