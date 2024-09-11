@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/home.scss'])
@endsection

@section('content')
    <div class="container" id="home">
        @if (Auth::user() == null)
            <h1 class="guest">Registrati o fai il login!</h1>
        @else
        <h1 class="mb-3">Dashboard</h1>
        <div id="profile" class="p-3 col-12 col-lg-8 col-xl-6 d-flex">
            @if(Auth::user()->image != null)
                <img src="{{ asset('storage/uploads/' . Auth::user()->image) }}" alt="profile picture">
            @else
                <article class="img"><span>{{Auth::user()->name[0]}}{{Auth::user()->lastname[0]}}</span></article>
            @endif
            <div class="info ps-5 d-flex flex-column justify-content-center">
                <h2>{{Auth::user()->name}} {{Auth::user()->lastname}}</h2>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
        <section id="buttons" class="col-12 my-5 d-flex flex-column d-md-block flex-wrap">
            <a href="{{ Route('apartments.create') }}" class="p-3 me-2 text-center">
                Aggiungi un nuovo appartamento
            </a>
            <a href="{{ Route('apartments.index') }}" class="p-3 me-2 mt-2 text-center">
                I tuoi appartamenti
            </a>
        </section>
        <section id="apartments">
            <h2>Link rapidi</h2>
            @foreach ($apartments as $apartment)
                <a href="{{ Route('apartments.show',$apartment) }}" class="my-3 p-3 rounded-3 d-flex align-items-center">
                    <img class="mx-3" src="{{ asset('storage/' . $apartment->image) }}" alt="apartment image">
                    <span>{{$apartment->name}} - {{$apartment->address}}</span>
                </a>
            @endforeach
        </section>
        @endif
    </div>
@endsection
