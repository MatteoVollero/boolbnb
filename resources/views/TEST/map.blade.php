<html>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge'/>
    <meta charset='UTF-8'>
    <title>Maps SDK for Web - Custom markers</title>
    <meta name='viewport'
          content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'/>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href={{asset('css/app.css')}}>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
Services:
    <style>
        .marker-icon {
            background-position: center;
            background-size: 22px 22px;
            border-radius: 50%;
            height: 22px;
            left: 4px;
            position: absolute;
            text-align: center;
            top: 3px;
            transform: rotate(45deg);
            width: 22px;
        }
        .marker {
            height: 30px;
            width: 30px;
        }
        .marker-content {
            background: #c30b82;
            border-radius: 50% 50% 50% 0;
            height: 30px;
            left: 50%;
            margin: -15px 0 0 -15px;
            position: absolute;
            top: 50%;
            transform: rotate(-45deg);
            width: 30px;
        }
        .marker-content::before {
            background: #ffffff;
            border-radius: 50%;
            content: "";
            height: 24px;
            margin: 3px 0 0 3px;
            position: absolute;
            width: 24px;
        }
    </style>
</head>
<body>
    <input type="number" id="latitude" value={{$accomodation[0]['latitude']}}>
    <input type="number" id="longitude" value={{$accomodation[0]['longitude']}}>

    <div id='map' class='map'></div>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js'></script>
    <script type='text/javascript' src={{asset('js/app.js')}}></script>
    <script>
        // Define your product name and version.
        // tt.setProductInfo('<your-product-name>', '<your-product-version>');
        var map = tt.map({
            key: '5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg',
            container: 'map',
            style: 'tomtom://vector/1/basic-main',
            dragPan: !isMobileOrTablet(),
            center: [-99.98580752275456, 33.43211082128627],
            zoom: 3
        });
        map.addControl(new tt.FullscreenControl());
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
        console.log('LAT: '+$('#latitude').val()+' / LGT: '+$('#longitude').val() );
        createMarker('accident.colors-white.svg', [$('#longitude').val(), $('#latitude').val()], '#5327c3', 'SVG icon');
        createMarker('accident.colors-white.png', [-99.98580752275456, 33.43211082128627], '#c30b82', 'PNG icon');
        createMarker('accident.colors-white.jpg', [-78.17043537427266, 36.31817544230164], '#c31a26', 'JPG icon');
    </script>
</body>
</html>