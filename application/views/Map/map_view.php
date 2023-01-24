<!DOCTYPE html>
<html>

<head>
    <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
</head>

<body>
    <div class="col-4">
        <div class="card">

            <div class="card-body" id="show">
                <a class="skiplink" href="#map">Go to map</a>
                <div id="map" class="map" tabindex="0"></div>
                <button id="zoom-out">Zoom out</button>
                <button id="zoom-in">Zoom in</button>

            </div>
        </div>

    </div>
    <script>
        var map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            target: 'map',
            controls: ol.control.defaults({
                attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
                    collapsible: false
                })
            }),
            view: new ol.View({
                center: [0, 0],
                zoom: 2
            })
        });
    </script>
</body>

</html>