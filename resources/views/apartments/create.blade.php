@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/js/apartment-validation.js', 'resources/sass/form.scss', 'resources/js/tomtom.js'])
@endsection

@section('content')
<div class="container" id="create">
    <div class="row">
        <div class="col-12 p-3">
            <h1>Add a new apartment</h1>
        </div>

        <div class="col-10">
            <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group p-2">
                    <label class="mb-2" for="name">Apartment's name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Type a name for the apartment" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>
                </div>
                <div class="form-group p-2">
                    <label class="mb-2" for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Add a description" value="{{ old('description') }}">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>
                </div>
                <div class="form-group p-2">
                    <div class="form-group p-2">
                        <label for="address">Address:</label>

                        <input type="hidden" class="form-control" name="address" id="address" placeholder="Add a address" >
                        <div id="map" style="width:70%; height: 290px;" class="m-auto"></div>
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="error"></div>
                </div>
                <div class="form-group p-2">
                    <label class="mb-2" for="surface">Surface (in m2):</label>
                    <input type="number" class="form-control" name="surface" id="surface" placeholder="How many m2" value="{{ old('surface') }}">
                    @error('surface')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>
                </div>
                <div class="form-group p-2">
                    <label for="image">Want to edit the image?</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Upload an image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>
                </div>
                <div class="form-group p-2">
                    <label class="m-2" for="n_room">How many rooms?</label>
                    <input type="number" name="n_room" id="n_room" value="{{ old('n_room') }}">
                    @error('n_room')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>

                    <label class="m-2" for="n_bed">How many beds?</label>
                    <input type="number" name="n_bed" id="n_bed" value="{{ old('n_bed') }}">
                    @error('n_bed')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>

                    <label class="m-2" for="n_bath">How many bathrooms?</label>
                    <input type="number" name="n_bath" id="n_bath" value="{{ old('n_bath') }}">
                    @error('n_bath')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>
                </div>
                <div class="form-group p-2">
                    <label class="m-2" for="price">Price per night:</label>
                    <input type="price" name="price" id="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="error"></div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Publish apartment</button>
            </form>
        </div>
    </div>
</div>
@endsection
