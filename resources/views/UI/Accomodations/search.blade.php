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
        <h1 class="research_results">In evidence</h1>
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
                        <a href="{{route('show', $accomodation->slug)}}">
                            <img src="{{$accomodation->cover_image}}" width="100%" height="100%" alt="Image">
                        </a>
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
                    <input type="range" id="range" max="100" min="0" value="20" data-distance="20">
                    <div class="distance">20 km</div>
                </div>
                {{-- search item  --}}
                <div class="search_search_item">
                    {{-- list menu  --}}
                    <li class="list_menu">
                        <label id="Services" for="Services">Services</label>
                        {{-- dropleft_menu  --}}
                        <div class="dropdown_menu_search dropdown_menu_search_search">
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
                <div class="btn_search_search button_search">
                    <button type="submit"><span>Search</span><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        {{-- print handlebars informations  --}}
        <div class="ajax_handlebar_print">
            
        </div>
        {{-- clear blade div  --}}
        <div class="elm_responsive_search clear_blade">
            @foreach ($accomodationsFiltered as $accomodation)
                <h1 class="research_results block">Here the results of your research for {{$accomodation['accomodation']->city}}</h1>
                @break
            @endforeach
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
                            <h4 class="info_elm_search">{{$accomodation['type']->name}}</h4>
                            <h4 class="title_elm_search">{{$accomodation['accomodation']->address}}, {{$accomodation['accomodation']->city}}, {{$accomodation['accomodation']->region}}, {{$accomodation['accomodation']->country}}</h4>
                            {{-- text elm search  --}}
                            {{-- <p class="text_elm_search">{{$accomodation['accomodation']->description}}</p> --}}
                            {{-- service elm search  --}}
                            <small class="info_elm_search">{{$accomodation['distance']}}Km</small>
                            <div class="service_elm_search">
                                <ul class="flex_items_services">
                                    {{-- info elm search  --}}
                                    @foreach ($accomodation['services'] as $service)
                                        @if ($service->service_name == "wi-fi")
                                            <li class="service_list">
                                                <span>Wi-Fi</span>
                                                <i class="icn_services fas fa-wifi"></i>
                                            </li>
                                        @elseif ($service->service_name == "parking")
                                            <li class="service_list">
                                                <span>Parking</span>
                                                <i class="icn_services fas fa-parking"></i>
                                            </li>
                                        @elseif ($service->service_name == "pool")
                                            <li class="service_list">
                                                <span>Pool</span>
                                                <i class="icn_services fas fa-swimmer"></i>
                                            </li>
                                        @elseif ($service->service_name == "reception")
                                            <li class="service_list">
                                                <span>Reception</span>
                                                <i class="icn_services fas fa-bell"></i>
                                            </li>
                                        @elseif ($service->service_name == "sauna")
                                            <li class="service_list">
                                                <span>Sauna</span>
                                                <i class="icn_services fas fa-hot-tub"></i>
                                            </li>
                                        @elseif ($service->service_name == "sea_view")
                                            <li class="service_list">
                                                <span>Sea View</span>
                                                <i class="icn_services fas fa-water"></i>
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
        <h1 class="research_results none" id="research_title">Here the results of your research for @{{city}}</h1>
        <div class="elm_search_list">
            {{-- img elm search  --}}
            <div class="img_elm_search">
                <a href="http://localhost:8000/@{{slug}}"><img src="@{{cover_image}}" alt="@{{title}}"></a>
            </div>
            {{-- title elm search  --}}
            <div class="title_elm_search">
                {{-- title elm searc higher  --}}
                <div class="title_elm_search_higher">
                    {{-- title elm search  --}}
                    <h3 class="title_elm_search">@{{title}}</h3>
                    <h4 class="title_elm_search">@{{type}}</h4>
                    <h4 class="title_elm_search">@{{address}}, @{{city}}, @{{region}}, @{{country}}</h4>
                    {{-- text elm search  --}}
                    {{-- <p class="text_elm_search">@{{description}}</p> --}}
                    {{-- service elm search  --}}
                    <small class="info_elm_search">@{{distance}}km</small>
                    <div class="service_elm_search">
                        <ul class="flex_items_services">
                            @{{{service}}}
                        </ul>
                        {{-- info elm search --}}
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
<script id="ajax_template_services" type="text/x-handlebars-template">
    <li class='service_list'>
        <i class='fas fa-water'></i>
    </li>
</script>
