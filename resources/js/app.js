require('./bootstrap');

// Query data for the form
$(document).ready(function() {
    // Variable to pick the country value
    $(".country_input").keypress(function(event) {
        if (event.which == 13) {
            // make a variable which takes the value of the country input data
            var countryInput = $(".country_input").val();
            if (isNaN(countryInput)) {
                countryInput;
                $(".country_Input").val("");
                console.log(countryInput);
            } else {
                $(".country_Input").val("");
            }
        }
    });
    // Variable to pick the region value
    $(".region_input").keypress(function(event) {
        if (event.which == 13) {
            // make a variable which takes the value of the region input data
            var regionInput = $(".region_input").val();
            if (isNaN(regionInput)) {
                regionInput;
                $(".region_input").val("");
                console.log(regionInput);
            } else {
                $(".region_Input").val("");
            }
        }
    });
    // Variable to pick the city value
    $(".city_input").keypress(function(event) {
        if (event.which == 13) {
            // make a variable which takes the value of the region input data
            var cityInput = $(".city_input").val();
            if (isNaN(cityInput)) {
                cityInput;
                $(".city_input").val("");
                console.log(cityInput);
            } else {
                $(".city_Input").val("");
            }
        }
    });
    // Variable to pick the beds value
    $(".beds_input").keypress(function(event) {
        if (event.which == 13) {
            // make a variable which takes the value of the country input data
            var bedsInput = $(".beds_input").val();
            if (!isNaN(bedsInput)) {
                bedsInput;
                $(".beds_input").val("");
                console.log(bedsInput);
            } else {
                $(".beds_Input").val("");
            }
        }
    });
    // Variable to pick the rooms value
    var roomsInput = "";
    $(".rooms_input").keypress(function(event) {
        if (event.which == 13) {
            // make a variable which takes the value of the country input data
            var roomsInput = $(".rooms_input").val();
            if (!isNaN(roomsInput)) {
                roomsInput;
                $(".rooms_input").val("");
                console.log(roomsInput);
            } else {
                $(".rooms_Input").val("");
            }
        }    
    });
    // Make an array for the checkbox value
    // servicesArray(service_input, servicesArray);
    // var servicesArray = [];
    // // Make a variable to pick the checkbox value
    // var service_input = $(".service_input");
    // // invoke the services array function
    // console.log(servicesArray);
    // // FUNCTION
    // function servicesArray(data, array) {
    //     $(".service_input").click(function() {
    //         if (data == "wi-fi" && data == "parking" && data == "pool" && data =="reception" && data == "sauna" && data == "sea_view") {
    //             array.push(data);
    //         }
    //     });
    //     return array;
    // }
  }); 
