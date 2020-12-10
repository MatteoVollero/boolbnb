{{-- // showing the single accomodations for the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Accomodation
@endsection
@section('link')
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link rel="stylesheet" type="text/css" href="{{asset('/chart.js/dist/Chart.min.css')}}">
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
@endsection
@section('main_content')
<input type="hidden" class="var_map" value="map">
<input type="hidden" class="input" value="Upra">
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
            <a href="{{route ('admin.accomodations.message_index') }}" class="btn_message_show none">Messages Area</a>
            <a href="{{route ('admin.accomodations.adv_create', $accomodation->id) }}"  class="btn_message_show none">Make an advertisment</a>
            <a href="#" class="btn_message_show none modal_stats_button" data-id="{{$accomodation->id}}">Statistics Area</a>
        </div>
        {{-- modal stats bg  --}}
        <div class="modal_stats_bg">
            {{-- modal stats data  --}}
            <div class="modal_stats_data ">
                {{-- canvas accomodations stats chart  --}}
                <canvas id="accomodation_stats_chart" width="700" height="400" data-attr="stats" role="img"></canvas>
                {{-- close stats modal  --}}
                <small class="close_stats_modal">X</small>
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
                {{-- Services standard elm show  --}}
                <div class="services_standard_elm_show">
                    <small class="small_standard_info_elm_show">
                        <i class="fas fa-bed icn_space_show"></i>
                        Beds: {{$accomodation->beds}}
                    </small>
                    <small class="small_standard_info_elm_show">
                        <i class="fas fa-door-open icn_space_show"></i>
                        Rooms: {{$accomodation->rooms}}
                    </small>
                    <small class="small_standard_info_elm_show">
                        <i class="fas fa-toilet icn_space_show"></i>
                        Toilets: {{$accomodation->toilets}}
                    </small>
                    <small class="small_standard_info_elm_show">
                        Square Meters: {{$accomodation->square_meters}} m&sup2;
                    </small>
                </div>
                {{-- SERVICES --}}
                <div class="services_elm_show">
                    @foreach ($accomodation->services as $service)
                        @if ($service->service_name == "wi-fi")
                            <small class="small_info_elm_show">
                                <span>Wi-Fi</span>
                                <i class="fas fa-wifi icn_space_show"></i>
                            </small>
                        @elseif ($service->service_name == "parking")
                            <small class="small_info_elm_show">
                                <span>Parking</span>
                                <i class="fas fa-parking icn_space_show"></i>
                            </small>
                        @elseif ($service->service_name == "pool")
                            <small class="small_info_elm_show">
                                <span>Pool</span>
                                <i class="fas fa-swimmer icn_space_show"></i>
                            </small>
                        @elseif ($service->service_name == "reception")
                            <small class="small_info_elm_show">
                                <span>Reception</span>
                                <i class="fas fa-concierge-bell icn_space_show"></i>
                            </small>
                        @elseif ($service->service_name == "sauna")
                            <small class="small_info_elm_show">
                                <span>Sauna</span>
                                <i class="fas fa-hot-tub icn_space_show"></i>
                            </small>
                        @elseif ($service->service_name == "sea_view")
                            <small class="small_info_elm_show">
                                <span>Sea View</span>
                                <i class="fas fa-water icn_space_show"></i>
                            </small>
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
            <a href="{{route('admin.accomodations.edit', $accomodation->id)}}" class="btn_message_show none">Edit the accomodation</a>
            <a href="{{route('admin.accomodations.create', $accomodation->id)}}" class="btn_message_show none">Insert a new accomodation</a>
        </div>
    </div>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js'></script>
    <script type='text/javascript' src={{asset('/js/app.js')}}></script>
</section>
@endsection
