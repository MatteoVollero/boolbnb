// call the document ready function
$(document).ready(function() {
    // invoke the getSearchdata function
    getSearchData();
});
// FUNCTIONS

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
                var getRadius = 6000;
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
            $.ajax 
            (   
                {
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
                        // take the context to print with handlebars
                        var service = data[i]['services'];
                        var context = {
                            "cover_image" : data[i]['accomodation'].cover_image,
                            "description" : data[i]['accomodation'].description,
                            "type" : data[i]['type'].name,
                            "service" : service.service_name,
                            "toilets" : data[i]['accomodation'].toilets,
                            "country" : data[i]['accomodation'].country,
                            "region" : data[i]['accomodation'].region,
                            "price" : data [i]['accomodation'].price,
                            "title" : data[i]['accomodation'].title,
                            "rooms" : data[i]['accomodation'].rooms,
                            "city" : data[i]['accomodation'].city,
                            "beds" : data[i]['accomodation'].beds
                        }
                        // take all the data inside of a variable
                        var html = template(context);
                        var researchResults = $(".research_results");
                        console.log(context);
                        researchResults.removeClass('none');
                        $(".ajax_handlebar_print").append(html);
                        // append the data
                    }
                },
                "error" : function (err) {
                    // alert("error" + err);
                }
                });
            });
        }
        // make a keyup function event
        $(".location_input").keyup(function() {
            // console.log("enter");
            // // at the event keyup show the dropleft menu
            // if( $(".location_input") > 0 && $(".location_input") < 2) {
            //     console.log($(".location_input"));
            //     $('.tom_search').addClass("block"); 
            // };
            // console.log("exit");
            // empty the text input each time the keyup event is called
            $(".list_item_tom").text("");
            // make a location variable for the tom tom api
            var location = $(".location_input").val().toLowerCase();
            // call the tom tom api
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
            var locationInput = $(".search_input").val();
        if (isNaN(locationInput) && locationInput != null && locationInput != "") {
            // take the longitude attr
            var longitude = $(".search_input").attr("data-long");
            console.log(longitude);
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
        //     // take the longitude attr
            var latitude = $(".search_input").attr("data-lat");
            console.log(latitude);
        } else {
            // empty the input
            $(".search_input").val("");
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
            // make an attribute for the longitude
            $(".longitude_input").val(longitude);
            // make an attribute for the latitude
            $(".latitude_Input").val(latitude);
        });

        // make a function to clear Blade files
        function ClearBlade () {
            $(".clear_blade").remove();
        }

        // make a function to clear handlebars files
        function ClearHandlebars () {
            $(".clear_handlebars").remove();
        }

        // // messages modal variables
        // // modal messages bg 
        // var modalMessagesBg = document.querySelector('.modal_messages_bg');
        // // button messages modal
        // var modalMessagesBtn = document.querySelector('.modal_messages_button');
        // // close modal messages button
        // var closeMessages = document.querySelector('.close_messages_modal');

        // // make a stats button event click function to add the class active
        // modalMessagesBtn.addEventListener('click', function() {
        //     modalMessagesBg.classList.add('bg_active');
        //     console.log("open");
        // });

        // // make an event click function to remove the class active
        // closeMessages.addEventListener('click', function() {
        //     modalMessagesBg.classList.remove('bg_active');
        //     console.log('close');
        // });

        // // chart modal variables
        // // modal stats bg 
        // var modalStatsBg = document.querySelector('.modal_stats_bg');
        // // button stats modal
        // var modalStatsBtn = document.querySelector('.modal_stats_button');
        // // close modal stats button
        // var closeStats = document.querySelector('.close_stats_modal');

        // // make a stats button event click function to add the class active
        // modalStatsBtn.addEventListener('click', function() {
        //     modalStatsBg.classList.add('bg_active');
        //     console.log("open");
        // });

        // // make an event click function to remove the class active
        // closeStats.addEventListener('click', function() {
        //     modalStatsBg.classList.remove('bg_active');
        //     console.log('close');
        // });
        // // single accomodation statistic chart
        // var ctx = document.getElementById('accomodation_stats_chart').getContext('2d');
        // var accomodationChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['January', 'febraury', 'march'],
        //         datasets: [{
        //             label: 'Accomodation Views',
        //             data: [ 30 , 35 , 36 ],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });