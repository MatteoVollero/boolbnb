{{-- // Create a submit form accomodation for the UPRA --}}
@extends('UPRA.layouts.app')
@section('main_content')
    <div class="form_background">
        <div class="form_wrapper">
            <div class="form_text">
              <h1>Insert a new Accomodation</h1>
            </div>
       <form action="{{route('admin.accomodations.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            {{-- id input --}}
            <div class="form_group">
                <input type="hidden" class="form_input" id="user_id" name="user_id" required placeholder="Insert the User Id">
              </div>
              {{-- title input  --}}
            <div class="form_group">
              <label for="title">Title</label>
              <input type="text" class="form_input" id="title" name="title" required minlength="50" maxlength="300" placeholder="Insert the title" value="{{old("title")}}">
            </div>
            {{-- description input  --}}
            <div class="form_group">
                <label for="description">Description</label>
                <textarea class="form_input" id="description" name="description" required minlength="100" maxlength="800" placeholder="insert your description" cols="50" rows="10" value="{{old('description')}}"></textarea>
            </div>
            {{-- cover image input  --}}
            <div class="form_group">
                <label for="cover_image">Image</label>
                <input type="file" class="form_input" id="cover_image" name="cover_image" required accept="image/*" placeholder="choose the image">
            </div>
            {{-- slug input  --}}
            <div class="form_group">
                <label for="slug">Slug</label>
                <input type="text" class="form_input" id="slug" name="slug" required minlength="5" maxlength="300" placeholder="Insert the slug" value="{{old("slug")}}">
            </div>
            {{-- country input  --}}
            <div class="form_group">
                <label for="country">Country</label>
                <input type="text" class="form_input" id="country" name="country" required minlength="5" maxlength="100" placeholder="Insert the country" value="{{old("country")}}">
            </div>
            {{-- region input  --}}
            <div class="form_group">
                <label for="region">Region</label>
                <input type="text" class="form_input" id="region" name="region" required minlength="5" maxlength="100" placeholder="Insert the region" value="{{old("region")}}">
            </div>
            {{-- city input  --}}
            <div class="form_group">
                <label for="city">City</label>
                <input type="text" class="form_input" id="city" name="city" required minlength="5" maxlength="100" placeholder="Insert the city" value="{{old("city")}}">
            </div>
            {{-- address input  --}}
            <div class="form_group">
                <label for="address">Address</label>
                <input type="text" class="form_input" id="address" name="address" required minlength="5" maxlength="100" placeholder="Insert the address" value="{{old("address")}}">
            </div>
            {{-- zip code input  --}}
            <div class="form_group">
                <label for="zip_code">Zip Code</label>
                <input type="number" class="form_input" id="zip_code" name="zip_code" required minlength="5" maxlength="15" placeholder="Insert the zip code" value="{{old("zip_code")}}">
            </div>
            {{-- beds input  --}}
            <div class="form_group">
                <label for="beds">Beds</label>
                <input type="number" class="form_input" id="beds" name="beds" min="1" max="100" placeholder="Insert the numbers of beds" value="{{old("beds")}}">
            </div>
            {{-- rooms input  --}}
            <div class="form_group">
                <label for="rooms">Rooms</label>
                <input type="number" class="form_input" id="rooms" name="rooms" min="0" max="100" placeholder="Insert the numbers of rooms" value="{{old("rooms")}}">
            </div>
            <div class="form_group">
                <label for="toilets">Toilets</label>
                <input type="number" class="form_input" id="rooms" name="toilets" min="0" max="100" placeholder="Insert the numbers of toiltes" value="{{old("toilets")}}">
            </div>
            {{-- square meters input  --}}
            <div class="form_group">
                <label for="square_meters">Square Metres</label>
                <input type="number" class="form_input" id="square_meters" name="square_meters" required min="9" max="1200" placeholder="Insert the square meters" value="{{old("square_meters")}}">
            </div>
            {{-- price input  --}}
            <div class="form_group">
                <label for="price">Price</label>
                <input type="number" step=0.01 class="form_input" id="price" name="price" required min="30" max="9999.99" placeholder="Insert the price" value="{{old("price")}}">
            </div>          
            {{-- latitude input    --}}
            <div class="form_group">
                <label for="latitude">Latitude</label>
                <input type="number" step=0.000001 class="form_input" id="latitude" name="latitude" required min="-90" max="90.01" placeholder="Insert the latitude" value="{{old("latitude")}}">
            </div>           
            {{-- longitude input   --}}
            <div class="form_group">
                <label for="longitude">Latitude</label>
                <input type="number" step=0.000001 class="form_input" id="longitude" name="longitude" required min="-180.00" max="180.00" placeholder="Insert the longitude" value="{{old("longitude")}}">
            </div>       
            {{-- visible input       --}}
            <div class="form_group">
                <label for="visible">Visible</label>
                <input type="number" class="form_input" id="visible" name="visible" required min="0" max="1" placeholder="Insert the visibility" value="{{old("visible")}}">
            </div>           
            <div class="form_group">
                <label for="type_id">type</label>
                {{-- selecting type informations  --}}
                <select class="form_type" name="checklist" id="type">
                    <option value="accomodation">Accomodation</option>
                    <option value="room">Room</option>
                    <option value="mansion">Mansion</option>
                    <option value="house">House</option>
                    <option value="loft">Loft</option>
                    <option value="hostel">Hostel</option>
                </select>
              </div>
              {{-- services input   --}}
            <div class="form_group">
                <label for="services"><strong>Services:</strong></label>
                @foreach ($services as $service)
                  <div class="form_check form_group">
                      <input class="form_check" name="services[]" type="checkbox" id="service{{$service->id}}" value="{{$service->id}}">
                      <label class="form_check" for="service-{{$service->id}}">{{$service->service_name}}</label>
                  </div>
                @endforeach
              </div>
            <button type="submit" class="form_btn">Create</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>    
@endsection