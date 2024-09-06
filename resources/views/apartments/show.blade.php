@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection

@section('content')
<div class="container apartment-show" id="show">
    <div class="row">
        <!-- Colonna per l'immagine dell'appartamento -->
        <div class="apartment-img col-lg-8 col-md-7 col-sm-12 m-3">
            <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}" class="img-fluid apartment-image rounded shadow">
        </div>
        <!-- Colonna principale con i dettagli dell'appartamento -->
        <div class="col-lg-4 col-md-5 col-sm-12 mb-4">
            <h1 class="apartment-name">{{ $apartment->name }}</h1>
            <p class="apartment-description"><strong></strong> {{ $apartment->description }}</p>
            <p class="apartment-surface"><strong>Superfice:</strong> {{ $apartment->surface }} m²</p>
            <p class="apartment-rooms"><strong>Stanze:</strong> {{ $apartment->n_room }}</p>
            <p class="apartment-beds"><strong>Letti:</strong> {{ $apartment->n_bed }}</p>
            <p class="apartment-bathrooms"><strong>bagni:</strong> {{ $apartment->n_bath }}</p>
            <p class="apartment-address"><strong>Indirizzo:</strong> {{ $apartment->address }}</p>
            <p class="apartment-price"><strong>Prezzo:</strong> €{{ $apartment->price }}</p>
            <p class="apartment-lat-lng"><strong>Latitudine:</strong> {{ $apartment->latitude }}, <strong>Longitudine:</strong> {{ $apartment->longitude }}</p>
            <p class="apartment-created"><strong>Creato il giorno:</strong> {{ $apartment->created_at }}</p>
            <p class="apartment-updated"><strong>Ultimo aggiornamento:</strong> {{ $apartment->updated_at }}</p>
        </div>
        <div class="col-3">
            <button class="btn custom-btn"><a href="{{ route('apartments.edit', $apartment->id) }}">Modifica</a></button>
        </div>
    </div>
</div>
@endsection
