@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/index.scss'])
@endsection


@section('content')
<div class="container" id="index">
    <div class="row">
        <h1 class="col-12">Trashed</h1>
        @if (count($apartments) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" class="text-center">Visibilità</th>
                        <th scope="col" class="text-center">Camere da letto</th>
                        <th scope="col" class="text-center">Letti</th>
                        <th scope="col" class="text-center">Bagni</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($apartments as $apartment)
                        @if (Auth::user()->id == $apartment['user_id'])
                            <tr>
                                <td>
                                    <a class="d-flex apartment-info" href="{{ route('apartments.show',$apartment) }}">
                                        <img class="mx-3" src="{{ asset('storage/' . $apartment->image) }}" alt="apartment image">
                                        <div>
                                            <strong>{{ $apartment->name}}</strong>
                                            <p>{{ $apartment->address}}</p>
                                        </div>
                                    </a>
                                </td>
                                    @if ( $apartment->visible == 1)
                                        <td class="text-center align-middle"><div class="green circle mx-auto"></div>
                                        </td>
                                    @else
                                        <td class="text-center align-middle"><div class="grey circle mx-auto"></td>
                                    @endif
                                <td class="text-center align-middle">{{ $apartment->n_room}}</td>
                                <td class="text-center align-middle">{{ $apartment->n_bed}}</td>
                                <td class="text-center align-middle">{{ $apartment->n_bath}}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <form action="{{route('apartments.restore',$apartment)}}" method="POST">
                                            @method('PATCH')
                                            @csrf

                                            <button class="ms-2 btn btn-warning" type="submit">Restore</button>
                                        </form>
                                        <form action="{{route('apartments.forceDestroy', $apartment)}}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button class="ms-2 btn btn-danger" type="submit">Destroy</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        @else
            <p>No deleted apartment</p>
        @endif
    </div>
</div>

@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
