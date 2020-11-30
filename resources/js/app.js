require('./bootstrap');
// require('./functions');
const Handlebars = require("handlebars");
// call the document ready function
$(document).ready(function() {
    console.log('Chiamo la funzione');
    // invoke the searching data function
    $(".btn_search").on("click", function() {
        // make a longitude function
        // var longitude = longitudeInput();
        var longitude = 9.18812;
        // make a latitude function
        // var latitude = latitudeInput();
        var latitude = 45.46362;

        // make a beds varible and invoke the relative function
        // var getBeds = bedsInput();
        var getBeds = 0;

        // make a rooms variable and invoke the relative function
        // var getToilets = toiletsInput();
        var getToilets = 0;
        // make a rooms variable and invoke the relative function
        // roomsInput();
        var getRooms =  1
        // make a services variable and invoke the relative function
        var getServices = [1,2,3]; //servicesInput();
        // make an empty array for the search input
        var arrayData = [];
        // make a data variable for the JSON
        var data = {};

        var getRadius = 6000;
        // push inside the array the objects
        arrayData.push ({
            // "longitude" : longitude,
            "longitude" : longitude,
            "latitude"  : latitude,
            "beds"      : getBeds,
            "rooms"     : getRooms,
            "toilets"   : getToilets,
            "services"  : getServices
        });
        data.arrayData = arrayData;
        console.log(data.arrayData);
        // make an ajax call to send the data to the DB
        $.ajax ({
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
              console.log(data);
            },
            "error" : function (err) {
                alert("error" + err);
            }
        });
    });
    console.log('Ho Chiamato la funzione');
});
        // FUNCTIONS
        // make a function to get the data from the jumbotron form
        function getSearchData() {
            $(".btn_search").on("click", function() { 
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
                // make an empty array for the search input
                var arrayData = []; 
                // make a data variable for the JSON
                var data = {};
                // push inside the array the objects
                arrayData.push ({ 
                    // "longitude" : longitude,
                    "longitude" : longitude,
                    "latitude"  : latitude,
                    "beds"      : getBeds,
                    "rooms"     : getRooms,
                    "toilets"   : getToilets,
                    "services"  : getServices
                });
                data.arrayData = arrayData;
                console.log(data.arrayData);
                // make an ajax call to send the data to the DB
                $.ajax ({
                    "url": "http://localhost:8000/api/accomodations/",
                    "data" : arrayData,
                    "method" : "GET",
                    "success" : function (data) {
                    },
                    "error" : function (err) {
                        // alert("error" + err);
                    }
                });
            });
        }
            // make a keyup function event
            $(".location_input").keyup(function() {
                // empty the text input each time the keyup event is called
                // dropleftMenu = document.getElementsByName("dropleft_tom_menu");
                // if (dropleftMenu.lenght <= 1 ) {
                    //     dropleftMenu.hide();
                    // } else {
                        //     dropleftMenu.show();
                        // };
                        // invoke the location function
                $(".list_item_tom").text("");
                var location = $(".location_input").val().toLowerCase();
                // take a tom tom api
                var tomQuery = "https://api.tomtom.com/search/2/search/"+location+".json?typeahead=true&limit=5&language=it-IT&extendedPostalCodesFor=Geo&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Addr%2CGeo%2CStr&view=Unified&key=5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg";
                // select the handlebar template to print the data
                var source = $("#tomtom_template").html();
                var template = Handlebars.compile(source);
                // make an ajax call for the tom tom location
                $.ajax
                (
                    {
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
                    }
                });
            });

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
        var locationInput = $(".location_input").val();
    if (isNaN(locationInput) && locationInput != null && locationInput != "") {
        // take the longitude attr
        var longitude = $(".location_Input").attr("data-long");
        console.log(longitude);
    } else {
        // empty the input
        $(".location_Input").val("");
    }
    return longitude;
};

    // make a latitude input function
    function latitudeInput() {
        // make a location input
        var locationInput = $(".location_input").val();
    if (isNaN(locationInput) && locationInput != null && locationInput != "") {
    //     // take the longitude attr
        var latitude = $(".location_Input").attr("data-lat");
        console.log(latitude);
    } else {
        // empty the input
        $(".location_Input").val("");
    }
    return latitude;
    };

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
        // make an attribute for the longitude
        $(".location_Input").attr("data-long", longitude);
        // make an attribute for the latitude
        $(".location_Input").attr("data-lat", latitude);
    });
