@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/statistics.scss'])
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                My Apartment Statistics
            </h1>
        </div>
    </div>
</div>

@endsection
