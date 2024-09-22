@extends('layouts.app')

@section('custom-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> {{--  ChartJS --}}
@endsection


@section('custom-scss')
    @vite(['resources/sass/statistics.scss', 'resources/js/statistics.js'])
@endsection


@section('content')
<div class="container graphs off">
    <div class="row">
        <div class="col-12">
            <h1>
                Le statistiche dei miei appartamenti
            </h1>
        </div>
    </div>

    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="col-4">
            <a href="{{ route('apartments.show', $apartment)}}">
                <article class="p-2">
                    <div class="graph mb-1" id="{{$apartment->id}}"></div>
                    <h2 class="m-0">{{$apartment->name}}</h2>
                </article>
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="loading on">
    <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
        <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
        <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
        <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
    </svg>
</div>


@endsection



