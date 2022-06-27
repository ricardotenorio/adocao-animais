@extends('layouts.app')

@section('content')

{{-- {{dd($user)}} --}}

<div class="container">

    <div class="row shadow d-flex justify-content-center mx-5 border bg-white rounded-2 border-secondary">

        <div class="card shadow-sm col-md-8 my-4 mx-2">

            <div class="d-flex justify-content-center h-25">
                <img class="card-img-top img-thumbnail mh-100 w-auto" src="{{ asset('/images/user_placeholder.png') }}" alt="">
            </div>

            <div class="card-body mt-2">
                <h2 class="card-title text-center">{{ $user->name . ' ' . $user->sobrenome }}</h2>
                <p class="text-muted">{{ $user->cidade }}, {{ $user->estado }}</p>
                <hr>
                <h4>Contato</h3>
                <p class="ms-5">Email: {{ $user->email }}</p>
                <hr>
            </div>
        </div>

    </div>
</div>

@endsection