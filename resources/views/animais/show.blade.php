@extends('layouts.app')

@section('content')
    
    <img src="{{ $animal->foto ? asset('storage/' . $animal->foto->url) : asset('/images/not_found.png') }}" alt="">
    <h2>Nome: {{ $animal->nome }}</h2>
    <h3>cidade: {{ $animal->cidade }}</h3>
    <h3>estado: {{ $animal->estado }}</h3>
    <h3>status: {{ $animal->status }}</h3>
    <h3>descrição: {{ $animal->descricao }}</h3>

@endsection