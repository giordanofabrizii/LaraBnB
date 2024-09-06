@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/index.scss'])
@endsection


@section('content')

<div class="container" id="index">

    <div class="col-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col" class="text-center">Visibilità</th>
                    <th scope="col" class="text-center">Camere da letto</th>
                    <th scope="col" class="text-center">Letti</th>
                    <th scope="col" class="text-center">bagni</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($apartments as $apartment)
                    @if (Auth::user()->id == $apartment['user_id'])
                        <tr>
                            <td class="d-flex">
                                <img class="mx-3" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="">
                                <div>
                                    <strong>{{ $apartment->name}}</strong>
                                    <p>{{ $apartment->address}}</p>
                                </div>
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
                                            <a class="dropdown-item" href="{{-- {{ route('logout') }} --}}">
                                                Modifica
                                            </a>
                                            <a class="dropdown-item text-danger" href="{{-- {{ route('logout') }} --}}">
                                                Elimina
                                            </a>
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
