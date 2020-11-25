@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-10">
              <h1>Modifica ACCOMODATION</h1>
            </div>
            {{-- <div class="col-2 text-right">
              <a href="{{Route('.index')}}" class="btn btn-primary">Annulla</a>
            </div> --}}
          </div>
       
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


       <form action="{{route('update', $accomodation->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">User id</label>
                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Inserisci USER_ID" value={{$accomodation->user_id}}>
              </div>

              <div class="form-group">
                <label for="type_id">type_id</label>
                <input type="text" class="form-control" id="type_id" name="type_id" placeholder="Inserisci USER_ID" value={{$accomodation->type_id}}>
              </div>


            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value={{$accomodation->title}}>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Inserisci il titolo"  value={{$accomodation->description}}>
            </div>
  
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" placeholder="Scegli l'immagine" value={{$accomodation->cover_image}}>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci lo slug"  value={{$accomodation->slug}}>
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Inserisci"  value={{$accomodation->country}}>
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" id="region" name="region" placeholder="Inserisci"  value={{$accomodation->region}}>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Inserisci"  value={{$accomodation->city}}>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci"  value={{$accomodation->address}}>
            </div>
        
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Inserisci"  value={{$accomodation->zip_code}}>
            </div>

            <div class="form-group">
                <label for="beds">Beds</label>
                <input type="text" class="form-control" id="beds" name="beds" placeholder="Inserisci"  value={{$accomodation->beds}}>
            </div>
            
            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Inserisci"  value={{$accomodation->rooms}}>
            </div>

            <div class="form-group">
                <label for="toilets">Toilets</label>
                <input type="text" class="form-control" id="rooms" name="toilets" placeholder="Inserisci"  value={{$accomodation->toilets}}>
            </div>

            <div class="form-group">
                <label for="square_meters">Square Metres</label>
                <input type="text" class="form-control" id="square_meters" name="square_meters" placeholder="Inserisci"  value={{$accomodation->square_meters}}>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci"  value={{$accomodation->price}}>
            </div>            

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="number" class="form-control" id="latitude" name="latitude" placeholder="Inserisci"  value={{$accomodation->latitude}}>
            </div>            

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="number" class="form-control" id="longitude" name="longitude" placeholder="Inserisci" value={{$accomodation->longitude}}>
            </div>            

            <div class="form-group">
                <label for="visible">Visible</label>
                <input type="number" class="form-control" id="visible" name="visible" placeholder="Inserisci"  value={{$accomodation->visible}}>
            </div>            


            <div class="form-group">

              <label for="services"><strong>Services:</strong></label><br>

              @foreach ($services as $service)

                @php
                // controlla se il tag è da rendere checked
                foreach ($accomodation->services as $accomodationService) {
                    if ($accomodationService->id==$service->id) {
                    $serviceChecked = 'checked';
                    break;
                    } else {
                    $serviceChecked = '';
                    }
                }
                @endphp

                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{$serviceChecked}} name="services[]" type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}">
                    <label class="form-check-label" for="service-{{$service->id}}"> {{$service->service_name}}</label>
                </div>

              {{-- <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" name="services[]" id="service-{{$service->id}}" value="{{$service->id}}" class="custom-control-input">
                     <label for="service-{{$service->id}}" class="custom-control-label"> {{$service->service_name}}</label>
                   </div>                   --}}
              @endforeach

              
            </div>

            <button type="submit" class="btn btn-primary">MODIFICA L'ACCOMODATION</button>
   
        </form>


    </div>    

@endsection
