{{-- // Edit form for UPRA Accomodations --}}
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
              <input type="text" class="form_input" id="title" name="title" required minlength="1" maxlength="300" placeholder="Insert the title" value="{{old("title")}}">
            </div>
            {{-- description input  --}}
            <div class="form_group">
                <label for="description">Description</label>
                <textarea class="form_input description" id="description" name="description" required minlength="1" maxlength="800" placeholder="insert your description" cols="50" rows="10" value="{{old('description')}}"></textarea>
            </div>
            {{-- slug input  --}}
            <div class="form_group">
                <label for="slug">Slug</label>
                <input type="text" class="form_input" id="slug" name="slug" required minlength="1" maxlength="300" placeholder="Insert the slug" value="{{old("slug")}}">
            </div>
            {{-- cover image input  --}}
            <div class="form_group">
                <label for="cover_image">Cover Image</label>
                <input type="file" class="form_input cover" id="cover_image" name="cover_image" required accept="image/*" placeholder="choose the image">
            </div>
            <div class="form_group">
                <label for="principal_images">Interior Image Principal</label>
                {{-- principal images  --}}
                <div class="image_flex">
                    <input required type="file" class="form_input principal" id="cover_image" name="principal_image[]" required accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input principal" id="cover_image" name="principal_image[]" required accept="image/*" placeholder="choose the image">    
                    <input required type="file" class="form_input principal" id="cover_image" name="principal_image[]" required accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input principal" id="cover_image" name="principal_image[]" required accept="image/*" placeholder="choose the image">
                </div>
            </div>
            <div class="form_group">
                <label for="interior_image">Interior Image Secondary</label>
                {{-- secondary images  --}}
                <div class="image_flex">
                    <input required type="file" class="form_input secondary" id="secondary_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input secondary" id="secondary_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input secondary" id="secondary_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input secondary" id="secondary_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input secondary" id="secondary_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
                    <input required type="file" class="form_input secondary" id="secondary_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
                </div>
            </div>
            <div class="form_group">
                <div class="general_flex">
                    {{-- country input  --}}
                    <label for="country">Country</label>
                    <input type="text" class="form_input address" id="country" name="country" required minlength="1" maxlength="100" placeholder="Insert the country" value="{{old("country")}}">
                    {{-- region input  --}}
                    <label for="region">Region</label>
                    <input type="text" class="form_input address" id="region" name="region" required minlength="1" maxlength="100" placeholder="Insert the region" value="{{old("region")}}">
                    {{-- city input  --}}
                    <label for="city">City</label>
                    <input type="text" class="form_input address" id="city" name="city" required minlength="1" maxlength="100" placeholder="Insert the city" value="{{old("city")}}">
                </div>
            </div>
            <div class="form_group">
                <div class="general_flex">
                    {{-- address input  --}}
                    <label for="address">Address</label>
                    <input type="text" class="form_input address" id="address" name="address" required minlength="1" maxlength="100" placeholder="Insert the address" value="{{old("address")}}">
                    {{-- zip code input --}}
                    <label for="zip_code">Zip Code</label>
                    <input type="text" class="form_input address" id="zip_code" name="zip_code" required minlength="1" maxlength="15" placeholder="Insert the zip code" value="{{old("zip_code")}}">
                </div>
            </div>
            <div class="form_group">
                <div class="general_flex">
                    {{-- beds input  --}}
                    <label for="beds">Beds</label>
                    <input type="number" class="form_input service" id="beds" name="beds" min="1" max="100" placeholder="Insert the numbers of beds" value="{{old("beds")}}">
                    {{-- rooms input  --}}
                    <label for="rooms">Rooms</label>
                    <input type="number" class="form_input service" id="rooms" name="rooms" min="0" max="100" placeholder="Insert the numbers of rooms" value="{{old("rooms")}}">
                    {{-- toilets input  --}}
                    <label for="toilets">Toilets</label>
                    <input type="number" class="form_input service" id="rooms" name="toilets" min="0" max="100" placeholder="Insert the numbers of toiltes" value="{{old("toilets")}}">
                    {{-- square meters input  --}}
                    <label for="square_meters">Square Metres</label>
                    <input type="number" class="form_input service" id="square_meters" name="square_meters" required min="9" max="1200" placeholder="Insert the square meters" value="{{old("square_meters")}}">
                </div>
            </div>
            {{-- price input  --}}
            <div class="form_group">
                <div class="general_flex">
                    <label for="price">Price</label>
                    <input type="number" step=0.01 class="form_input service" id="price" name="price" required min="1" max="9999.99" placeholder="Insert the price" value="{{old("price")}}">
                    {{-- latitude input    --}}
                    <label for="latitude">Latitude</label>
                    <input type="number" step=0.00001 class="form_input service" id="latitude" name="latitude" required min="-90" max="90" placeholder="Insert the latitude" value="{{old("latitude")}}">
                    {{-- longitude input   --}}
                    <label for="longitude">Longitude</label>
                    <input type="number" step=0.00001 class="form_input service" id="longitude" name="longitude" required min="-180.00" max="180.00" placeholder="Insert the longitude" value="{{old("longitude")}}">
                </div>
            </div>
            {{-- visible input       --}}
            <div class="form_group">
                <input type="radio" checked id="visible" name="visible" required min="0" max="1" value="1">
                <label for="visible">Visible</label>
                <input type="radio" id="visible" name="visible" required min="0" max="1" value="0">
                <label for="visible">Not visible</label>
            </div>
            {{-- <div class="form_group">
            </div> --}}
            <div class="form_group">
                <label for="type_id">type</label>
                {{-- selecting type informations  --}}
                <select class="form_type" name="type_id" id="type">
                    <option class="form_type_item" value="1">Accomodation</option>
                    <option class="form_type_item" value="2">Room</option>
                    <option class="form_type_item" value="3">Mansion</option>
                    <option class="form_type_item" value="4">House</option>
                    <option class="form_type_item" value="5">Loft</option>
                    <option class="form_type_item" value="6">Hostel</option>
                </select>
              </div>
              {{-- services input   --}}
            <div class="form_group">
                <label for="services">Services:</label>
                <div class="general_flex">
                @foreach ($services as $service)
                  <div class="form_check form_group">
                        <input class="form_check service" name="services[]" type="checkbox" id="service{{$service->id}}" value="{{$service->id}}">
                        <label class="form_check service" for="service-{{$service->id}}">{{$service->service_name}}</label>
                  </div>
                @endforeach
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var limit = 4;
      $('.form_check').on('click', function(evt)
      {
        if($("input[name='principal[]']:checked").length > limit)
        {
          this.checked = false;
        }
      });
    </script>
@endsection