@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/js/apartment-validation.js', 'resources/sass/form.scss', 'resources/js/tomtom.js'])
@endsection

@section('content')
    <div class="container" id="edit-form">
        <div class="row">
            @if (Auth::user()->id == $apartment['user_id'])
                <div class="col-12">
                    <h1>Edit apartment</h1>
                </div>
                <div class="col-12">
                    <form name="form" id="form" action="{{ route('apartments.update', $apartment) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group p-2">
                            <label for="name">Apartment name:</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Type a name for the apartment" value="{{ old('name', $apartment->name) }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <div class="form-group p-2">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" name="description" id="description"
                                placeholder="Add a description" value="{{ old('description', $apartment->description) }}">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <div class="form-group p-2 mb-1 mt-1">

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            L'indirizzo corrente è: {{ old('address', $apartment->address) }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p><strong>Modifica l'indirizzo:</strong></p>
                                            <input type="hidden" class="form-control" name="address" id="address"
                                                placeholder="Add a address" value="{{ old('address', $apartment->address) }}">
                                            <div id="map" style="width:70%; height: 290px;" class="m-auto"></div>
                                            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $apartment->latitude) }}">
                                            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $apartment->longitude) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <div class="form-group p-2">
                            <label for="surface">Surface (in m2):</label>
                            <input type="number" class="form-control" name="surface" id="surface"
                                placeholder="How many m2" value="{{ old('surface', $apartment->surface) }}">
                            @error('surface')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <div class="form-group p-2 align-items-center d-flex flex-column">
                            <label for="image">Want to edit the image?</label>
                            <img src="{{ asset('storage/' . $apartment->image) }}" class="m-4"   alt="apartment old image" >
                            <input type="file" class="form-control" name="image" id="image"
                                placeholder="Upload an image">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <div class="form-group p-2 d-flex flex-column align-items-start">
                            <label class="m-2" for="n_room">How many rooms?</label>
                            <input type="number" name="n_room" id="n_room"
                                value="{{ old('n_room', $apartment->n_room) }}">
                            @error('n_room')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>

                            <label class="m-2" for="n_bed">How many beds?</label>
                            <input type="number" name="n_bed" id="n_bed"
                                value="{{ old('n_bed', $apartment->n_bed) }}">
                            @error('n_bed')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>

                            <label class="m-2" for="n_bath">How many bathrooms?</label>
                            <input type="number" name="n_bath" id="n_bath"
                                value="{{ old('n_bath', $apartment->n_bath) }}">
                            @error('n_bath')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="service_id">Services</label>
                            <div class="customChechBoxHolder d-flex flex-wrap gap-2 m-2">
                                @foreach ($services as $service)
                                    <input type="checkbox" class="btn-check" value="{{ $service->id }}"
                                        name="services[]" id="service-check-{{ $service->id }}" autocomplete="off"
                                        {{ in_array($service->id, old('services', $apartment->services->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary"
                                        for="service-check-{{ $service->id }}">{{ $service->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group p-2 mt-2">
                            <label class="m-2" for="price">Price per night:</label>
                            <input type="price" name="price" id="price"
                                value="{{ old('price', $apartment->price) }}">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="error"></div>
                        </div>
                        <button id="submit" type="submit" class="btn btn-primary mt-3">Edit apartment</button>
                    </form>
                </div>
            @else
                {{ @abort(404) }} {{-- if it's not your apartment --}}
            @endif
        </div>
    </div>
@endsection
