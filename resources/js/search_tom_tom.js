
const { ajax } = require("jquery");
const { get, defaultsDeep } = require("lodash");

jQuery(function() {

document.getElementById("input-destination").addEventListener("keyup", function() {

    // recupera info richieste per la ricerca
    var reqDestination = $("#input-destination").val();

    // prepara la stringa url per la chiamata ajax
    var $queryUrl = "https://api.tomtom.com/search/2/search/"+reqDestination+".json?typeahead=true&limit=5&language=it-IT&extendedPostalCodesFor=Geo&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Addr%2CGeo%2CStr&view=Unified&key=5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg";
    // chiamata ajax
    $.ajax ({
        "url" : $queryUrl,
        "method" : "GET",
        "success" : function (data) {
            data = JSON.parse(data);
            console.log(data);
            // seleziona il tag <p> in cui stampare
            var placeholder = document.getElementById('place_id');
            // svuota il tag <p> dai precedenti risultati
            placeholder.innerHTML="";
            // cicla i risultati della chiamata contenuti in data['results']
            data['results'].forEach(element => {
                placeholder.innerHTML=placeholder.innerHTML+element['address']['freeformAddress']+"<br>";
                placeholder.innerHTML=placeholder.innerHTML+"LAT: "+element['position']['lat']+" / LGT: "+element['position']['lon']+"<br><br>";
            });
        },
        "error" : function (err) {
            // alert ("Errore:"+err);
        }
    });

});




});
