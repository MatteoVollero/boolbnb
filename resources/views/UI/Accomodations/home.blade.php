{{-- // homepage UI --}}
@extends('UI.layouts.app')
@section('title')
    Homepage
@endsection
@include('UI.Partials.jumbotron')
@section('main_content')
{{-- // main section  --}}
<section class="first_main_section">
    {{-- aside --}}
    <aside class="aside_accomodations">
        {{-- aside wrapper  --}}
        <div class="aside_wrapper">
            <h2>In evidence</h2>
            {{-- aside item  --}}
            @foreach ($sponsoredAccomodations as $accomodation)
            <div class="aside_item">
                {{-- informations item --}}
                <div class="informations_item">
                    <span>{{$accomodation->title}}</span>
                    <span>{{$accomodation->country}}</span>
                    <span>{{$accomodation->region}}</span>
                    <span>{{$accomodation->city}}</span>
                    <span>{{$accomodation->price}}&euro;</span>
                </div>
                <ul class="services_list">
                    @foreach ($accomodation->services as $service)
                        @if ($service->service_name == "wi-fi")
                        <li class="service_list">
                            <i class="fas fa-wifi"></i>
                        </li>
                        @elseif ($service->service_name == "parking")
                        <li class="service_list">
                            <i class="fas fa-parking"></i>
                        </li>
                        @elseif ($service->service_name == "pool")
                        <li class="service_list">
                            <i class="fas fa-swimmer"></i>
                        </li>
                        @elseif ($service->service_name == "reception")
                        <li class="service_list">
                            <i class="fas fa-bell"></i>
                        </li>
                        @elseif ($service->service_name == "sauna")
                        <li class="service_list">
                            <i class="fas fa-hot-tub"></i>
                        </li>
                        @elseif ($service->service_name == "sea_view")
                        <li class="service_list">
                            <i class="fas fa-water"></i>
                        </li>
                        @endif
                    @endforeach
                    @foreach ($accomodation->advs as $adv)
                        @if ($adv->label == "Bronze")
                        <li class="service_list">
                            <i class="fas fa-medal medal_bronze"></i>
                        </li>
                        @elseif ($adv->label == "Silver")
                        <li class="service_list">
                            <i class="fas fa-medal medal_silver"></i>
                        </li>
                        @elseif ($adv->label == "Gold")
                        <li class="service_list">
                            <i class="fas fa-medal medal_gold"></i>
                        </li>
                        @endif
                    @endforeach
                </ul>
                {{-- cover image --}}
                <div class="cover_image">
                    <img src="{{$accomodation->cover_image}}" width="100%" height="100%" alt="Image">
                </div>
            </div>
            @endforeach
    </aside>
    {{-- cards section  --}}
    <div class="cards_section">
        {{-- first main section wrapper  --}}
        <div class="first_main_wrapper">
            {{-- accomodations card --}}
            <h2 class="cards_section_text">
                Chosen for you
            </h2>
            <div class="accomodation_cards">
                {{-- upper cards controller  --}}
                <div class="upper_cards_scroller">
                    {{-- card item  --}}
                    @foreach ($normalAccomodationsScroll1 as $accomodation)
                    <div class="card_item">
                        {{-- informations item --}}
                         <div class="informations_item">
                             <span>{{$accomodation->title}}</span>
                             <span>{{$accomodation->country}}</span>
                             <span>{{$accomodation->region}}</span>
                             <span>{{$accomodation->city}}</span>
                             <span>{{$accomodation->price}}&euro;</span>
                             <ul class="flex_items">
                                @foreach ($accomodation->services as $service)
                                    @if ($service->service_name == "wi-fi")
                                    <i class="fas fa-wifi"></i>
                                    @elseif ($service->service_name == "parking")
                                    <i class="fas fa-parking"></i>
                                    @elseif ($service->service_name == "pool")
                                    <i class="fas fa-swimmer"></i>
                                    @elseif ($service->service_name == "reception")
                                    <i class="fas fa-concierge-bell"></i>
                                    @elseif ($service->service_name == "sauna")
                                    <i class="fas fa-hot-tub"></i>
                                    @elseif ($service->service_name == "sea_view")
                                    <i class="fas fa-water"></i>
                                    @endif
                                @endforeach
                            </ul>
                         </div>
                         {{-- cover image --}}
                         <div class="cover_image">
                            <img src="{{$accomodation->cover_image}}" width="100%" height="100%" alt="Image">
                         </div>
                        </div>
                    @endforeach
            </div>
            {{-- lower cards controller  --}}
                <div class="lower_cards_scroller">
                    {{-- card item  --}}
                    @foreach ($normalAccomodationsScroll2 as $accomodation)
                    <div class="card_item">
                       {{-- informations item --}}
                        <div class="informations_item">
                            <span>{{$accomodation->title}}</span>
                            <span>{{$accomodation->country}}</span>
                            <span>{{$accomodation->region}}</span>
                            <span>{{$accomodation->city}}</span>
                            <span>{{$accomodation->price}}</span>
                            <ul class="flex_items">
                                @foreach ($accomodation->services as $service)
                                    @if ($service->service_name == "wi-fi")
                                    <i class="fas fa-wifi"></i>
                                    @elseif ($service->service_name == "parking")
                                    <i class="fas fa-parking"></i>
                                    @elseif ($service->service_name == "pool")
                                    <i class="fas fa-swimmer"></i>
                                    @elseif ($service->service_name == "reception")
                                    <i class="fas fa-concierge-bell"></i>
                                    @elseif ($service->service_name == "sauna")
                                    <i class="fas fa-hot-tub"></i>
                                    @elseif ($service->service_name == "sea_view")
                                    <i class="fas fa-water"></i>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        {{-- cover image --}}
                        <div class="cover_image">
                            <img src="{{$accomodation->cover_image}}" width="100%" height="100%" alt="Image">
                        </div>
                    </div>
                    @endforeach
            </div>
    </div>
</section>
{{--  second main section --}}
<section class="second_main_section">
    {{-- second main section wrapper  --}}
    <div class="second_main_wrapper">
        <h2>
            The most clicked of the month
        </h2>
        {{-- // single accomodation  --}}
        <div class="single_accomodation">
            {{-- cover image  --}}
            <div class="cover_image">
                  <a href="{{route('show', $mostViewedAccomodation->slug)}}"><img src="{{$mostViewedAccomodation->cover_image}}" alt="cover image"></a>
            </div>
            {{-- // secondary images  --}}
        </div>
        <div class="secondary_images">
            {{-- image item  --}}
            @foreach ($mostViewedAccomodation->accomodation_images as $accomodation_image)
                @if ($accomodation_image->principal)
                    <div class="image_item">
                        <img src="{{$accomodation_image->image}}" alt="Images"> 
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
{{-- third main section  --}}
<section class="third_main_section">
    {{-- third main wrapper  --}}
    <div class="third_main_wrapper">
        {{-- elm item  --}}
        <div class="elm_item_left">
           <a href="{{route('register')}}" target="_blank"><img src="{{asset('images/Become_an_host_air_bnb.jpg')}}" alt="Become an host"></a>
            <h2>
                Become an Host
            </h2>
        </div>
        {{-- elm item  --}}
        <div class="elm_item_right">
            <h2>
                Choose a type
            </h2>
            {{-- higher accomodations types  --}}
            <div class="accomodations_types">
                {{-- higher type --}}
                @foreach ($types as $type)
                    <div class="type">{{$type->name}}</div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
