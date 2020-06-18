<html>
    <head>
    <meta charset=utf-8 />
    <title>Geocoding Pada Mapbox</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
    </head>
    <body>
        <div id='map'></div>
        <script>
            L.mapbox.accessToken = 'pk.eyJ1IjoiaWYzMTgwNDYiLCJhIjoiY2tiajRpdXlkMGxoeTJybWxxOHducTE0ayJ9.2MVaNzg2q9PfKAE3MBebsg';
            L.mapbox.map('map', 'mapbox.streets').addControl(L.mapbox.geocoderControl('mapbox.places'));
        </script>
    </body>
</html>