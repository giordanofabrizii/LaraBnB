@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/home.scss'])
@endsection

@section('content')
    <div class="container" id="home">
        <h1>Dashboard</h1>
        <div id="profile" class="p-3 col-8">
            @if(Auth::user()->image != null)
                <img src="{{Auth::user()->image}}" alt="profile picture">
            @else
                <article class="img"><span>{{Auth::user()->name[0]}}{{Auth::user()->lastname[0]}}</span></article>
            @endif
            <div class="info ps-5 d-flex flex-column justify-content-center">
                <h2>{{Auth::user()->name}} {{Auth::user()->lastname}}</h2>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
        <section id="buttons" class="col-12 my-4">
            <a href="" class="col-3 p-3 rounded-3 me-2">
                <span>New Apartment</span>
            </a>
            <a href="" class="col-3 p-3 rounded-3 me-2">
                <span>Yours Apartment</span>
            </a>
        </section>
        <section id="apartments" class="pt-3">
            <h2>I tuoi appartamenti</h2>
            @foreach ($apartments as $apartment)
                <article class="my-3 p-3 rounded-3 d-flex ">
                    <img src="{{$apartment->image}}" alt="apartment image">
                    <span>{{$apartment->name}} - {{$apartment->address}}</span>
                </article>
            @endforeach
        </section>
    </div>
@endsection
