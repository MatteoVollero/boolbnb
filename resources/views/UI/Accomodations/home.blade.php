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
                    <span>{{$accomodation->price}}</span>
                    <span>{{$accomodation->services}}</span>
                    <span><i class="fas fa-wifi"></i></span>
                    <span><i class="fas fa-parking"></i></span>
                    <span><i class="fas fa-swimmer"></i></span>
                    <span><i class="fas fa-concierge-bell"></i></span>
                    <span><i class="fas fa-hot-tub"></i></span>
                    <span><i class="fas fa-water"></i></span>
                </div>
                {{-- cover image --}}
                <div class="cover_image">
                    <img src="{{$accomodation->cover_image}}" width="inherit" height="inherit" alt="Image">
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
                Chosed for you
            </h2>
            <div class="accomodation_cards">
                {{-- upper cards controller  --}}
                <div class="upper_cards_scroller">
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
                             <span>{{$accomodation->services}}</span>
                             <span><i class="fas fa-wifi"></i></span>
                             <span><i class="fas fa-parking"></i></span>
                             <span><i class="fas fa-swimmer"></i></span>
                             <span><i class="fas fa-concierge-bell"></i></span>
                             <span><i class="fas fa-hot-tub"></i></span>
                             <span><i class="fas fa-water"></i></span>
                         </div>
                         {{-- cover image --}}
                         <div class="cover_image">
                             <img src="{{$accomodation->cover_image}}" width="inherit" height="inherit" alt="Image">
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
                            <span>{{$accomodation->services}}</span>
                            <span><i class="fas fa-wifi"></i></span>
                            <span><i class="fas fa-parking"></i></span>
                            <span><i class="fas fa-swimmer"></i></span>
                            <span><i class="fas fa-concierge-bell"></i></span>
                            <span><i class="fas fa-hot-tub"></i></span>
                            <span><i class="fas fa-water"></i></span>
                        </div>
                        {{-- cover image --}}
                        <div class="cover_image">
                            <img src="{{$accomodation->cover_image}}" width="inherit" height="inherit" alt="Image">
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
            <div class="higher_accomodations_types">
                {{-- higher type --}}
                <div class="higher_type"></div>
                <div class="higher_type"></div>
                <div class="higher_type"></div>
                <div class="higher_type"></div>
            </div>
            {{-- lower accomodations type  --}}
            <div class="lower_accomodation_type">
                {{-- lower type  --}}
                <div class="lower_type"></div>
            </div>
        </div>
    </div>
</section>
@endsection