$(document).ready(function() {
    if ($(".var_map").val() == "map") {
        
        var map = tt.map({
            key: '5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg',
            container: 'map',
            style: 'tomtom://vector/1/basic-main',
            dragPan: !isMobileOrTablet(),
            center: [$('#longitude').val(), $('#latitude').val()], //longitudine latitudine
            zoom: 3
        });
        // map.addControl(new tt.FullscreenControl());
        map.addControl(new tt.NavigationControl());

        function createMarker(icon, position, color, popupText) {
            var markerElement = document.createElement('div');
            markerElement.className = 'marker';

            var markerContentElement = document.createElement('div');
            markerContentElement.className = 'marker-content';
            markerContentElement.style.backgroundColor = color;
            markerElement.appendChild(markerContentElement);

            var iconElement = document.createElement('div');
            iconElement.className = 'marker-icon';
            iconElement.style.backgroundImage =
                'url(https://api.tomtom.com/maps-sdk-for-web/5.x/assets/images/' + icon + ')';
            markerContentElement.appendChild(iconElement);

            var popup = new tt.Popup({offset: 30}).setText(popupText);
            // add marker to map
            new tt.Marker({element: markerElement, anchor: 'bottom'})
                .setLngLat(position)
                .setPopup(popup)
                .addTo(map);
        }
        createMarker('accident.colors-white.svg', [$('#longitude').val(), $('#latitude').val()], '#5327c3', 'SVG icon');
    } 
});