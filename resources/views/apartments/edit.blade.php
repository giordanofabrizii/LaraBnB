@extends('layouts.app')

@section('content')
<div class="container" id="edit-form">
    <div class="row">
        @if (Auth::user()->id == $apartment['user_id'])
            <div class="col-12">
                <h1>Edit apartment</h1>
            </div>
            <div class="col-12">
                <form action="{{ Route('apartments.update', $apartment) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group p-2">
                        <label for="name">Apartment name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Type a name for the apartment" value="{{ old('name', $apartment->name) }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Add a description" value="{{ old('description', $apartment->description) }}">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label for="surface">Surface (in m2):</label>
                        <input type="number" class="form-control" name="surface" id="description" placeholder="How many m2" value="{{ old('surface', $apartment->surface) }}">
                        @error('surface')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label for="image">Image Url</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Enter a valid url" value="{{ old('image', $apartment->image) }}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label class="m-2" for="n_room">How many rooms?</label>
                        <input type="number" name="n_room" id="n_room" value="{{ old('n_room', $apartment->n_room) }}">
                        @error('n_room')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label class="m-2" for="n_bed">How many beds?</label>
                        <input type="number" name="n_bed" id="n_bed" value="{{ old('n_bed', $apartment->n_bed) }}">
                        @error('n_bed')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label class="m-2" for="n_bath">How many bathrooms?</label>
                        <input type="number" name="n_bath" id="n_bath" value="{{ old('n_bath', $apartment->n_bath) }}">
                        @error('n_bath')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label class="m-2" for="price">Price per night:</label>
                        <input type="price" name="price" id="price" value="{{ old('price', $apartment->price) }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Edit apartment</button>
                </form>
            </div>
        @else
            <h1>You can edit only your apartments</h1>
        @endif
    </div>
</div>
@endsection
