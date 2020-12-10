{{-- // List of all accomodations of the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Admin Accomodations
@endsection
@section('main_content')
{{-- section list  --}}
<section class="section_list">
    {{-- elm responsive list  --}}
    <div class="elm_responsive_list">
        @foreach ($accomodationsUpra as $accomodation)
        {{-- elm search list  --}}
        <div class="elm_search_list">
            {{-- img elm list  --}}
            <div class="img_elm_list">
                <a href="{{route('show', $accomodation->slug)}}"><img src="{{$accomodation->cover_image}}" alt="{{$accomodation->title}}"></a>
            </div>
            {{-- title elm list  --}}
            <div class="title_elm_list">
                {{-- higher elm list  --}}
                <div class="title_elm_list_higher">
                    <div class="row_title_elm_list">
                        {{-- title elm list  --}}
                        <h3 class="title_elm_list">{{$accomodation->title}}</h3>
                        {{-- sponsor elm list  --}}
                        <h5 class="sponsor_elm_list">
                            {{$accomodation->accomodation_type->name}}
                        </h5>
                        {{-- sponsor elm list  --}}
                        <h5 class="sponsor_elm_list">
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
                    <h5 class="visible_elm_list">
                        @if ($accomodation->visible == 1)
                            <i class="far fa-eye"></i>
                        @elseif ($accomodation->visible == 0)
                            <i class="far fa-eye-slash"></i>
                        @endif
                    </h5>
                    {{-- address informations list --}}
                    <h5 class="visible_elm_list">
                        {{-- info elm list  --}}
                        <small class="info_elm_list"><i class="fas fa-map-marker-alt"></i></small>
                        {{$accomodation->address}}, {{$accomodation->city}}, {{$accomodation->zipcode}}, {{$accomodation->region}}, {{$accomodation->country}}
                    </h5>
                    {{-- description elm list --}}
                    <p class="text_elm_list">{{$accomodation->description}}</p>
                    {{-- SERVICES --}}
                    <div class="service_elm_search">
                        {{-- info elm list  --}}
                        <small class="info_elm_list"><i class="fas fa-bed icn-space"></i>{{$accomodation->beds}}</small>
                        <small class="info_elm_list"><i class="fas fa-door-open icn-space"></i>{{$accomodation->rooms}}</small>
                        <small class="info_elm_list"><i class="fas fa-toilet icn-space"></i>{{$accomodation->toilets}}</small>
                        <small class="info_elm_list">{{$accomodation->square_meters}} m&sup2;</small>
                        <small class="info_elm_list">{{$accomodation->price}} &euro;</small>
                        @foreach ($accomodation->services as $service)
                            @if ($service->service_name == "wi-fi")
                                <small class="info_elm_list"><i class="fas fa-wifi icn-space"></i>(wi-fi)</small>
                            @elseif ($service->service_name == "parking")
                                <small class="info_elm_list"><i class="fas fa-parking icn-space"></i>(parking)</small>
                            @elseif ($service->service_name == "pool")
                                <small class="info_elm_list"><i class="fas fa-swimmer icn-space"></i>(pool)</small>
                            @elseif ($service->service_name == "reception")
                                <small class="info_elm_list"><i class="fas fa-concierge-bell icn-space"></i>(reception)</small>
                            @elseif ($service->service_name == "sauna")
                                <small class="info_elm_list"><i class="fas fa-hot-tub icn-space"></i>(sauna)</small>
                            @elseif ($service->service_name == "sea_view")
                                <small class="info_elm_list"><i class="fas fa-water icn-space"></i>(sea view)</small>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- price --}}
                <div class="title_elm_list_lower">
                    {{-- price elm list  --}}
                    <a href="{{route('admin.accomodations.adv_create', $accomodation->id)}}" class="btn_message_show">Make an advertisment</a>
                    <a href="{{route('admin.accomodations.edit', $accomodation->id)}}" class="btn_message_show">Edit the accomodation</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

