{{-- // List of all accomodations of the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Accomodations
@endsection

@section('main_content')
<section class="section-list">
    <div class="elm-responsive-list">
        @foreach ($accomodationsUpra as $accomodation)
        <div class="elm-list-list">
            {{-- COVER IMAGE --}}
            <div class="img-elm-list">
                <img src="{{$accomodation->cover_image}}" alt="{{$accomodation->title}}">
            </div>
            <div class="testo-elm-list">
                <div class="testo-elm-list-superiore">
                    <div class="row-title-elm-list">
                        {{-- TITLE --}}
                        <h3 class="title-elm-list">{{$accomodation->title}}</h3>
                        {{-- TYPE --}}
                        <h5 class="sponsor-elm-list">
                            {{$accomodation->accomodation_type->name}}
                        </h5>
                        {{-- ADV TYPE --}}
                        <h5 class="sponsor-elm-list">
                            @foreach ($accomodation->advs as $adv)
                                @if ($adv->label == "Bronze")
                                    <i class="fas fa-medal medal_bronze"></i>
                                @elseif ($adv->label == "Silver")
                                    <i class="fas fa-medal medal_silver"></i>
                                @elseif ($adv->label == "Gold")
                                    <i class="fas fa-medal medal_gold"></i>
                                @endif
                            @endforeach
                        </h5>
                    </div>
                    {{-- VISIBLE OR INVISIBLE --}}
                    <h5 class="visible-elm-list">
                        @if ($accomodation->visible == 1)
                            <i class="far fa-eye"></i>
                        @elseif ($accomodation->visible == 0)
                            <i class="far fa-eye-slash"></i>
                        @endif
                    </h5>
                    {{-- ADDRESS --}}
                    <h5 class="visible-elm-list">
                        <small class="info-elm-list"><i class="fas fa-map-marker-alt"></i></small>
                        {{$accomodation->address}}, {{$accomodation->city}}, {{$accomodation->zipcode}}, {{$accomodation->region}}, {{$accomodation->country}}
                    </h5>
                    {{-- DESCRIPTION --}}
                    <p class="text-elm-list">{{$accomodation->description}}</p>
                    {{-- SERVICES --}}
                    <div class="service-elm-search">
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
                    </div>
                </div>
                {{-- PRICE --}}
                <div class="testo-elm-list-inferiore">
                    <h4 class="price-elm-list">{{$accomodation->price}} &euro;</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
{{-- @dd($accomodationsUpra); --}}
