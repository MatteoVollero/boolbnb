<section class="header_main">
    <img class="jumbotron" src="{{asset('images/Jumbotron_air_bnb.jpg')}}" alt="hero_air_bnb">
    <div class="jumbotron_text_item">
        <h2 class="text_item">
            We take you everywhere you want.
        </h2>
    </div>
    <div class="jumbotron_search_item">
        <div class="search_item">
            <label id="country" for="country">Country</label>
            <input class="country_input" type="country" id="country" name="country" placeholder="Insert the Country please" maxlength="100" value="{{old('country')}}">
        </div>
        <div class="search_item">
            <label id="region" for="region">Region</label>
            <input class="region_input" type="region" id="region" name="region" placeholder="Insert the Region please" maxlength="100" value="{{old('region')}}">
        </div>
        <div class="search_item">
            <label id="city" for="city">City</label><br>
            <input class="city_input" type="city" id="city" name="city" placeholder="Insert the City please" maxlength="100" value="{{old('city')}}">
        </div>
        <div class="search_item">
            <li class="list_menu">
                <label id="distance" for="distance">Distance</label>
                <div class="dropleft_menu">
                    <ul class="flex_items">
                        <li class="list_item">
                            <label id="longitude" for="longitude">Longitude</label>
                        </li>
                        <li class="list_item">
                            <input type="longitude" id="longitude" name="longitude" placeholder="Insert the Longitude please" value="{{old('longitude')}}">
                        </li>
                        <li class="list_item">
                            <label id="latitude" for="latitude">Latitude</label>
                        </li>
                        <li class="list_item">
                            <input type="latitude" id="latitude" name="latitude" placeholder="Insert the Latitude please" value="{{old('latitude')}}">
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
                            <label id="beds" for="beds">Beds</label>
                        </li>
                        <li class="list_item">
                            <input class="beds_input" type="beds" id="beds" placeholder="Insert the n. of Beds please" value="{{old('beds')}}">
                        </li>
                        <li class="list_item">
                            <label id="rooms" for="rooms">Rooms</label>
                        </li>
                        <li class="list_item">
                            <input class="rooms_input" type="rooms" id="rooms" placeholder="Insert the n. of Rooms please" value="{{old('rooms')}}">
                        </li>
                        <li class="list_item">
                            <label id="text" for="Services">Services</label>
                        </li>
                            <ul class="list_item">
                                @foreach ($services as $service)
                                <li class="service_list_item">
                                    <input class="service_input" type="checkbox" value="{{$service->service_name}}" name="service">
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