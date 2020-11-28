
const { ajax } = require("jquery");
const { get, defaultsDeep } = require("lodash");

jQuery(function() { 


document.getElementById("btn-search").addEventListener("click", function() {

    // recupera info richieste per la ricerca
    var reqCity = $("#input-city").val();
    var reqBeds = $("#input-beds").val();
    var reqToilets = $("#input-toilets").val();

    console.log(reqCity + reqBeds + reqToilets);

    // http://localhost:8000/api/accomodations?city=Lake%20Lisa&beds=4&toilets=0

    $.ajax ({
        "url" : "http://localhost:8000/api/accomodations/",
        "data" : { 
            "city": reqCity, 
            "beds": reqBeds, 
            "toilets": reqToilets,
        },
        "method" : "GET",
        "success" : function (data) {

            var placeholder = document.getElementById('place_id');
            // console.log("DATA.LENGTH: "+data.length);
            // Cancella la stampa a video della precedente ricerca
            placeholder.innerHTML = "";
            // stampa i record di data nella pagina
            for (let index = 0; index < data.length; index++) {
                //  console.log("DATA.INDEX[i]: "+data[index].title);
                placeholder.innerHTML=placeholder.innerHTML+"<br>"+(index+1)+". "+data[index].city+" / "+data[index].title;
            }
        },
        "error" : function (err) {
            alert ("Errore:"+err);
        }
    });

});




});

