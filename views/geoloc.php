<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Locate the user</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<div id='map'>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiY2xlbWVudGJld2ViIiwiYSI6ImNqaXB4aWt2ZTE1bHMza21oM3h3azdzMWQifQ.RmIvZ3g2BNCdYcTmZZ44_Q';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [-96, 37.8], // starting position
    zoom: 3 // starting zoom
});

// Add geolocate control to the map.
map.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
}));
map.on('click', function(e) {
     //JSON.stringify(e.point) + '<br />' +
        // e.lngLat is the longitude, latitude geographical position of the event
        JSON.stringify(e.lngLat);
    map.loadImage('https://upload.wikimedia.org/wikipedia/commons/3/31/Icone_maps.png', function(error, image) {
        if (error) throw error;
        map.addImage('icon', image);
        map.addLayer({
            "id": "points",
            "type": "symbol",
            "source": {
                "type": "geojson",
                "data": {
                    "type": "FeatureCollection",
                    "features": [{
                        "type": "Feature",
                        "properties": {
                        "description": "<strong>Ballston Arts & Crafts Market</strong><p>The <a href=\"http://ballstonarts-craftsmarket.blogspot.com/\" target=\"_blank\" title=\"Opens in a new window\">Ballston Arts & Crafts Market</a> sets up shop next to the Ballston metro this Saturday for the first of five dates this summer. Nearly 35 artists and crafters will be on hand selling their wares. 10:00-4:00 p.m.</p>",
                        "icon": "art-gallery"
                    },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [ e.lngLat.lng, e.lngLat.lat]
                        }
                        
                    }]
                }
            },
            "layout": {
                "icon-image": "icon",
                "icon-allow-overlap": true,
                "icon-size": 0.05
            }
            
        });
        // When a click event occurs on a feature in the places layer, open a popup at the
    // location of the feature, with description HTML from its properties.
    map.on('click', 'places', function (e) {
        var coordinates = e.features[0].geometry.coordinates.slice();
        var description = e.features[0].properties.description;

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }

        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(description)
            .addTo(map);
    });

    // Change the cursor to a pointer when the mouse is over the places layer.
    map.on('mouseenter', 'places', function () {
        map.getCanvas().style.cursor = 'pointer';
    });

    // Change it back to a pointer when it leaves.
    map.on('mouseleave', 'places', function () {
        map.getCanvas().style.cursor = '';
    });
        
        
        
        
    });
});


</script>
</div>
</body>
</html>

