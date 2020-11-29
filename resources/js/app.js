require('./bootstrap');
// Query data for the form
$(document).ready(function() {
    // event click function to pick the location value
    $(".location_input").keypress(function locationValue(event) {
        if (event.which == 13) {
            // make a variable which takes the value of the country input data
            var locationInput = $(".location_input").val();
            if (isNaN(locationInput) && locationInput != null) {
                locationInput;
                $(".location_Input").val("");
            } else {
                $(".location_Input").val("");
            }
        }
    });
    // event click function to pick the beds value
    $(".beds_input").keypress(function bedsValue(event) {
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
    // event click function to pick the rooms value
    $(".rooms_input").keypress(function roomsValue(event) {
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
    // event click function to pick the rooms value
    $(".service_input").click(function servicesValue() {
        // make a this variable 
        clickedElm = $(this);  
        //  make an empty array
        var servicesArray = [];
        // conditions
        if (clickedElm != null) {
            // change the clicked value 
            clickedElm = $(this).val;
            // push inside of the array 
            servicesArray.push(clickedElm);
            console.log(servicesArray);
            // cicle for in
            for ( var i = 0; i < servicesArray.length; i++) {
                // console log of array 
                services = servicesArray[i];
                console.log(services);
                break;
            }
        }
    });
    // positionValue();
    // invoke the search data function 
    getSearchData(positionValue, bedsValue, roomsValue, servicesValue);
    // FUNCTIONS
    function getSearchData (positionValue, bedsValue, roomsValue, servicesValue) {
        var dataFound = [];
        if (positionValue != null && bedsValue != null 
            && roomsValue != null && servicesValue != null) {
                dataFound.push(positionValue, bedsValue, roomsValue, servicesValue)
        }
        return dataFound;
    } 
});