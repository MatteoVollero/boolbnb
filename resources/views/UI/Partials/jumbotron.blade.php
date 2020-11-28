<section class="header_main">
    <img class="jumbotron" src="{{asset('images/Jumbotron_air_bnb.jpg')}}" alt="hero_air_bnb">
    <div class="jumbotron_text_item">
        <h2 class="text_item">
            We take you everywhere you want.
        </h2>
    </div>
    <div class="jumbotron_search_item">
        <div class="search_item">
            <label id="Country" for="Country">Country</label>
            <input class="country_input" type="text" id="Country" placeholder="Insert the Country please">
        </div>
        <div class="search_item">
            <label id="Region" for="Region">Region</label>
            <input class="region_input" type="text" id="Region" placeholder="Insert the Region please">
        </div>
        <div class="search_item">
            <label id="City" for="City">City</label><br>
            <input class="city_input" type="text" id="City" placeholder="Insert the City please">
        </div>
        <div class="search_item">
            <li class="list_menu">
                <label id="Distance" for="Distance">Distance</label>
                <div class="dropleft_menu">
                    <ul class="flex_items">
                        <li class="list_item">
                            <label id="Longitude" for="Longitude">Longitude</label>
                        </li>
                        <li class="list_item">
                            <input type="text" id="Longitude" placeholder="Insert the Longitude please">
                        </li>
                        <li class="list_item">
                            <label id="Latitude" for="Latitude">Latitude</label>
                        </li>
                        <li class="list_item">
                            <input type="text" id="Latitude" placeholder="Insert the Latitude please">
                        </li>
                    </ul>
                </div>
            </li>
        </div>
        <div class="search_item">
            <li class="list_menu">
                <label id="Services" for="Services">Services</label>
                <div class="dropleft_menu">
                    <ul class="flex_items">
                        <li class="list_item">
                            <label id="text" for="Beds">Beds</label>
                        </li>
                        <li class="list_item">
                            <input class="beds_input" type="text" id="Beds" placeholder="Insert the n. of Beds please">
                        </li>
                        <li class="list_item">
                            <label id="Rooms" for="Rooms">Rooms</label>
                        </li>
                        <li class="list_item">
                            <input class="rooms_input" type="text" id="Rooms" placeholder="Insert the n. of Rooms please">
                        </li>
                        <li class="list_item">
                            <label id="text" for="Services">Services</label>
                        </li>
                            <ul class="list_item">
                                @foreach ($services as $service)
                                <li class="service_list_item">
                                    <input class="service_input" type="checkbox" name="service">
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
                        </li> 
                    </ul>
                </div>
            </li>
        </div>
        <div class="btn_search">
            <button type="submit">Search<i class="fas fa-search"></i></button>
        </div>
    </div>
</section>