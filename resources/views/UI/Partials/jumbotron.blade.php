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
            <label id="location" for="location">Where do you want to go?</label>
            <input type="text" class="location_input form_input" id="location" name="location" required minlength="5" maxlength="100" placeholder="Insert the place please" value="{{old("location")}}">
            <div class="dropleft_menu">
                <ul class="flex_items_tom">
                    <li></li>
                </ul>
            </div>
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
                            <input type="number" class="beds_input form_input" id="rooms" name="rooms" min="0" max="100" placeholder="Insert the numbers of beds" value="{{old("beds")}}">
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
{{-- handlebars template  --}}
<script id="tomtom_template" type="text/x-handlebars-template">
   <a href=""><li class="list_item_tom">@{{ address }}</li></a>
</script>