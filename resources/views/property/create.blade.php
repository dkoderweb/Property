@extends('layouts.app')

@section('content')
<style>

.img-thumbs {
  background: #eee;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
  margin: 1.5rem 0;
  padding: 0.75rem;
}
.img-thumbs-hidden {
  display: none;
}

.wrapper-thumb {
  position: relative;
  display:inline-block;
  margin: 1rem 0;
  justify-content: space-around;
}

.img-preview-thumb {
  background: #fff;
  border: 1px solid none;
  border-radius: 0.25rem;
  box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
  margin-right: 1rem;
  max-width: 140px;
  padding: 0.25rem;
}

.remove-btn{
  position:absolute;
  display:flex;
  justify-content:center;
  align-items:center;
  font-size:.7rem;
  top:-5px;
  right:10px;
  width:20px;
  height:20px;
  background:white;
  border-radius:10px;
  font-weight:bold;
  cursor:pointer;
}

.remove-btn:hover{
  box-shadow: 0px 0px 3px grey;
  transition:all .3s ease-in-out;
}
</style>
<div class="container">
    <div class="text-end"> 
        <a class="btn btn-primary" href="{{route('home')}}">Cancel</a>
    </div>
    <div>
        <form method="post" action="{{route('property.store')}}" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <input type="text" name="type" class="form-control" value="{{ old('type') }}" required>
                        @error('type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Address 2</label>
                        <input type="text" name="address_2" class="form-control" value="{{ old('address_2') }}">
                        @error('address_2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                 <!-- Add similar markup for other fields with validation -->
                 <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Country <span class="text-danger">*</span></label>
                        <select  id="country-dropdown" name="country_id" class="form-control" required>
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                 <!-- Add similar markup for other fields with validation -->
                 <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">State <span class="text-danger">*</span></label>
                        <select id="state-dropdown"  name="state_id" class="form-control" required>
                        </select>
                        @error('state_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <select id="city-dropdown"  name="city_id" class="form-control" required>
                        </select>
                        @error('city_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
               
               
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Pincode <span class="text-danger">*</span></label>
                        <input type="number" name="pincode" class="form-control" value="{{ old('pincode') }}" required>
                        @error('pincode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Bedrooms <span class="text-danger">*</span></label>
                        <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms') }}" required>
                        @error('bedrooms')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Bathrooms <span class="text-danger">*</span></label>
                        <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms') }}" required>
                        @error('bathrooms')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Size Area <span class="text-danger">*</span></label>
                        <input type="number" name="size_area" class="form-control" value="{{ old('size_area') }}" required>
                        @error('size_area')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <input type="text" name="status" class="form-control" value="{{ old('status') }}" required>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Furnishing Status <span class="text-danger">*</span></label>
                        <input type="text" name="furnishing_status" class="form-control" value="{{ old('furnishing_status') }}" required>
                        @error('furnishing_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Developer</label>
                        <input type="text" name="developer" class="form-control" value="{{ old('developer') }}">
                        @error('developer')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" name="project_name" class="form-control" value="{{ old('project_name') }}">
                        @error('project_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Floor Number</label>
                        <input type="text" name="floor_number" class="form-control" value="{{ old('floor_number') }}">
                        @error('floor_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Transaction Type</label>
                        <input type="text" name="transaction_type" class="form-control" value="{{ old('transaction_type') }}">
                        @error('transaction_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Ownership Type</label>
                        <input type="text" name="ownership_type" class="form-control" value="{{ old('ownership_type') }}">
                        @error('ownership_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Facing</label>
                        <input type="text" name="facing" class="form-control" value="{{ old('facing') }}">
                        @error('facing')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Contact Details</label>
                        <input type="text" name="contact_details" class="form-control" value="{{ old('contact_details') }}">
                        @error('contact_details')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Amenities</label>
                        <input type="text" name="amenities" class="form-control" value="{{ old('amenities') }}">
                        @error('amenities')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Additional Details</label>
                        <input type="text" name="additional_details" class="form-control" value="{{ old('additional_details') }}">
                        @error('additional_details')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div> 
                </div>
                <!-- Add similar markup for other fields with validation -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Images</label>
                        <input type="file" multiple name="images[]" id="upload-img" class="form-control" accept="image/png, image/jpeg, image/jpg">
                    </div> 
                </div>
                <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
@section('script')

<script>

var imgUpload = document.getElementById('upload-img')
  , imgPreview = document.getElementById('img-preview')
  , imgUploadForm = document.getElementById('form-upload')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;

imgUpload.addEventListener('change', previewImgs, true);

function previewImgs(event) {
  totalFiles = imgUpload.files.length;
  
     if(!!totalFiles) {
    imgPreview.classList.remove('img-thumbs-hidden');
  }
  
  for(var i = 0; i < totalFiles; i++) {
    wrapper = document.createElement('div');
    wrapper.classList.add('wrapper-thumb');
    removeBtn = document.createElement("span");
    nodeRemove= document.createTextNode('x');
    removeBtn.classList.add('remove-btn');
    removeBtn.appendChild(nodeRemove);
    img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[i]);
    img.classList.add('img-preview-thumb');
    wrapper.appendChild(img);
    wrapper.appendChild(removeBtn);
    imgPreview.appendChild(wrapper);
   
    $('.remove-btn').click(function(){
      $(this).parent('.wrapper-thumb').remove();
    });    

  }
  
  
}
$(document).ready(function () { 
  $('#country-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#state-dropdown").html('');
      $.ajax({
          url: "{{url('api/fetch-states')}}",
          type: "POST",
          data: {
              country_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#state-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                  $("#state-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
              $('#city-dropdown').html('<option value="">-- Select City --</option>');
          }
      });
  });
 
  $('#state-dropdown').on('change', function () {
      var idState = this.value;
      $("#city-dropdown").html('');
      $.ajax({
          url: "{{url('api/fetch-cities')}}",
          type: "POST",
          data: {
              state_id: idState,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (res) {
              $('#city-dropdown').html('<option value="">-- Select City --</option>');
              $.each(res.cities, function (key, value) {
                  $("#city-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
          }
      });
  });

});
</script>
@endsection
