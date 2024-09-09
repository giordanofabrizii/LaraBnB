@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/statistics.scss', 'resources/js/stats.js'])
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                My Apartment Statistics
            </h1>
        </div>

        <div class="col-6">
            <div style="width: 800px;"><canvas id="statsChart"></canvas></div>
        </div>
    </div>
</div>

@endsection
