{{-- // showing the single accomodations for the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Accomodation
@endsection
@section('main_content')
<section class="show_section">
    <div class="show_wrapper">
        {{-- TITLE AND BUTTON --}}
        <div class="button_section_show">
            <div>
                {{-- TITLE --}}
                <h1 class="title_elm_show">Lorem ipsum dolor sit amet</h1>
                {{-- ADDRESS --}}
                <h5 class="address_elm_show">
                    <i class="fas fa-map-marker-alt"></i>
                    Via Dei Feltreschi 10, Rome, Italy
                </h5>
            </div>
            <a href="#" class="btn_message_show none modal_stats_button">Statistics</a>
            <a href="#" class="btn_message_show none">Messages List</a>
            <a href="#" class="btn_message_show none">Contact the Host</a>
        </div>
        <div class="modal_stats_bg">
            <div class="modal_stats_data">
                <small class="close_stats_modal">X</small>
            </div>
        </div>
        {{-- // Images  --}}
        <div class="images_show">
            {{-- cover image  --}}
            <div class="primary_image_show">
                <div class="cover_image_show">
                    {{-- <img src="{{$mostViewedAccomodation->cover_image}}" alt="cover image"> --}}
                </div>
            </div>
            {{-- // secondary images  --}}
            <div class="secondary_images_show">
                {{-- image item  --}}
                {{-- @foreach ($mostViewedAccomodation->accomodation_images as $accomodation_image) --}}
                    {{-- @if ($accomodation_image->principal) --}}
                    @for ($i = 0; $i < 4; $i++)    
                        <div class="image_item_show">
                            {{-- <img src="{{$accomodation_image->image}}" alt="Images">  --}}
                        </div>
                    @endfor
                    {{-- @endif --}}
                {{-- @endforeach --}}
            </div>
        </div>

        {{-- INFO --}}
        <div class="section_info_show">
            <div class="info_accomodation_show">
                <div class="flex_between_show">
                {{-- TITLE --}}
                    <h1 class="title_elm_show">Lorem ipsum dolor sit amet</h1>
                    {{-- PRICE --}}
                    <h2 class="price_elm_show">666 &euro;</h2>
                </div>
                {{-- ADDRESS --}}
                <div class="flex_between_show">
                    <h5 class="address_elm_show">
                        <i class="fas fa-map-marker-alt"></i>
                        Via Dei Feltreschi 10, Rome, Italy
                    </h5>
                    <h4 class="type_elm_show">Accomodation Type</h4>
                </div>
                {{-- DESCRIPTION --}}
                <p class="description_elm_show">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cupiditate numquam iste eligendi obcaecati libero, earum eos mollitia optio? Ad aperiam commodi iure quia perferendis quibusdam facilis doloribus incidunt! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cupiditate numquam iste eligendi obcaecati libero, earum eos mollitia optio? Ad aperiam commodi iure quia perferendis quibusdam facilis doloribus incidunt! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cupiditate numquam iste eligendi obcaecati libero, earum eos mollitia optio? Ad aperiam commodi iure quia perferendis quibusdam facilis doloribus incidunt! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cupiditate numquam iste eligendi obcaecati libero, earum eos mollitia optio? Ad aperiam commodi iure quia perferendis quibusdam facilis doloribus incidunt!</p>
                {{-- SERVICES --}}
                {{-- <div class="service-elm-search">
                    <small class="info-elm-list"><i class="fas fa-bed icn-space"></i>{{$accomodation->beds}}</small>
                    <small class="info-elm-list"><i class="fas fa-door-open icn-space"></i>{{$accomodation->rooms}}</small>
                    <small class="info-elm-list"><i class="fas fa-toilet icn-space"></i>{{$accomodation->toilets}}</small>
                    <small class="info-elm-list">{{$accomodation->square_meters}} m&sup2;</small>
                    @foreach ($accomodation->services as $service)
                        @if ($service->service_name == "wi-fi")
                    <small class="info-elm-list"><i class="fas fa-bed icn-space"></i>{{$accomodation->beds}}</small>
                            <small class="info-elm-list"><i class="fas fa-wifi icn-space"></i></small>
                        @elseif ($service->service_name == "parking")
                            <small class="info-elm-list"><i class="fas fa-parking icn-space"></i></small>
                        @elseif ($service->service_name == "pool")
                            <small class="info-elm-list"><i class="fas fa-swimmer icn-space"></i></small>
                        @elseif ($service->service_name == "reception")
                            <small class="info-elm-list"><i class="fas fa-concierge-bell icn-space"></i></small>
                        @elseif ($service->service_name == "sauna")
                            <small class="info-elm-list"><i class="fas fa-hot-tub icn-space"></i></small>
                        @elseif ($service->service_name == "sea_view")
                            <small class="info-elm-list"><i class="fas fa-water icn-space"></i></small>
                        @endif
                    @endforeach
                </div> --}}
                {{-- Services elm show  --}}
                <div class="services_elm_show">
                    <small class="small_info_elm_show"><i class="fas fa-bed icn_space_show"></i>5</small>
                    <small class="small_info_elm_show"><i class="fas fa-door-open icn_space_show"></i>5</small>
                    <small class="small_info_elm_show"><i class="fas fa-toilet icn_space_show"></i>5</small>
                    <small class="small_info_elm_show">234 m&sup2;</small>
                    <small class="small_info_elm_show"><i class="fas fa-bed icn_space_show"></i>6</small>
                    <small class="small_info_elm_show">Prova small tag<i class="fas fa-wifi icn_space_show"></i></small>
                </div>
                <h2 class="price_elm_show">666 &euro;</h2>
            </div>
            {{-- MAPS --}}
            <div class="section_map_show">
                <div class="map_accomodation_show">

                </div>
            </div>

        </div>
        {{-- BUTTON --}}
        <div class="button_section_show">
            <a href="#" class="btn_message_show">Contact the Host</a>
        </div>
    </div>
</section>
@endsection