@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/home.scss'])
@endsection

@section('content')
    <div class="container" id="home">
        @if (Auth::user() == null)
            <h1 class="guest">Registrati o fai il login!</h1>
        @else
        <h1 class="mb-4">Dashboard</h1>
        <div class="row mb-3 d-flex justify-content-between">
            <div id="profile" class="p-3  col-lg-6 col-md-12 col-sm-12 d-flex align-items-center">
                @if(Auth::user()->image != null)
                    <img class="ms-3" src="{{ asset('storage/uploads/' . Auth::user()->image) }}" alt="profile picture">
                @else
                    <article class="ms-3 img"><span>{{Auth::user()->name[0]}}{{Auth::user()->lastname[0]}}</span></article>
                @endif
                <div class="info me-2 ps-5 d-flex flex-column justify-content-center">
                    <h2>{{Auth::user()->name}} {{Auth::user()->lastname}}</h2>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
            <section id="buttons" class="col-lg-5 col-md-12 col-12 my-5 me-3 d-flex flex-column flex-wrap">
                <a href="{{ Route('apartments.create') }}" class="p-3 m-2 text-center rounded-3">
                    Aggiungi un nuovo appartamento
                </a>
                <a href="{{ Route('apartments.index') }}" class="p-3 m-2 mt-2 text-center rounded-3">
                    I tuoi appartamenti
                </a>
            </section>
        </div>

        <section id="apartments" class="mt-lg-5 mt-3">
            <h2 class="mb-3">Link rapidi</h2>
            <div class="row d-flex justify-content-between">
                @foreach ($apartments as $apartment)
                <div class="d-flex col-lg-4 col-md-6 col-12 p-3 p-md-2">
                    <div class="card">
                        <div class="card-top">
                            <a href="{{ Route('apartments.show',$apartment) }}">
                                <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$apartment->name}}</h5>
                            <p class="card-text">{{$apartment->address}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
@endsection
