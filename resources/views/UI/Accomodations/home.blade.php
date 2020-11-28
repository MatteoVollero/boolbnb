{{-- // homepage UI --}}
@extends('layouts.app')
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
                    <span>{{$accomodation->price}}</span>
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
                    @foreach ($accomodation->advs as $adv)
                        @if ($adv->label == "Bronze")
                            <i class="fas fa-medal medal_bronze"></i>
                        @elseif ($adv->label == "Silver")
                            <i class="fas fa-medal medal_silver"></i>
                        @elseif ($adv->label == "Gold")
                            <i class="fas fa-medal medal_gold"></i>
                        @endif
                    @endforeach
                </div>
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
                             <span>{{$accomodation->price}}</span>
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
                         </div>
                         {{-- cover image --}}
                         <div class="cover_image">
                            <img src="{{$accomodation->cover_image}}" width="100%" height="100%" alt="Image">
                         </div>
                        </div>
                    @endforeach 
            </div>
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
{{-- // second main section --}}
<section class="second_main_section">
    {{-- // second main section wrapper  --}}
    <div class="second_main_wrapper">
        <h2>
            The most clicked of the month
        </h2>
        {{-- // single accomodation  --}}
        <div class="single_accomodation">
            {{-- cover image  --}}
            <div class="cover_image">

            </div>
            {{-- // secondary images  --}}
            <div class="secondary_images">
                {{-- image item  --}}
                <div class="image_item">
                </div>
                {{-- image item  --}}
                <div class="image_item">
                </div>
                {{-- image item  --}}
                <div class="image_item">
                </div>
                {{-- image item  --}}
                <div class="image_item">
                </div>
            </div>
        </div>
    </div>
</section>
{{-- third main section  --}}
<section class="third_main_section">
    {{-- third main wrapper  --}}
    <div class="third_main_wrapper">
        {{-- elm item  --}}
        <div class="elm_item">
           <a href="" target="_blank"><img src="{{asset('images/Become_an_host_air_bnb.jpg')}}" alt="Become an host"></a>
            <h2>
                Become an Host
            </h2>
        </div>
        {{-- elm item  --}}
        <div class="elm_item">
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
