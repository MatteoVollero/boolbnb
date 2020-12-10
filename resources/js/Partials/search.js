// make a position function to toggle the form based on the position insde the DOM
$(document).ready(function() {
    if ($(".var_search").val() == "search") {
        // invoke the getSearchdata function
        $(document).on("input", "#range", function () {
            var km = this.value;
            $(".distance").text("");
            $(".distance").text(km + " km");
            range = $("#range").attr("data-distance", km);
        });
        getSearchData();
    }
});

// make a function to get the data from the jumbotron form
function getSearchData() {
    $(".button_search").on("click", function() { 
        // invoke the clear blade function
        ClearBlade();
        // invoke the clear handlebars function
        ClearHandlebars();
        var researchResults = $(".research_results");
        researchResults.addClass('none');
        // make a longitude function
        var longitude = longitudeInput();
        // make a latitude function
        var latitude = latitudeInput();
        // make a beds varible and invoke the relative function
        var getBeds = bedsInput();
        // make a rooms variable and invoke the relative function
        var getToilets = toiletsInput();
        // make a rooms variable and invoke the relative function
        var getRooms = roomsInput();
        // make a services variable and invoke the relative function
        var getServices = servicesInput();
        // variable get radius 
        var getRadius = radiusInput();
        // make an empty array for the search input
        var arrayData = []; 
        // make a data variable for the JSON
        var data = {};
        // push inside the array the objects
        arrayData.push ({ 
            "longitude" : longitude,
            "latitude"  : latitude,
            "beds"      : getBeds,
            "rooms"     : getRooms,
            "toilets"   : getToilets,
            "services"  : getServices
        });
        data.arrayData = arrayData;
        // call handlebar variables
        $.ajax({
            // take the url from the DB
            "url": "http://localhost:8000/api/accomodations/",
            "data" : {
                "longitude" : longitude,
                "latitude"  : latitude,
                "beds"      : getBeds,
                "rooms"     : getRooms,
                "toilets"   : getToilets,
                "services"  : getServices,
                "radius"    : getRadius
            },
            "method" : "GET",
            "success" : function (data) {
                var source = $("#ajax_template").html();
                var template = Handlebars.compile(source);
                // make a cicle for
                for (let i = 0; i < data.length; i++) {
                    var tempService = [];
                    var services = "";
                    for (let j = 0; j < data[i]['services'].length; j++) {
                        if(data[i]['services'][j].service_name == "wi-fi"){
                            tempService.push("<li class='service_list'><span>Wi-Fi</span><i class='icn_services fas fa-wifi'></i></li>");
                        }
                        else if (data[i]['services'][j].service_name == "parking"){
                            tempService.push("<li class='service_list'><span>Parking</span><i class='icn_services fas fa-parking'></i></li>");
                        }
                        else if (data[i]['services'][j].service_name == "pool"){
                            tempService.push("<li class='service_list'><span>Pool</span><i class='icn_services fas fa-swimmer'></i></li>");
                        }
                        else if (data[i]['services'][j].service_name == "reception"){
                            tempService.push("<li class='service_list'><span>Reception</span><i class='icn_services fas fa-bell'></i></li>");
                        }
                        else if (data[i]['services'][j].service_name == "sauna"){
                            tempService.push("<li class='service_list'><span>Sauna</span><i class='icn_services fas fa-hot-tub'></i></li>");
                        }
                        else if (data[i]['services'][j].service_name == "sea_view"){
                            tempService.push("<li class='service_list'><span>Sea View</span><i class='icn_services fas fa-water'></i></li>");
                        }
                        services += tempService[j];
                    }
                    // take the context to print with handlebars
                    var context = {
                        "cover_image" : data[i]['accomodation'].cover_image,
                        "description" : data[i]['accomodation'].description,
                        "address" : data[i]['accomodation'].address,
                        "toilets" : data[i]['accomodation'].toilets,
                        "country" : data[i]['accomodation'].country,
                        "region" : data[i]['accomodation'].region,
                        "price" : data [i]['accomodation'].price,
                        "title" : data[i]['accomodation'].title,
                        "rooms" : data[i]['accomodation'].rooms,
                        "slug" : data[i]['accomodation'].slug,
                        "city" : data[i]['accomodation'].city,
                        "beds" : data[i]['accomodation'].beds,
                        "distance" : data[i]["distance"],
                        "type" : data[i]['type'].name,
                        "service" : services,
                    }

                    // take all the data inside of a variable
                    var html = template(context);
                    // var researchResults = $(".research_results");
                    // researchResults.removeClass('none');
                    $(".ajax_handlebar_print").append(html);
                    // append the data
                }
                // for (let index = 0; index < array.length; index++) {
                //     const element = array[index];
                    
                // }

            },
            "error" : function (err) {
                //
            }
        });
    });
}

// make a radius input function
function radiusInput() {
    // taking the beds input value
    var radiusInput = $("#range").attr("data-distance");
    return radiusInput;
}

// make a beds input function 
function bedsInput() {
    // taking the beds input value
    var bedsInput = $(".beds_input").val();
    if (isNaN(bedsInput) && bedsInput != "") {
        // take the value
        $(".beds_Input").val();
    } else {
        // empty the input
        $(".beds_Input").val("");
    }
    return bedsInput;
};
// make a toilets input function
function toiletsInput() {
    // taking the beds input value
    var toiletsInput = $(".toilets_input").val();
    if (isNaN(toiletsInput) && toiletsInput != "") {
        // take the value
        $(".toilets_Input").val();
    } else {
        // empty the input
        $(".toilets_Input").val("");
    }
    return toiletsInput;
};
// make a rooms input function
function roomsInput() {
    // taking the beds input value
    var roomsInput = $(".rooms_input").val();
    if (isNaN(roomsInput) && roomsInput != "") {
        // take the value
        $(".rooms_Input").val();
    } else {
        roomsInput;
        $(".rooms_Input").val("");
    }
    return roomsInput;
};
// make a services input function
function servicesInput () {
    // making an empty Array for the services
    var servicesArray = [];
    // make a variable for the checkbox input
    var checked = $(".service_input");
    // Loop and push the checked CheckBox value in the Array.
    for (var i = 0; i < checked.length; i++) {
        if (checked[i].checked) {
            servicesArray.push(checked[i].value);
        }
    }
    return servicesArray;
}
// make a longitude input function 
function longitudeInput() {
    //make a location input
    var locationInput = $(".search_input").val();
    if (isNaN(locationInput) && locationInput != null && locationInput != "") {
        // take the longitude attr
        var longitude = $(".search_input").attr("data-long");
    } else {
        // empty the input
        $(".search_input").val("");
    }
    return longitude;
};
// make a latitude input function
function latitudeInput() {
    // make a location input
    var locationInput = $(".search_input").val();
    if (isNaN(locationInput) && locationInput != null && locationInput != "") {
        // take the longitude attr
        var latitude = $(".search_input").attr("data-lat");
    } else {
        // empty the input
        $(".search_input").val("");
    }
    return latitude;
};
// make a function to clear Blade files
function ClearBlade () {
    $(".clear_blade").remove();
};
// make a function to clear handlebars files
function ClearHandlebars () {
    $(".clear_handlebars").remove();
};