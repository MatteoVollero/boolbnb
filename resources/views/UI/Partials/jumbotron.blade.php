{{-- header_main  --}}
<section class="header_main">
    {{-- jumbotron  --}}
    <img class="jumbotron" src="{{asset('images/Jumbotron_air_bnb.jpg')}}" alt="hero_air_bnb">
    <div class="jumbotron_text_item">
        {{-- text item  --}}
        <h2 class="text_item">
            We take you everywhere you want.
        </h2>
    </div>
    {{-- jumbotron search item  --}}
    <div class="jumbotron_search_item">
        {{-- search item  --}}
        <div class="search_item">
            <label id="country" for="country">Country</label>
            <input type="text" class="country_input form_input" id="country" name="country" required minlength="5" maxlength="100" placeholder="Insert the country please" value="{{old("country")}}">
        </div>
        {{-- search item  --}}
        <div class="search_item">
            <label id="region" for="region">Region</label>
            <input type="text" class="region_input form_input" id="region" name="region" required minlength="5" maxlength="100" placeholder="Insert the region please" value="{{old("region")}}">
        </div>
        {{-- search item  --}}
        <div class="search_item">
            <label id="city" for="city">City</label><br>
            <input type="text" class="city_input form_input" id="city" name="city" required minlength="5" maxlength="100" placeholder="Insert the city please" value="{{old("city")}}">
        </div>
        {{-- search item  --}}
        <div class="search_item">
            {{-- list menu  --}}
            <li class="list_menu">
                <label id="distance" for="distance">Distance</label>
                {{-- dropleft_menu  --}}
                <div class="dropleft_menu">
                    {{-- flex_items  --}}
                    <ul class="flex_items">
                        {{-- list item  --}}
                        <li class="list_item">
                            <label id="longitude" for="longitude">Longitude</label>
                        </li>
                        {{-- list item  --}}
                        <li class="list_item">
                            <input type="number" step=0.000001 class="form_input" id="longitude" name="longitude" required min="-180.00" max="180.00" placeholder="Insert the longitude please" value="{{old("longitude")}}">
                        </li>
                        {{-- list item  --}}
                        <li class="list_item">
                            <label id="latitude" for="latitude">Latitude</label>
                        </li>
                        {{-- list item  --}}
                        <li class="list_item">
                            <input type="number" step=0.000001 class="form_input" id="latitude" name="latitude" required min="-90" max="90.01" placeholder="Insert the latitude please" value="{{old("latitude")}}">
                        </li>
                    </ul>
                </div>
            </li>
        </div>
        {{-- search item  --}}
        <div class="search_item">
            {{-- list menu  --}}
            <li class="list_menu">
                <label id="Services" for="Services">Services</label>
                {{-- dropleft_menu  --}}
                <div class="dropleft_menu">
                    {{-- flex items  --}}
                    <ul class="flex_items">
                        {{-- list item  --}}
                        <li class="list_item">
                            {{-- beds  --}}
                            <label id="beds" for="beds">Beds</label>
                        </li>
                        <li class="list_item">
                            <input type="number" class="beds_input form_input" id="rooms" name="rooms" min="0" max="100" placeholder="Insert the numbers of beds" value="{{old("rooms")}}">
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
        {{-- btn search  --}}
        <div class="btn_search">
            <button type="submit">Search<i class="fas fa-search"></i></button>
        </div>
    </div>
</section>