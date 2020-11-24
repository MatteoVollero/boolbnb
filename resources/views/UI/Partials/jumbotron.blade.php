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
            <input type="text" id="Country" placeholder="Insert the Country please">
        </div>
        <div class="search_item">
            <label id="Region" for="Region">Region</label>
            <input type="text" id="Region" placeholder="Insert the Region please">
        </div>
        <div class="search_item">
            <label id="City" for="City">City</label><br>
            <input type="text" id="City" placeholder="Insert the City please">
        </div>
        {{-- <div class="search_item">
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
        </div> --}}
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
                        <li class="list_item">
                            <input type="checkbox" name="favorite_pet" value="Cats">Cats<br>      
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