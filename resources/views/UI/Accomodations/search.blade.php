{{-- // Searching accomodations page for the UI --}}
@extends('UI.layouts.app')
@section('title')
    Accomodations research
@endsection
@section('main_content')

    <input type="hidden" class="var_search" value="search">
    {{-- section search  --}}
    <section class="section_search">
        {{-- SPONSORIZED --}}
        <h2 class="cards_section_text">
            Chosen for you
        </h2>
        <div class="accomodation_cards_search">
            {{-- upper cards controller  --}}
            <div class="upper_cards_scroller">
                {{-- card item  --}}
                @foreach ($sponsoredAccomodations as $accomodation)
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
        </div>
        {{-- SEARCH --}}
        <div class="flex_box_search_section">
            <div class="search_input_section">
                {{-- search item  --}}
                <div class="search_search_item">
                    <label id="location" for="location">Where do you want to go?</label>
                    <input type="text" class="location_input search_input form_input" autocomplete="off" id="location" name="location" data-long="" data-lat="" required minlength="5" maxlength="100" placeholder="Insert the place please" value="{{old("location")}}">
                    <div class="tom_search dropdown_menu_search">
                        <ul class="flex_items_tom">
                        </ul>
                    </div> 
                </div>
                {{-- search item  --}}
                <div class="search_search_item">
                    {{-- list menu  --}}
                    <li class="list_menu">
                        <label id="Services" for="Services">Services</label>
                        {{-- dropleft_menu  --}}
                        <div class="dropdown_menu_search">
                            {{-- flex items  --}}
                            <ul class="flex_items">
                                {{-- list item  --}}
                                <li class="list_item">
                                    {{-- beds  --}}
                                    <label id="beds" for="beds">Beds</label>
                                </li>
                                <li class="list_item">
                                    <input type="number" class="beds_input form_input" id="beds" name="beds" min="0" max="100" placeholder="Insert the numbers of beds" value="{{old("beds")}}">
                                </li>
                                <li class="list_item">
                                    {{-- toilets  --}}
                                    <label id="toilets" for="toilets">Toilets</label>
                                </li>
                                <li class="list_item">
                                    <input type="number" class="toilets_input form_input" id="toilets" name="toilets" min="0" max="100" placeholder="Insert the numbers of toilets" value="{{old("toilets")}}">
                                </li>
                                {{-- rooms  --}}
                                <li class="list_item">
                                    <label id="rooms" for="rooms">Rooms</label>
                                </li>
                                <li class="list_item">
                                    <input type="number" class="rooms_input form_input" id="rooms" name="rooms" min="0" max="100" placeholder="Insert the numbers of rooms" value="{{old("rooms")}}">
                                </li>
                                {{-- services  --}}
                                <li class="list_item">
                                    <label id="text" for="Services">Services</label>
                                </li>
                                {{-- list item  --}}
                                <ul class="list_item">
                                    @foreach ($services as $service)
                                    {{-- services list item  --}}
                                    <li class="service_list_item">
                                        <input class="service_input" type="checkbox" value="{{$service->service_name}}" name="services[]">
                                        @if ($service->service_name == "wi-fi")
                                        <i class="fas fa-wifi translate"></i>
                                        @elseif ($service->service_name == "parking")
                                        <i class="fas fa-parking translate"></i>
                                        @elseif ($service->service_name == "pool")
                                        <i class="fas fa-swimmer translate"></i>
                                        @elseif ($service->service_name == "reception")
                                        <i class="fas fa-concierge-bell translate"></i>
                                        @elseif ($service->service_name == "sauna")
                                        <i class="fas fa-hot-tub translate"></i>
                                        @elseif ($service->service_name == "sea_view")
                                        <i class="fas fa-water translate"></i>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </ul>
                        </div>
                    </li>
                </div>
                {{-- btn search  --}}
                <div class="btn_search button_search">
                    <button type="submit">Search<i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        {{-- print handlebars informations  --}}
        <div class="ajax_handlebar_print">
            <h1 class="research_results none">Here the results of your research</h1>
        </div>
        {{-- clear blade div  --}}
        <div class="elm_responsive_search clear_blade">
            @foreach ($accomodationsFiltered as $accomodation)
            {{-- elm search list  --}}
                <div class="elm_search_list">
                    {{-- img elm search  --}}
                    <div class="img_elm_search">
                    <a href="{{route('show', $accomodation['accomodation']->slug)}}"><img src="{{$accomodation['accomodation']->cover_image}}" alt="{{$accomodation['accomodation']->title}}"></a>
                    </div>
                    {{-- title elm search  --}}
                    <div class="title_elm_search">
                        {{-- title elm searc higher  --}}
                        <div class="title_elm_search_higher">
                            {{-- title elm search  --}}
                            <h3 class="title_elm_search">{{$accomodation['accomodation']->title}}</h3>
                            <h4 class="title_elm_search">{{$accomodation['accomodation']->country}}</h4>
                            <h4 class="title_elm_search">{{$accomodation['accomodation']->region}}</h4>
                            <h4 class="title_elm_search">{{$accomodation['accomodation']->city}}</h4>
                            <h4 class="title_elm_search">{{$accomodation['accomodation']->address}}</h4>
                            <h4 class="info_elm_search">{{$accomodation['type']->name}}</h4>
                            {{-- text elm search  --}}
                            <p class="text_elm_search">{{$accomodation['accomodation']->description}}</p>
                            {{-- service elm search  --}}
                            <small class="info_elm_search">{{$accomodation['distance']}}Km</small>
                            <div class="service_elm_search">
                                <ul class="flex_items_services">
                                    {{-- info elm search  --}}
                                    @foreach ($accomodation['services'] as $service)
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
                                </ul>
                            </div>
                        </div>
                        {{-- text elm search lower  --}}
                        <div class="text_elm_search_lower">
                            {{-- price elm search  --}}
                            <h4 class="price_elm_search">{{$accomodation['accomodation']->price}} &euro;</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
{{-- handlebars tom tom template--}}
<script id="tomtom_template" type="text/x-handlebars-template">
    <li class="list_item_tom" data-long="@{{ longitude }}" data-lat="@{{ latitude }}">@{{ address }}</li>
 </script>
 {{-- handlebars ajax template  --}}
<script id="ajax_template" type="text/x-handlebars-template">
        {{-- elm search list  --}}
    <div class="elm_responsive_search clear_handlebars">
        <div class="elm_search_list">
            {{-- img elm search  --}}
            <div class="img_elm_search">
                <a href="http://localhost:8000/show/@{{slug}}"><img src="@{{cover_image}}" alt="@{{title}}"></a>
            </div>
            {{-- title elm search  --}}
            <div class="title_elm_search">
                {{-- title elm searc higher  --}}
                <div class="title_elm_search_higher">
                    {{-- title elm search  --}}
                    <h3 class="title_elm_search">@{{title}}</h3>
                    <h4 class="title_elm_search">@{{country}}</h4>
                    <h4 class="title_elm_search">@{{region}}</h4>
                    <h4 class="title_elm_search">@{{city}}</h4>
                    <h4 class="title_elm_search">@{{address}}</h4>
                    <h4 class="title_elm_search">@{{type}}</h4>
                    {{-- text elm search  --}}
                    <p class="text_elm_search">@{{description}}</p>
                    {{-- service elm search  --}}
                    <small class="info_elm_search">@{{distance}}km</small>
                    <div class="service_elm_search">
                        {{-- info elm search  --}}
                    </div>
                </div>
                {{-- text elm search lower  --}}
                <div class="text_elm_search_lower">
                    {{-- price elm search  --}}
                    <h4 class="price_elm_search">@{{price}} &euro;</h4>
                </div>
            </div>
        </div>
    </div>
 </script>
