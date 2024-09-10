@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/statistics.scss', 'resources/js/stats.js'])
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Le statistiche dei miei appartamenti
            </h1>
        </div>
    </div>
    @foreach ($apartments as $apartment)
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <h2>{{$apartment->name}}</h2>
            <div class="graph" id="{{$apartment->id}}"></div>
        </div>
    </div>
    @endforeach
</div>

@endsection



