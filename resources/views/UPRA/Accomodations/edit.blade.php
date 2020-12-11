principals{{-- // Edit a submit form accomodation for the UPRA --}}
{{-- // Create a submit form accomodation for the UPRA --}}
@extends('UPRA.layouts.app')
@section('main_content')
    <div class="form_background">
        <div class="form_wrapper">
            <div class="form_text">
              <h1>Edit accomodation : {{$accomodation->title}}</h1>
            </div>
        <form action="{{route('admin.accomodations.update',$accomodation->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- id input  --}}
            <div class="form_group">
                <input type="hidden" class="form_input" id="accomodation_id" name="accomodation_id" value={{$accomodation->id}}>
              </div>
              {{-- title input  --}}
            <div class="form_group">
              <label for="title">Title</label>
              <input type="text" class="form_input" id="title" name="title" minlength="5" maxlength="300" placeholder="Insert the title" value="{{old("title") ? old("title") : $accomodation->title }}">
            </div>
            {{-- description input  --}}
            <div class="form_group">
                <label for="description">Description</label>
                <input type="textarea" class="form_input" id="description" name="description" minlength="1" maxlength="800" placeholder="Insert the description" value="{{old("title") ? old("title") : $accomodation->description }}">
            </div>
            {{-- cover image input  --}}
            <div class="form_group">
                <label for="cover_image">Change Cover Image</label>
                <img style="height: 100px; width:100px" src="{{$accomodation->cover_image}}" alt="">
                <input type="file"  id="cover_image" name="cover_image" value="{{$accomodation->cover_image}}" accept="image/*" placeholder="change the image">
            </div>
            <div class="form_group">
                <label for="principal_image1">Change Interior Image 1 - Principal</label>
                <img style="height: 100px; width:100px" src="{{$principals[0]->image}}" alt="">
                <input  type="file"  id="cover_image" name="principal_image[]" accept="image/*" placeholder="change the image">
            </div>
            <div class="form_group">
                <label for="principal_image2">Change Interior Image 2 - Principal</label>
                <img style="height: 100px; width:100px" src="{{$principals[1]->image}}" alt="">
                <input  type="file"  id="cover_image" name="principal_image[]" accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="1">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="principal_image3">Change Interior Image 3 - Principal</label>
                <img style="height: 100px; width:100px" src="{{$principals[2]->image}}" alt="">
                <input  type="file"  id="cover_image" name="principal_image[]"  accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="2">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="principal_image4">Change Interior Image 4 - Principal</label>
                <img style="height: 100px; width:100px" src="{{$principals[3]->image}}" alt="">
                <input  type="file"  id="cover_image" name="principal_image[]" accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="3">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="interior_image5">Change Interior Image 5</label>
                <img style="height: 100px; width:100px" src="{{$interiors[0]->image}}" alt="">
                <input  type="file"  id="cover_image" name="interior_image[]"  accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="4">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="interior_image6">Change Interior Image 6</label>
                <img style="height: 100px; width:100px" src="{{$interiors[1]->image}}" alt="">
                <input  type="file"  id="cover_image" name="interior_image[]"  accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="5">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="interior_image7">Change Interior Image 7</label>
                <img style="height: 100px; width:100px" src="{{$interiors[2]->image}}" alt="">
                <input  type="file"  id="cover_image" name="interior_image[]"  accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="6">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="interior_image8">Change Interior Image 8</label>
                <img style="height: 100px; width:100px" src="{{$interiors[3]->image}}" alt="">
                <input  type="file"  id="cover_image" name="interior_image[]"  accept="image/*" placeholder="change the image">
                {{-- <input class="form_check" name="principal[]" type="checkbox" id="principal" value="7">
                <label class="form_check" for="principal">Priority Image</label> --}}
            </div>
            <div class="form_group">
                <label for="interior_image9">Change Interior Image 9</label>
                <img style="height: 100px; width:100px" src="{{$interiors[4]->image}}" alt="">
                <input  type="file"  id="cover_image" name="interior_image[]"  accept="image/*" placeholder="change the image">
            </div>
            <div class="form_group">
                <label for="interior_image10">Change Interior Image 10</label>
                <img style="height: 100px; width:100px" src="{{$interiors[5]->image}}" alt="">
                <input  type="file"  id="cover_image" name="interior_image[]"  accept="image/*" placeholder="choose the image">
            </div>
            {{-- slug input  --}}
            <div class="form_group">
                <label for="slug">Slug</label>
                <input type="text" class='form_input' id="slug" name="slug" required minlength="1" maxlength="300" placeholder="Insert the slug" value="{{old("slug") ? old("slug") : $accomodation->slug }}">
            </div>
            {{-- country input  --}}
            <div class="form_group">
                <label for="country">Country</label>
                <input type="text" class="form_input" id="country" name="country" required minlength="1" maxlength="100" placeholder="Insert the country" value="{{old("country") ? old("country") : $accomodation->country }}">
            </div>
            {{-- region input  --}}
            <div class="form_group">
                <label for="region">Region</label>
                <input type="text" class="form_input" id="region" name="region" required minlength="1" maxlength="100" placeholder="Insert the region" value="{{old("region") ? old("region") : $accomodation->region }}">
            </div>
            {{-- city input  --}}
            <div class="form_group">
                <label for="city">City</label>
                <input type="text" class="form_input" id="city" name="city" required minlength="1" maxlength="100" placeholder="Insert the city" value="{{old("city") ? old("city") : $accomodation->city }}">
            </div>
            {{-- address input  --}}
            <div class="form_group">
                <label for="address">Address</label>
                <input type="text" class="form_input" id="address" name="address" required minlength="1" maxlength="100" placeholder="Insert the address" value="{{old("address") ? old("address") : $accomodation->address }}">
            </div>
            {{-- zip code input  --}}
            <div class="form_group">
                <label for="zip_code">Zip Code</label>
                <input type="number" class="form_input" id="zip_code" name="zip_code" required minlength="1" maxlength="15" placeholder="Insert the zip code" value="{{old("zip_code") ? old("zip_code") : $accomodation->zip_code }}">
            </div>
            {{-- beds input  --}}
            <div class="form_group">
                <label for="beds">Beds</label>
                <input type="number" class="form_input" id="beds" name="beds" min="1" max="100" placeholder="Insert the numbers of beds" value="{{old("beds") ? old("beds") : $accomodation->beds }}">
            </div>
            {{-- number input  --}}
            <div class="form_group">
                <label for="rooms">Rooms</label>
                <input type="number" class="form_input" id="rooms" name="rooms" min="1" max="100" placeholder="Insert the numbers of rooms" value="{{old("rooms") ? old("rooms") : $accomodation->rooms }}">
            </div>
            {{-- toilets input  --}}
            <div class="form_group">
                <label for="toilets">Toilets</label>
                <input type="number" class="form_input" id="rooms" name="toilets" min="0" max="100" placeholder="Insert the numbers of toiltes" value="{{old("toilets") ? old("toilets") : $accomodation->toilets }}">
            </div>
            {{-- square meters input  --}}
            <div class="form_group">
                <label for="square_meters">Square Metres</label>
                <input type="number" class="form_input" id="square_meters" name="square_meters" required min="9" max="1200" placeholder="Insert the square meters" value="{{old("square_meters") ? old("square_meters") : $accomodation->square_meters }}">
            </div>
            {{-- price input  --}}
            <div class="form_group">
                <label for="price">Price</label>
                <input type="number" step=0.01 class="form_input" id="price" name="price" required min="1" max="9999.99" placeholder="Insert the price" value="{{old("price") ? old("price") : $accomodation->price }}">
            </div>
            {{-- latitude input  --}}
            <div class="form_group">
                <label for="latitude">Latitude</label>
                <input type="number" step=0.000001 class="form_input" id="latitude" name="latitude" required min="-90" max="90.00" placeholder="Insert the latitude" value="{{old("latitude") ? old("latitude") : $accomodation->latitude }}">
            </div>
            {{-- longitude input  --}}
            <div class="form_group">
                <label for="longitude">Longitude</label>
                <input type="number" step=0.000001 class="form_input" id="longitude" name="longitude" required min="-180.00" max="180.00" placeholder="Insert the longitude" value="{{old("longitude") ? old("longitude") : $accomodation->longitude }}">
            </div>
            {{-- visible radio input  --}}
            <div class="form_group">
                @if($accomodation->visible)
                  <input type="radio" checked id="visible" name="visible" required min="0" max="1" value="1">
                  <label for="visible">Visible</label>
                  <input type="radio" id="visible" name="visible" required min="0" max="1" value="0">
                  <label for="visible">Not visible</label>
                @else
                  <input type="radio" id="visible" name="visible" required min="0" max="1" value="1">
                  <label for="visible">Visible</label>
                  <input type="radio" checked id="visible" name="visible" required min="0" max="1" value="0">
                  <label for="visible">Not visible</label>
                @endif
            </div>
            <div class="form_group">
                <label for="type_id">type</label>
                {{-- selecting type informations  --}}

                <select class="form_type" name="type_id" id="type" value="{{$accomodation->type_id}}">
                    @if ($accomodation->type_id == 1)
                        <option value="1" selected>Accomodation</option>
                    @else
                        <option value="1">Accomodation</option>
                    @endif

                    @if ($accomodation->type_id == 2)
                        <option value="2" selected>Room</option>
                    @else
                        <option value="2">Room</option>
                    @endif

                    @if ($accomodation->type_id == 3)
                        <option value="3" selected>Mansion</option>
                    @else
                        <option value="3">Mansion</option>
                    @endif

                    @if ($accomodation->type_id == 4)
                        <option value="4" selected>House</option>
                    @else
                        <option value="4">House</option>
                    @endif

                    @if ($accomodation->type_id == 5)
                        <option value="5" selected>Loft</option>
                    @else
                        <option value="5">Loft</option>
                    @endif
                    @if ($accomodation->type_id == 6)
                        <option value="6" selected>Hostel</option>
                    @else
                        <option value="6">Hostel</option>
                    @endif

                </select>
            </div>
              {{-- services input   --}}
            {{-- <div class="form_group">
                <label for="services"><strong>Services:</strong></label>
                @foreach ($services as $service)
                  <div class="form_check form_group">
                      <input class="form_check" name="services[]" type="checkbox" id="service{{$service->id}}">
                      <label class="form_check" for="service-{{$service->id}}">{{$service->service_name}}</label>
                  </div>
                @endforeach
              </div> --}}

              @foreach ($services as $service)
                @php
                // controlla se il tag è da rendere checked
                foreach ($accomodation->services as $accomodationService)
                {
                  if ($accomodationService->id==$service->id)
                  {
                    $serviceChecked = 'checked';
                    break;
                  }
                  else
                  {
                    $serviceChecked = '';
                  }
                }
              @endphp
              <div class="form-check form-check-inline">
                 <input class="form-check-input" {{$serviceChecked}} name="services[]" type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}">
                 <label class="form-check-label" for="service-{{$service->id}}"> {{$service->service_name}}</label>
              </div>
            @endforeach
              <button type="submit" class="form_btn">Edit</button>
      </form>
           <div class="admin_btn_edit_delete">
               <form action="{{route("admin.accomodations.destroy",$accomodation->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="form_btn">Delete</button>
                </form>
            </div>

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
