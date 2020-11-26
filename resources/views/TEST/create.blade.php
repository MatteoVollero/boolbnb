@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-10">
              <h1>Crea una nuova ACCOMODATION</h1>
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


       <form action="{{route('admin.accomodations.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="user_id">User id</label>
                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Inserisci USER_ID">
              </div>

              <div class="form-group">
                <label for="type_id">type_id</label>
                <input type="text" class="form-control" id="type_id" name="type_id" placeholder="Inserisci USER_ID">
              </div>


            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Inserisci il titolo">
            </div>
  
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" placeholder="Scegli l'immagine">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci lo slug">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" id="region" name="region" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci">
            </div>
        
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="beds">Beds</label>
                <input type="text" class="form-control" id="beds" name="beds" placeholder="Inserisci">
            </div>
            
            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="toilets">Toilets</label>
                <input type="text" class="form-control" id="rooms" name="toilets" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="square_meters">Square Metres</label>
                <input type="text" class="form-control" id="square_meters" name="square_meters" placeholder="Inserisci">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step=0.01 class="form-control" id="price" name="price" placeholder="Inserisci">
            </div>            

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="number" step=0.000001 class="form-control" id="latitude" name="latitude" placeholder="Inserisci">
            </div>            

            <div class="form-group">
                <label for="longitude">Latitude</label>
                <input type="number" step=0.000001 class="form-control" id="longitude" name="longitude" placeholder="Inserisci">
            </div>            

            <div class="form-group">
                <label for="visible">Visible</label>
                <input type="number" class="form-control" id="visible" name="visible" placeholder="Inserisci">
            </div>            


            <div class="form-group">

              <label for="services"><strong>Services:</strong></label><br>

              @foreach ($services as $service)

                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="services[]" type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}">
                    <label class="form-check-label" for="service-{{$service->id}}"> {{$service->service_name}}</label>
                </div>

              {{-- <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" name="services[]" id="service-{{$service->id}}" value="{{$service->id}}" class="custom-control-input">
                     <label for="service-{{$service->id}}" class="custom-control-label"> {{$service->service_name}}</label>
                   </div>                   --}}
              @endforeach

              
            </div>

            <button type="submit" class="btn btn-primary">SALVA L'ACCOMODATION</button>
   
        </form>


    </div>    

@endsection
