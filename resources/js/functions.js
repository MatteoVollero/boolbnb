//     // FUNCTIONS

//     // make a beds input function 
//     function bedsInput() {
//         // taking the beds input value
//         var bedsInput = $(".beds_input").val();
//         if (isNaN(bedsInput) && bedsInput != "") {
//             // take the value
//             $(".beds_Input").val();
//         } else {
//             // empty the input
//             $(".beds_Input").val("");
//         }    
//         return bedsInput; 
//     };

//     // make a toilets input function 
//     function toiletsInput() {
//         // taking the beds input value
//         var toiletsInput = $(".toilets_input").val();
//         if (isNaN(toiletsInput) && toiletsInput != "") {
//             // take the value
//             $(".toilets_Input").val();
//         } else {
//             // empty the input
//             $(".toilets_Input").val("");
//         }    
//         return toiletsInput; 
//     };

//     // make a rooms input function 
//     function roomsInput() {
//         // taking the beds input value
//         var roomsInput = $(".rooms_input").val();
//         if (isNaN(roomsInput) && roomsInput != "") {
//             // take the value
//             $(".rooms_Input").val();
//         } else {
//             roomsInput;
//             $(".rooms_Input").val("");
//         }
//         return roomsInput;
//     };

//     // make a services input function
//     function servicesInput () {
//         // making an empty Array for the services
//         var servicesArray = [];
//         // make a variable for the checkbox input
//         var checked = $(".service_input");
//         // Loop and push the checked CheckBox value in the Array.
//         for (var i = 0; i < checked.length; i++) {
//             if (checked[i].checked) {
//                 servicesArray.push(checked[i].value);
//             }
//         }
//         return servicesArray;
//     }

    

//     // make a longitude input function 
// //     function longitudeInput() {
// //         //make a location input
// //         var locationInput = $(".location_input").val();
// //     if (isNaN(locationInput) && locationInput != null && locationInput != "") {
// //         // take the longitude attr
// //         var longitude = $(".location_Input[data-long]").attr();
// //         console.log(longitude);
// //     } else {
// //         // empty the input
// //         $(".location_Input").val("");
// //     }
// //     return longitude; 
// // };

//     // make a latitude input function 
//     function latitudeInput() {
//         //make a location input
//         console.log("ciao");
//     //     var locationInput = $(".location_input").val();
//     // if (isNaN(locationInput) && locationInput != null && locationInput != "") {
//     //     // take the longitude attr
//         var latitude = $(".location_Input[data-lat]").attr();
//         console.log(latitude);
//     // } else {
//     //     // empty the input
//     //     $(".location_Input").val("");
//     // }
//     return latitude; 
// };
    
//     // make a click event to take the value from the tom tom compilation inside the dropleft menu
//     $(document).on("click", ".list_item_tom", function() {
//         // make a variable for the clicked element
//         var autoCompile = $(this).text();
//         var latitude = $(this).attr("data-lat");
//         var longitude = $(this).attr("data-long");
//         console.log(longitude);
//         // insert the value in the location input
//         $(".location_input").val(autoCompile);
//         $(".location_input").attr(latitude);
//         $(".location_input").attr(longitude);
//     });