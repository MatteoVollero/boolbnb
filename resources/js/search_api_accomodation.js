
// const { ajax } = require("jquery");
// const { get, defaultsDeep } = require("lodash");

// jQuery(function() {


// document.getElementById("btn-search").addEventListener("click", function() {

//     // recupera info richieste per la ricerca
//     var reqLat = $("#input-lat").val();
//     var reqLon = $("#input-lon").val();
//     var reqBeds = $("#input-beds").val();
//     var reqToilets = $("#input-toilets").val();
//     var reqRadius = $("#input-radius").val();
//     var reqRooms = $("#input-rooms").val();

//     console.log("parametri ricerca: "+"Beds: "+reqBeds + " - Toilets: "+reqToilets+ " - Radius: "+reqRadius+ "Rooms: " + reqRooms);

//     // http://localhost:8000/api/accomodations?city=Lake%20Lisa&beds=4&toilets=0
//     // https://api.tomtom.com/search/2/search/barletta%20via%20roma.json?typeahead=true&limit=20&countrySet=IT&extendedPostalCodesFor=Addr&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Addr%2CGeo&view=Unified&key=*****
//     $.ajax ({
//         "url" : "http://localhost:8000/api/accomodations",
//         "data" : {
//             "lat": reqLat,
//             "lon": reqLon,
//             "toilets": reqToilets,
//             "beds": reqBeds,
//             "radius": reqRadius,
//             "rooms" : reqRooms,
//         },
//         "method" : "GET",
//         "success" : function (data) {
//             console.log('Sono nella chiamata api vostra');
//             data = JSON.parse(data);
//             // Seleziona il tag <p> della pagina in cui stampare
//             var accomodationsPrint = document.getElementById('accomodations_id');
//             // Cancella la stampa a video della precedente ricerca
//             accomodationsPrint.innerHTML="";
//             // Stampa i record di accomodations dal risultato della ricerca della chiamata API laravel
//             console.log('Riga 40');
//             console.log(data);
//             data.forEach(accomodation => {
//                 accomodationsPrint.innerHTML= accomodationsPrint.innerHTML+accomodation['title']+" / City: "+accomodation['city']+"<br>" ;
//             });
//         },
//         "error" : function (err) {
//             alert ("Errore:"+ err);
//         }
//     });

// });




// });
