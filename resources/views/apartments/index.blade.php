@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/index.scss'])
@endsection


@section('content')
<div class="container" id="index">
    <div class="row d-flex flex-row-reverse">
        <div class="col-3">
            <a class="btn btn-warning" href="{{route('apartments.trashed')}}">Bin</a>
            <a class="btn btn-success" href="{{route('apartments.create')}}">Register an apartment</a>
        </div>
    </div>

    <div class="row">
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
                                    <a href=""><i class="fa-regular fa-message mx-2"></i></a>
                                    <a href=""><i class="fa-solid fa-chart-column mx-2"></i></a>
                                    <div id="profile" class="dropdown ">
                                        <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-gear mx-2"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('apartments.edit', $apartment) }}">
                                                Modifica
                                            </a>
                                            <form action="{{route('apartments.destroy', $apartment)}}" class="form-delete" method="POST" data-apartment-name="{{$apartment->name}}">
                                                @method("delete")
                                                @csrf
                                                <button class="dropdown-item text-danger" href="">
                                                    Elimina
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
