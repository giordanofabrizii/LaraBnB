@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 p-3">
            <h1>Add a new apartment</h1>
        </div>

        <div class="col-10">
            <form action="{{ route('apartments.store') }}" method="POST">
                @csrf


                <div class="form-group p-2">
                    <label class="mb-2" for="name">Apartment name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Type a name for the apartment">
                    @error('name')
                        <div class="alert alert-danger">Type a valid name</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label class="mb-2" for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Add a description">
                    @error('description')
                        <div class="alert alert-danger">Type a description</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label class="mb-2" for="address">Address:</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Type the address">
                    @error('address')
                        <div class="alert alert-danger">Type a valid address</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label class="mb-2" for="surface">Surface (in m2):</label>
                    <input type="text" class="form-control" name="surface" id="description" placeholder="How many m2">
                    @error('surface')
                        <div class="alert alert-danger">Insert a valid number value</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label class="mb-2" for="image">Image Url</label>
                    <input type="text" class="form-control" name="image" id="image" placeholder="Enter a valid url">
                    @error('image')
                        <div class="alert alert-danger">Insert a valid url</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label class="me-2" for="n_room">How many rooms?</label>
                    <input type="number" name="n_room" id="n_room">

                    <label class="mx-2" for="n_bed">How many beds?</label>
                    <input type="number" name="n_bed" id="n_bed">

                    <label class="mx-2" for="n_bath">How many baths?</label>
                    <input type="number" name="n_bath" id="n_bath">
                </div>
                <div class="form-group p-2">
                    <label class="me-2" for="price">Price per night:</label>
                    <input type="text" name="price" id="price">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Publish apartment</button>
            </form>
        </div>
    </div>
</div>
@endsection
