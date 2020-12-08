// make a keyup function event
$(".location_input").keyup(function() {
    // at the keyup event show the tom search dropleft menu
    $(".tom_search").addClass("block");
    // at every keyup delete the precedent character
    $(".list_item_tom").text("");
    // make a location variable for the tom tom api
    var location = $(".location_input").val().toLowerCase();
    // call the tom tom api
    var tomQuery = "https://api.tomtom.com/search/2/search/"+location+".json?typeahead=true&limit=5&language=it-IT&extendedPostalCodesFor=Geo&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Addr%2CGeo%2CStr&view=Unified&key=5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg";
    // select the handlebar template to print the data
    var source = $("#tomtom_template").html();
    var template = Handlebars.compile(source);
    // make an ajax call for the tom tom location
    $.ajax({
        "url" : tomQuery,
        "method" : "GET",
        "success" : function (data) {
            // make a variable for results
            var results = data.results;
            // make a cicle for to iterate the results data
            for (let i = 0; i < results.length; i++) {
                // make a json object with the key and value to take
                //make an address variable
                var address = results[i].address.freeformAddress;
                //make a latitude variable
                var latitude = results[i].position.lat;
                //make a longitude variable
                var longitude = results[i].position.lon;

                var dataTom = {
                    "address" : address,
                    "latitude": latitude,
                    "longitude": longitude
                }
                // take all the data inside of a variable
                var html = template(dataTom);
                // append the data
                $(".flex_items_tom").append(html);
            }
        },
        "error" : function (err) {
        //
        }
    });
});
// make a click event to take the value from the tom tom compilation inside the dropleft menu
$(document).on("click", ".list_item_tom", function() {
    // make a variable for the clicked element
    var autoCompile = $(this).text();
    // make a variable for latitude
    var latitude = $(this).attr("data-lat");
    // make a variable for longitude
    var longitude = $(this).attr("data-long");
    // insert the value in the location input
    $(".search_input").val(autoCompile);
    // make an attribute for the longitude
    $(".search_input").attr("data-long", longitude);
    // make an attribute for the latitude
    $(".search_input").attr("data-lat", latitude);
});
// make a click event to take the value from the tom tom compilation inside the dropleft menu
$(document).on("click", ".list_item_tom", function() {
    // make a variable for the clicked element
    var autoCompile = $(this).text();
    // make a variable for latitude
    var latitude = $(this).attr("data-lat");
    // make a variable for longitude
    var longitude = $(this).attr("data-long");
    // insert the value in the location input
    $(".location_input").val(autoCompile);
    $(".tom_search").removeClass("block");
    console.log("funziono");
    // make an attribute for the longitude
    $(".longitude_input").val(longitude);
    // make an attribute for the latitude
    $(".latitude_Input").val(latitude);
});

//HEADER RESPONSIVE HAMBURGER
// var hamburger = $(".hamburger_icn");
// var cross = $(".cross_icn");
// $(document).on("click", hamburger, function() {
//     $(".hamburger_menu").toggle("active");
//     $("footer").toggle("inactive");
//     $("section").toggle("inactive");
// });
// $(document).on("click", cross, function() {
//     $(".hamburger-menu").toggle("active");
//     $("footer").toggle("inactive");
//     $("section").toggle("inactive");
// });