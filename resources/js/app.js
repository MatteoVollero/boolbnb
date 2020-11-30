require('./bootstrap');
const Handlebars = require("handlebars");
// Query data for the form
$(document).ready(function() {
    // invoke the searching data function
    getSearchData();
});
        // FUNCTIONS
        // make a function to get the data from the jumbotron form
        function getSearchData() {
            $(".btn_search").on("click", function() { 
                // make a location variable and invoke the relative function
                var getLocation = locationInput();
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
                arrayData.push({ 
                    "location" : getLocation,
                    "beds"     : getBeds,
                    "rooms"    : getRooms,
                    "toilets"  : getToilets,
                    "services" : getServices
                });
                data.arrayData = arrayData;
                console.log(data.arrayData);
                // // make an ajax call 
                // $.ajax ({
                //     "url": "http://localhost:8000/api/accomodations/",
                //     "data" : {
                //         "location" : location,
                //         "beds"     : beds,
                //         "rooms"    : rooms,
                //         "toilets"  : toilets,
                //         "services" : getServices
                //     },
                //     "method" : "GET",
                //     "success" : function (data) {
                //         var testPrint = document.getElementsByClassName("text_item");
                //         testPrint.innerHTML = "";
                //     },
                //     "error" : function (err) {
                //         alert("error" + err);
                //     }
                // });
            });
        }
        // make a beds input function 
        function bedsInput() {
            // taking the beds input value
            var bedsInput = $(".beds_input").val();
            if (isNaN(bedsInput) && bedsInput != "") {
                // empty the input
                $(".beds_input").val("");
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
                // empty the input
                $(".toilets_input").val("");
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
                // empty the input
                $(".rooms_input").val("");
            } else {
                roomsInput;
                $(".rooms_Input").val("");
            }
            return roomsInput;
        };
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
        // make a location input function
        function locationInput() {
            // taking the location input value
            var locationInput = $(".location_input").val().toLowerCase();
            if (isNaN(locationInput) && locationInput != null && locationInput != "") {
                // take the value
                $(".location_Input").val();
            } else {
                // empty the input
                $(".location_Input").val("");
            }
            return locationInput; 
        };
            // make a keyup function event
            $(".location_input").keyup(function() {
                // empty the text input each time the keyup event is called
                $(".list_item_tom").text("");
                getLocation = locationInput();
                // take a tom tom api
                var tomQuery = "https://api.tomtom.com/search/2/search/"+getLocation+".json?typeahead=true&limit=5&language=it-IT&extendedPostalCodesFor=Geo&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Addr%2CGeo%2CStr&view=Unified&key=5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg";
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
                                var dataTom = {
                                    "address" : results[i].address.freeformAddress,
                                    "lat"     : results[i].position.lat,
                                    "lon"     : results[i].position.lon
                                }
                                console.log(results[i].address.freeformAddress);
                                console.log(results[i].position.lat);
                                console.log(results[i].position.lon);
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
            // make a click event to take the value from the tom tom compilation inside the dropleft menu
            $(document).on("click", ".list_item_tom", function() {
                    // make a variable for the clicked element
                    var autoCompile = $(this).text();
                    // insert the value in the location input
                    $(".location_input").val(autoCompile);
            });