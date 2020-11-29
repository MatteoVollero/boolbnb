require('./bootstrap');
// Query data for the form
$(document).ready(function() {
    // FUNCTIONS
    function getSearchData() {
        $(".btn_search").on("click", function() { 
            // make a location variable and invoke the function
            var location = locationInput();
            // make a beds varible and invoke the function
            var beds = bedsInput();
            // make a rooms variable and invoke the function
            var rooms = roomsInput();
            // taking the array input value
            var services = [];
            var checkboxes = document.getElementsByName('service');
            var vals = "";
            for (var i = 0; i < checkboxes.length; i++) {

                if (checkboxes[i].checked) {
                    vals += checkboxes[i].value;
                    services.push(checkboxes);
                    console.log(services);
                }
            }
            // make an empty array for the input
            var arrayInput = []; 
            // make a data variable for the JSON
            var data = {};
            // push inside the array the objects
            arrayInput.push({ 
                "location" : location,
                "beds"     : beds,
                "rooms"    : rooms,
                "services" : services
            });
            data.arrayInput = arrayInput;
            console.log(data.arrayInput);
        });
    }
    getSearchData();
    // make a location input function
    function locationInput() {
        // taking the location input value
        var locationInput = $(".location_input").val().toLowerCase();
        if (isNaN(locationInput) && bedsInput != null && bedsInput != "") {
            // empty the input
            $(".location_Input").val("");
        } else {
            // empty the input
            $(".location_Input").val("");
        }
        return locationInput; 
    };

    // make a beds input function 
    function bedsInput() {
        // taking the beds input value
        var bedsInput = $(".beds_input").val();
        if (!isNaN(bedsInput) && bedsInput != "") {
            // empty the input
            $(".beds_input").val("");
        } else {
            // empty the input
            $(".beds_Input").val("");
        }    
        return bedsInput; 
    };

    // make a rooms input function 
    function roomsInput() {
        // taking the beds input value
        var roomsInput = $(".rooms_input").val();
        if (!isNaN(roomsInput) && roomsInput != "") {
            // empty the input
            $(".rooms_input").val("");
        } else {
            // empty the input
            $(".rooms_Input").val("");
        }
        return roomsInput;
    };
});