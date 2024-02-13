@extends('layouts.app')

@section('content') 
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Property Details</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Title:</dt>
                    <dd class="col-sm-9">{{ $property->title }}</dd>

                    <dt class="col-sm-3">Price:</dt>
                    <dd class="col-sm-9">{{ $property->price }}</dd>

                    <dt class="col-sm-3">Description:</dt>
                    <dd class="col-sm-9">{{ $property->description }}</dd>

                    <dt class="col-sm-3">Address:</dt>
                    <dd class="col-sm-9">{{ $property->address }}</dd>

                    <dt class="col-sm-3">Address 2:</dt>
                    <dd class="col-sm-9">{{ $property->address_2 }}</dd>

                    <dt class="col-sm-3">City ID:</dt>
                    <dd class="col-sm-9">{{ $property->city->name }}</dd>

                    <dt class="col-sm-3">State ID:</dt>
                    <dd class="col-sm-9">{{ $property->state->name }}</dd>

                    <dt class="col-sm-3">Country ID:</dt>
                    <dd class="col-sm-9">{{ $property->country->name }}</dd>

                    <dt class="col-sm-3">Pincode:</dt>
                    <dd class="col-sm-9">{{ $property->pincode }}</dd>

                    <dt class="col-sm-3">Type:</dt>
                    <dd class="col-sm-9">{{ $property->type }}</dd>

                    <dt class="col-sm-3">Bedrooms:</dt>
                    <dd class="col-sm-9">{{ $property->bedrooms }}</dd>

                    <dt class="col-sm-3">Bathrooms:</dt>
                    <dd class="col-sm-9">{{ $property->bathrooms }}</dd>

                    <dt class="col-sm-3">Size/Area:</dt>
                    <dd class="col-sm-9">{{ $property->size_area }}</dd>

                    <dt class="col-sm-3">Status:</dt>
                    <dd class="col-sm-9">{{ $property->status }}</dd>

                    <dt class="col-sm-3">Furnishing Status:</dt>
                    <dd class="col-sm-9">{{ $property->furnishing_status }}</dd>

                    <dt class="col-sm-3">Developer:</dt>
                    <dd class="col-sm-9">{{ $property->developer }}</dd>

                    <dt class="col-sm-3">Project Name:</dt>
                    <dd class="col-sm-9">{{ $property->project_name }}</dd>

                    <dt class="col-sm-3">Floor Number:</dt>
                    <dd class="col-sm-9">{{ $property->floor_number }}</dd>

                    <dt class="col-sm-3">Transaction Type:</dt>
                    <dd class="col-sm-9">{{ $property->transaction_type }}</dd>

                    <dt class="col-sm-3">Ownership Type:</dt>
                    <dd class="col-sm-9">{{ $property->ownership_type }}</dd>

                    <dt class="col-sm-3">Facing:</dt>
                    <dd class="col-sm-9">{{ $property->facing }}</dd>

                    <dt class="col-sm-3">Contact Details:</dt>
                    <dd class="col-sm-9">{{ $property->contact_details }}</dd>

                    <dt class="col-sm-3">Amenities:</dt>
                    <dd class="col-sm-9">{{ $property->amenities }}</dd>

                    <dt class="col-sm-3">Additional Details:</dt>
                    <dd class="col-sm-9">{{ $property->additional_details }}</dd>
                    <dt class="col-sm-3">Images:</dt>
                    <dd class="col-sm-9">
                        @foreach($property->images as $image)
                            <img src="{{ asset('images/' . $image->image) }}" width="200px" alt="Property Image" class="img-thumbnail">
                        @endforeach
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection 
