{{-- // Searching accomodations page for the UI --}}
@extends('UI.layouts.app')
@section('title')
    Accomodations research
@endsection
@section('main_content')
    <section class="section-search">
        {{-- SEARCHBAR --}}
        <div class="search_bar">
            <div class="search_item">
                <label id="City" for="City">City</label><br>
                <input type="text" id="City" placeholder="Insert the City please">
            </div>
            <div class="search_item">
                <label id="Typology" for="Typology">Typology</label>
                <div>
                    <select name="Select" id="Select">
                        <option value="">
                            Select
                        </option> 
                        <option value="">
                            House
                        </option> 
                        <option value="">
                            Room
                        </option>  
                        <option value="">
                            Mansion
                        </option>   
                    </select>
                </div>
            </div>
            <div class="search_item">
                <li class="list_menu">
                    <label id="Distance" for="Distance">Distance</label>
                    {{-- INSERIRE BARRA GESTIONE DISTANZA --}}
                </li>
            </div>
            <div class="search_item">
                <li class="list_menu">
                    <label id="Services" for="Services">Services</label>
                    <div class="dropleft_menu">
                        <ul class="flex_items">
                            <li class="list_item">
                                <label id="text" for="Beds">Beds</label><br>
                            </li>
                            <li class="list_item">
                                <input type="text" id="Beds" placeholder="Insert the n. of Beds please">
                            </li>
                            <li class="list_item">
                                <label id="Rooms" for="Rooms">Rooms</label>
                            </li>
                            <li class="list_item">
                                <input type="text" id="Rooms" placeholder="Insert the n. of Rooms please">
                            </li>
                            <li class="list_item">
                                <label id="text" for="Services">Services</label>
                            </li>
                                <ul class="list_item">
                                    {{-- @foreach ($services as $service)
                                    <li class="service_list_item">
                                        <input type="checkbox" name="service">
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
                                    @endforeach --}}
                                </ul>
                            </li> 
                        </ul>
                    </div>
                </li>
            </div>
            <div class="btn_search">
                <button type="submit">Search<i class="fas fa-search"></i></button>
            </div>
        </div>
        {{-- RESULTS --}}
        <div class="elm-responsive-search">
            @for ($i = 0; $i < 10; $i++)
            {{-- elm search list  --}}
            <div class="elm_search_list">
                {{-- img elm search  --}}
                <div class="img_elm_search"></div>
                {{-- title elm search  --}}
                <div class="title_elm_search">
                    {{-- title elm searc higher  --}}
                    <div class="title_elm_search_higher">
                        {{-- title elm search  --}}
                        <h3 class="title-elm-search">Accomodation</h3>
                        {{-- text elm search  --}}
                        <p class="text_elm_search">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus fugiat eveniet...<a href="#">Read more</a></p>
                        {{-- service elm search  --}}
                        <div class="service_elm_search">
                            {{-- info elm search  --}}
                            <small class="info_elm_search">3 <i class="fas fa-toilet"></i></small>
                            <small class="info_elm_search">5 <i class="fas fa-bed"></i></small>
                            <small class="info_elm_search"><i class="fas fa-wifi"></i></small>
                        </div>
                    </div>
                    {{-- text elm search lower  --}}
                    <div class="text_elm_search_lower">
                        {{-- price elm search  --}}
                        <h4 class="price_elm_search">Price</h4>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>
@endsection