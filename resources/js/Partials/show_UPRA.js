$(document).ready(function() {
    if ($(".input").val() == "Upra") {
        // chart modal variables
        // modal stats bg 
        var modalStatsBg = document.querySelector('.modal_stats_bg');
        // button stats modal
        var modalStatsBtn = document.querySelector('.modal_stats_button');
        // close modal stats button
        var closeStats = document.querySelector('.close_stats_modal');

        // make a stats button event click function to add the class active
        modalStatsBtn.addEventListener('click', function() {
            modalStatsBg.classList.add('bg_active');
        });
            // Make an AJAX call from the api views inside the DB at the button modal click
            $(".modal_stats_button").click(function(){
                // take the id from the modal button
                var accomodationId = $(this).attr("data-id"); 
                BFixed = $("body").addClass("modal-open");
                $.ajax
                ({
                    // take the url from the DB for the views
                    "url": "http://localhost:8000/api/views/",
                    "data" : {
                    "id" : accomodationId
                    },
                    "method" : "GET",
                    "success" : function (data) {
                        var ctx = document.getElementById('accomodation_stats_chart').getContext('2d');
                        var accomodationChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: data['date'],
                                datasets: [{
                                    label: 'Last ' + 'Week ' + 'Views ' + 'For ' + 'This ' + 'Accomodation: ' + data['viewsTotal'],
                                    data: data['views'],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 255, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 2, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    },
                    "error" : function (err,data) {
                    console.log("--------------------[DEBUG]--------->[ERROR:" + err + "]: " + data);
                    }
                });
            });
        // make an event click function to remove the class active
        closeStats.addEventListener('click', function() {
            BFixed = $("body").removeClass("modal-open");
            modalStatsBg.classList.remove('bg_active');
        });
    }
});
