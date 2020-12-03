{{-- // showing the single accomodations for the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Accomodation
@endsection
@section('link')
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link rel="stylesheet" type="text/css" href="{{asset('/chart.js/dist/Chart.min.css')}}">
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
@endsection
@section('main_content')
<section class="show_section">
    <div class="show_wrapper">
        {{-- TITLE AND BUTTON --}}
        <div class="button_section_show">
            <div>
                {{-- TITLE --}}
                <h1 class="title_elm_show">{{$accomodation->title}}</h1>
                {{-- ADDRESS --}}
                <h5 class="address_elm_show">
                    <i class="fas fa-map-marker-alt"></i>
                    {{$accomodation->address}}, {{$accomodation->city}}, {{$accomodation->zip_code}}, {{$accomodation->region}}, {{$accomodation->country}}
                </h5>
            </div>
            <a href="{{asset('admin/accomodations/message_index')}}"class="btn_message_show none">Messages Area</a>
            <a href="{{asset('admin/accomodations/adv_index')}}" class="btn_message_show none">Advertising Area</a>
            <a class="btn_message_show none">Make an advertisment</a>
            <a href="#" class="btn_message_show none modal_stats_button">Statistics Area</a>
            <a href="#" class="btn_message_show none modal_messages_button">Contact the Host</a>
        </div>
        <div class="modal_stats_bg">
            <div class="modal_stats_data ">
                <canvas id="accomodation_stats_chart" width="700" height="400" aria-label="Hello" role="img"></canvas>
                <small class="close_stats_modal">X</small>
            </div>
        </div>
        {{-- // modola messages bg  --}}
        <div class="modal_messages_bg">
            {{-- modal messages data  --}}
            <div class="modal_messages_data">
                {{-- modal messages wrapper  --}}
                <div class="modal_messages_wrapper">
                    {{-- form group show  --}}
                    <div class="form_group_show">
                        <h3>Compile your message</h3>
                        {{-- form input  --}}
                        <div class="form_group">
                            <label id="nickname" for="">NickName</label>
                            <input type="text" class="form_input" id="nickname" name="nickname" required minlenght="8" maxlength="50" placeholder="insert your nickname">
                        </div>
                        {{-- slug input  --}}
                        <div class="form_group">
                            <label for="email">Email</label>
                            <input type="email" class="form_input" id="email" name="slug" required minlength="10" maxlength="50" placeholder="Insert your email">
                        </div>
                        <textarea class="form_input" id="message" name="message" required minlength="50" maxlength="300" placeholder="insert your message"></textarea>
                    </div>
                </div>
                {{-- lower messager form  --}}
                <div class="lower_messages_form">
                    <span><i class="fab fa-telegram-plane"></i></span>
                    {{-- close messages modal  --}}
                    <span class="close_messages_modal">X</span>
                </div>
            </div>
        </div>
        {{-- // Images  --}}
        <div class="images_show">
            {{-- cover image  --}}
            <div class="primary_image_show">
                <div class="cover_image_show">
                    <img src="{{$accomodation->cover_image}}" alt="{{$accomodation->title}}">
                </div>
            </div>
            {{-- // secondary images  --}}
            <div class="secondary_images_show">
                {{-- image item  --}}
                @foreach ($accomodation->accomodation_images as $accomodationImage)
                    @if ($accomodationImage->principal)   
                        <div class="image_item_show">
                            <img src="{{$accomodationImage->image}}" alt="{{$accomodation->title}}"> 
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{-- INFO --}}
        <div class="section_info_show">
            <div class="info_accomodation_show">
                <div class="flex_between_show">
                {{-- TITLE --}}
                    <h1 class="title_elm_show">{{$accomodation->title}}</h1>
                    {{-- PRICE --}}
                    <h2 class="price_elm_show">{{$accomodation->price}} &euro;</h2>
                </div>
                <div class="flex_between_show">
                    {{-- SPONSOR ELEMENT  --}}
                    @foreach ($accomodation->advs as $adv)
                        @if ($adv->label == "Bronze")
                            <i class="fas fa-medal medal_bronze"></i>
                        @elseif ($adv->label == "Silver")
                            <i class="fas fa-medal medal_silver"></i>
                        @elseif ($adv->label == "Gold")
                            <i class="fas fa-medal medal_gold"></i>
                        @endif
                    @endforeach
                    {{-- VISIBLE --}}
                    @if ($accomodation->visible == 1)
                        <i class="far fa-eye icn_visible_show"></i>
                    @elseif ($accomodation->visible == 0)
                        <i class="far fa-eye-slash icn_visible_show"></i>
                    @endif
                 </div>
                {{-- ADDRESS --}}
                <div class="flex_between_show">
                    <h5 class="address_elm_show">
                        <i class="fas fa-map-marker-alt"></i>
                        {{$accomodation->address}}, {{$accomodation->city}}, {{$accomodation->zip_code}}, {{$accomodation->region}}, {{$accomodation->country}}
                    </h5>
                    <h4 class="type_elm_show">{{$accomodation->accomodation_type->name}}</h4>
                </div>
                {{-- DESCRIPTION --}}
                <p class="description_elm_show">{{$accomodation->description}}</p>
                {{-- Services elm show  --}}
                <div class="services_elm_show">
                    <small class="small_info_elm_show"><i class="fas fa-bed icn_space_show"></i>{{$accomodation->beds}}</small>
                    <small class="small_info_elm_show"><i class="fas fa-door-open icn_space_show"></i>{{$accomodation->rooms}}</small>
                    <small class="small_info_elm_show"><i class="fas fa-toilet icn_space_show"></i>{{$accomodation->toilets}}</small>
                    <small class="small_info_elm_show">{{$accomodation->square_meters}} m&sup2;</small>
                </div>
                {{-- SERVICES --}}
                <div class="services_elm_show">
                    @foreach ($accomodation->services as $service)
                        @if ($service->service_name == "wi-fi")
                            <small class="small_info_elm_show"><i class="fas fa-wifi icn_space_show"></i></small>
                        @elseif ($service->service_name == "parking")
                            <small class="small_info_elm_show"><i class="fas fa-parking icn_space_show"></i></small>
                        @elseif ($service->service_name == "pool")
                            <small class="small_info_elm_show"><i class="fas fa-swimmer icn_space_show"></i></small>
                        @elseif ($service->service_name == "reception")
                            <small class="small_info_elm_show"><i class="fas fa-concierge-bell icn_space_show"></i></small>
                        @elseif ($service->service_name == "sauna")
                            <small class="small_info_elm_show"><i class="fas fa-hot-tub icn_space_show"></i></small>
                        @elseif ($service->service_name == "sea_view")
                            <small class="small_info_elm_show"><i class="fas fa-water icn_space_show"></i></small>
                        @endif
                    @endforeach
                </div>
                <h2 class="price_elm_show">{{$accomodation->price}} &euro;</h2>
            </div>
            {{-- MAPS --}}
            <div class="section_map_show">
                <div class="map_accomodation_show">
                    <input type="hidden" id="latitude" value={{$accomodation['latitude']}}>
                    <input type="hidden" id="longitude" value={{$accomodation['longitude']}}>
                    <div id='map' class='map'></div>
                </div>
            </div>

        </div>
        {{-- BUTTON --}}
        <div class="button_section_show">
            <a href="#" class="btn_message_show">Contact the Host</a>
        </div>
    </div>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js'></script>
    <script type='text/javascript' src={{asset('/js/app.js')}}></script>
</section>
@endsection