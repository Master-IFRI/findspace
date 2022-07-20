@extends('layouts.app')
@section('top-css')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="{{asset('maps/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{asset('maps/css/qgis2web.css')}}">
    <link rel="stylesheet" href="{{asset('maps/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('maps/css/MarkerCluster.css')}}">
    <link rel="stylesheet" href="{{asset('maps/css/MarkerCluster.Default.css')}}">
    <link rel="stylesheet" href="{{asset('maps/css/leaflet-measure.css')}}">
    <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
@endsection

@section('content')
{{--    <div class="content-wrapper">--}}

{{--        <div style="background-color: black; height: 500px;width: 500px">--}}
                <div id="map">
                </div>
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('bottom-js')

    <script src="{{asset('maps/js/qgis2web_expressions.js')}}"></script>
    <script src="{{asset('maps/js/leaflet.js')}}"></script>
    <script src="{{asset('maps/js/multi-style-layer.js')}}"></script>
    <script src="{{asset('maps/js/leaflet.rotatedMarker.js')}}"></script>
    <script src="{{asset('maps/js/leaflet.pattern.js')}}"></script>
    <script src="{{asset('maps/js/leaflet-hash.js')}}"></script>
    <script src="{{asset('maps/js/Autolinker.min.js')}}"></script>
    <script src="{{asset('maps/js/rbush.min.js')}}"></script>
    <script src="{{asset('maps/js/labelgun.min.js')}}"></script>
    <script src="{{asset('maps/js/labels.js')}}"></script>
    <script src="{{asset('maps/js/leaflet-measure.js')}}"></script>
    <script src="{{asset('maps/js/leaflet.markercluster.js')}}"></script>
    <script src="{{asset('maps/data/Amphi_tp_sig_uac_0.js')}}"></script>
    <script src="{{asset('maps/data/batiments_1.js')}}"></script>
    <script src="{{asset('maps/data/contourUAC_2.js')}}"></script>
    <script src="{{asset('maps/data/Ecoles_Faculte_3.js')}}"></script>
    <script src="{{asset('maps/data/Autres_4.js')}}"></script>
    <script src="{{asset('maps/data/Laboratoires_5.js')}}"></script>
    <script src="{{asset('maps/data/Magasins_6.js')}}"></script>
    <script src="{{asset('maps/data/Magasins_6.js')}}"></script>
    <script src="{{asset('maps/data/NaturesUac_7.js')}}"></script>
    <script src="{{asset('maps/data/pointsUac_8.js')}}"></script>
    <script src="{{asset('maps/data/ResidencesUac_9.js')}}"></script>
    <script src="{{asset('maps/data/RoutesUac_10.js')}}"></script>
    <script src="{{asset('maps/data/UtilisationTerre_11.js')}}"></script>
    <script>
        var highlightLayer;

        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
                highlightLayer.setStyle({
                    color: '#ffff00',
                });
            } else {
                highlightLayer.setStyle({
                    fillColor: '#ffff00',
                    fillOpacity: 1
                });
            }
        }

        var map = L.map('map', {
            zoomControl: true, maxZoom: 28, minZoom: 6
        }).fitBounds([[6.402114771767731, 2.3310870159472734], [6.419319586784181, 2.3423607028600757]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        var measureControl = new L.Control.Measure({
            position: 'topleft',
            primaryLengthUnit: 'feet',
            secondaryLengthUnit: 'miles',
            primaryAreaUnit: 'sqfeet',
            secondaryAreaUnit: 'sqmiles'
        });
        measureControl.addTo(map);
        document.getElementsByClassName('leaflet-control-measure-toggle')[0]
            .innerHTML = '';
        document.getElementsByClassName('leaflet-control-measure-toggle')[0]
            .className += ' fas fa-ruler';
        var bounds_group = new L.featureGroup([]);

        function setBounds() {
        }

        function pop_Amphi_tp_sig_uac_0(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Amphi_tp_sig_uac_0_0() {
            return {
                pane: 'pane_Amphi_tp_sig_uac_0',
                opacity: 1,
                color: 'rgba(38,89,128,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(55,126,184,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_Amphi_tp_sig_uac_0');
        map.getPane('pane_Amphi_tp_sig_uac_0').style.zIndex = 400;
        map.getPane('pane_Amphi_tp_sig_uac_0').style['mix-blend-mode'] = 'normal';
        var layer_Amphi_tp_sig_uac_0 = new L.geoJson(json_Amphi_tp_sig_uac_0, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Amphi_tp_sig_uac_0',
            layerName: 'layer_Amphi_tp_sig_uac_0',
            pane: 'pane_Amphi_tp_sig_uac_0',
            onEachFeature: pop_Amphi_tp_sig_uac_0,
            style: style_Amphi_tp_sig_uac_0_0,
        });
        bounds_group.addLayer(layer_Amphi_tp_sig_uac_0);
        map.addLayer(layer_Amphi_tp_sig_uac_0);

        function pop_batiments_1(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_batiments_1_0() {
            return {
                pane: 'pane_batiments_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(145,82,45,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_batiments_1');
        map.getPane('pane_batiments_1').style.zIndex = 401;
        map.getPane('pane_batiments_1').style['mix-blend-mode'] = 'normal';
        var layer_batiments_1 = new L.geoJson(json_batiments_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_batiments_1',
            layerName: 'layer_batiments_1',
            pane: 'pane_batiments_1',
            onEachFeature: pop_batiments_1,
            style: style_batiments_1_0,
        });
        bounds_group.addLayer(layer_batiments_1);
        map.addLayer(layer_batiments_1);

        function pop_contourUAC_2(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_contourUAC_2_0() {
            return {
                pane: 'pane_contourUAC_2',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 3.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(253,252,251,0.0)',
                interactive: true,
            }
        }

        map.createPane('pane_contourUAC_2');
        map.getPane('pane_contourUAC_2').style.zIndex = 402;
        map.getPane('pane_contourUAC_2').style['mix-blend-mode'] = 'normal';
        var layer_contourUAC_2 = new L.geoJson(json_contourUAC_2, {
            attribution: '',
            interactive: true,
            dataVar: 'json_contourUAC_2',
            layerName: 'layer_contourUAC_2',
            pane: 'pane_contourUAC_2',
            onEachFeature: pop_contourUAC_2,
            style: style_contourUAC_2_0,
        });
        bounds_group.addLayer(layer_contourUAC_2);
        map.addLayer(layer_contourUAC_2);

        function pop_Ecoles_Faculte_3(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Ecoles_Faculte_3_0() {
            return {
                pane: 'pane_Ecoles_Faculte_3',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(144,229,211,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_Ecoles_Faculte_3');
        map.getPane('pane_Ecoles_Faculte_3').style.zIndex = 403;
        map.getPane('pane_Ecoles_Faculte_3').style['mix-blend-mode'] = 'normal';
        var layer_Ecoles_Faculte_3 = new L.geoJson(json_Ecoles_Faculte_3, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Ecoles_Faculte_3',
            layerName: 'layer_Ecoles_Faculte_3',
            pane: 'pane_Ecoles_Faculte_3',
            onEachFeature: pop_Ecoles_Faculte_3,
            style: style_Ecoles_Faculte_3_0,
        });
        bounds_group.addLayer(layer_Ecoles_Faculte_3);
        map.addLayer(layer_Ecoles_Faculte_3);

        function pop_Autres_4(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        var pattern_Autres_4_0 = new L.StripePattern({
            weight: 0.3,
            spaceWeight: 2.0,
            color: '#f9ef2d',
            opacity: 1.0,
            spaceOpacity: 0,
            angle: 225
        });
        pattern_Autres_4_0.addTo(map);

        function style_Autres_4_0() {
            return {
                pane: 'pane_Autres_4',
                stroke: false,
                fillOpacity: 1,
                fillPattern: pattern_Autres_4_0,
                interactive: true,
            }
        }

        function style_Autres_4_1() {
            return {
                pane: 'pane_Autres_4',
                opacity: 1,
                color: 'rgba(249,239,45,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 2.0,
                fillOpacity: 0,
                interactive: true,
            }
        }

        map.createPane('pane_Autres_4');
        map.getPane('pane_Autres_4').style.zIndex = 404;
        map.getPane('pane_Autres_4').style['mix-blend-mode'] = 'normal';
        var layer_Autres_4 = new L.geoJson.multiStyle(json_Autres_4, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Autres_4',
            layerName: 'layer_Autres_4',
            pane: 'pane_Autres_4',
            onEachFeature: pop_Autres_4,
            styles: [style_Autres_4_0, style_Autres_4_1,]
        });
        bounds_group.addLayer(layer_Autres_4);
        map.addLayer(layer_Autres_4);

        function pop_Laboratoires_5(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Laboratoires_5_0() {
            return {
                pane: 'pane_Laboratoires_5',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(225,89,137,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_Laboratoires_5');
        map.getPane('pane_Laboratoires_5').style.zIndex = 405;
        map.getPane('pane_Laboratoires_5').style['mix-blend-mode'] = 'normal';
        var layer_Laboratoires_5 = new L.geoJson(json_Laboratoires_5, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Laboratoires_5',
            layerName: 'layer_Laboratoires_5',
            pane: 'pane_Laboratoires_5',
            onEachFeature: pop_Laboratoires_5,
            style: style_Laboratoires_5_0,
        });
        bounds_group.addLayer(layer_Laboratoires_5);
        map.addLayer(layer_Laboratoires_5);

        function pop_Magasins_6(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Magasins_6_0() {
            return {
                pane: 'pane_Magasins_6',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(190,207,80,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_Magasins_6');
        map.getPane('pane_Magasins_6').style.zIndex = 406;
        map.getPane('pane_Magasins_6').style['mix-blend-mode'] = 'normal';
        var layer_Magasins_6 = new L.geoJson(json_Magasins_6, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Magasins_6',
            layerName: 'layer_Magasins_6',
            pane: 'pane_Magasins_6',
            onEachFeature: pop_Magasins_6,
            style: style_Magasins_6_0,
        });
        bounds_group.addLayer(layer_Magasins_6);
        map.addLayer(layer_Magasins_6);

        function pop_NaturesUac_7(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        var pattern_NaturesUac_7_0 = new L.StripePattern({
            weight: 0.3,
            spaceWeight: 2.0,
            color: '#00d600',
            opacity: 1.0,
            spaceOpacity: 0,
            angle: 315
        });
        pattern_NaturesUac_7_0.addTo(map);

        function style_NaturesUac_7_0() {
            return {
                pane: 'pane_NaturesUac_7',
                stroke: false,
                fillOpacity: 1,
                fillPattern: pattern_NaturesUac_7_0,
                interactive: true,
            }
        }

        var pattern_NaturesUac_7_1 = new L.StripePattern({
            weight: 0.3,
            spaceWeight: 2.0,
            color: '#00d600',
            opacity: 1.0,
            spaceOpacity: 0,
            angle: 225
        });
        pattern_NaturesUac_7_1.addTo(map);

        function style_NaturesUac_7_1() {
            return {
                pane: 'pane_NaturesUac_7',
                stroke: false,
                fillOpacity: 1,
                fillPattern: pattern_NaturesUac_7_1,
                interactive: true,
            }
        }

        function style_NaturesUac_7_2() {
            return {
                pane: 'pane_NaturesUac_7',
                opacity: 1,
                color: 'rgba(0,214,0,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 2.0,
                fillOpacity: 0,
                interactive: true,
            }
        }

        map.createPane('pane_NaturesUac_7');
        map.getPane('pane_NaturesUac_7').style.zIndex = 407;
        map.getPane('pane_NaturesUac_7').style['mix-blend-mode'] = 'normal';
        var layer_NaturesUac_7 = new L.geoJson.multiStyle(json_NaturesUac_7, {
            attribution: '',
            interactive: true,
            dataVar: 'json_NaturesUac_7',
            layerName: 'layer_NaturesUac_7',
            pane: 'pane_NaturesUac_7',
            onEachFeature: pop_NaturesUac_7,
            styles: [style_NaturesUac_7_0, style_NaturesUac_7_1, style_NaturesUac_7_2,]
        });
        bounds_group.addLayer(layer_NaturesUac_7);
        map.addLayer(layer_NaturesUac_7);

        function pop_pointsUac_8(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">timestamp</th>\
                        <td>' + (feature.properties['timestamp'] !== null ? autolinker.link(feature.properties['timestamp'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_pointsUac_8_0() {
            return {
                pane: 'pane_pointsUac_8',
                radius: 2.4,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 2.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,255,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_pointsUac_8');
        map.getPane('pane_pointsUac_8').style.zIndex = 408;
        map.getPane('pane_pointsUac_8').style['mix-blend-mode'] = 'normal';
        var layer_pointsUac_8 = new L.geoJson(json_pointsUac_8, {
            attribution: '',
            interactive: true,
            dataVar: 'json_pointsUac_8',
            layerName: 'layer_pointsUac_8',
            pane: 'pane_pointsUac_8',
            onEachFeature: pop_pointsUac_8,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_pointsUac_8_0(feature));
            },
        });
        var cluster_pointsUac_8 = new L.MarkerClusterGroup({
            showCoverageOnHover: false,
            spiderfyDistanceMultiplier: 2
        });
        cluster_pointsUac_8.addLayer(layer_pointsUac_8);

        bounds_group.addLayer(layer_pointsUac_8);
        cluster_pointsUac_8.addTo(map);

        function pop_ResidencesUac_9(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        var pattern_ResidencesUac_9_0 = new L.StripePattern({
            weight: 0.3,
            spaceWeight: 2.0,
            color: '#0000da',
            opacity: 1.0,
            spaceOpacity: 0,
            angle: 315
        });
        pattern_ResidencesUac_9_0.addTo(map);

        function style_ResidencesUac_9_0() {
            return {
                pane: 'pane_ResidencesUac_9',
                stroke: false,
                fillOpacity: 1,
                fillPattern: pattern_ResidencesUac_9_0,
                interactive: true,
            }
        }

        var pattern_ResidencesUac_9_1 = new L.StripePattern({
            weight: 0.3,
            spaceWeight: 2.0,
            color: '#0000da',
            opacity: 1.0,
            spaceOpacity: 0,
            angle: 225
        });
        pattern_ResidencesUac_9_1.addTo(map);

        function style_ResidencesUac_9_1() {
            return {
                pane: 'pane_ResidencesUac_9',
                stroke: false,
                fillOpacity: 1,
                fillPattern: pattern_ResidencesUac_9_1,
                interactive: true,
            }
        }

        function style_ResidencesUac_9_2() {
            return {
                pane: 'pane_ResidencesUac_9',
                opacity: 1,
                color: 'rgba(0,0,218,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 2.0,
                fillOpacity: 0,
                interactive: true,
            }
        }

        map.createPane('pane_ResidencesUac_9');
        map.getPane('pane_ResidencesUac_9').style.zIndex = 409;
        map.getPane('pane_ResidencesUac_9').style['mix-blend-mode'] = 'normal';
        var layer_ResidencesUac_9 = new L.geoJson.multiStyle(json_ResidencesUac_9, {
            attribution: '',
            interactive: true,
            dataVar: 'json_ResidencesUac_9',
            layerName: 'layer_ResidencesUac_9',
            pane: 'pane_ResidencesUac_9',
            onEachFeature: pop_ResidencesUac_9,
            styles: [style_ResidencesUac_9_0, style_ResidencesUac_9_1, style_ResidencesUac_9_2,]
        });
        bounds_group.addLayer(layer_ResidencesUac_9);
        map.addLayer(layer_ResidencesUac_9);

        function pop_RoutesUac_10(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id</th>\
                        <td>' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">ref</th>\
                        <td>' + (feature.properties['ref'] !== null ? autolinker.link(feature.properties['ref'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">type</th>\
                        <td>' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">oneway</th>\
                        <td>' + (feature.properties['oneway'] !== null ? autolinker.link(feature.properties['oneway'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">bridge</th>\
                        <td>' + (feature.properties['bridge'] !== null ? autolinker.link(feature.properties['bridge'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">maxspeed</th>\
                        <td>' + (feature.properties['maxspeed'] !== null ? autolinker.link(feature.properties['maxspeed'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">osm_id_2</th>\
                        <td>' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">code</th>\
                        <td>' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">fclass</th>\
                        <td>' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">name_2</th>\
                        <td>' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_RoutesUac_10_0() {
            return {
                pane: 'pane_RoutesUac_10',
                opacity: 1,
                color: 'rgba(27,16,2,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
                interactive: true,
            }
        }

        map.createPane('pane_RoutesUac_10');
        map.getPane('pane_RoutesUac_10').style.zIndex = 410;
        map.getPane('pane_RoutesUac_10').style['mix-blend-mode'] = 'normal';
        var layer_RoutesUac_10 = new L.geoJson(json_RoutesUac_10, {
            attribution: '',
            interactive: true,
            dataVar: 'json_RoutesUac_10',
            layerName: 'layer_RoutesUac_10',
            pane: 'pane_RoutesUac_10',
            onEachFeature: pop_RoutesUac_10,
            style: style_RoutesUac_10_0,
        });
        bounds_group.addLayer(layer_RoutesUac_10);
        map.addLayer(layer_RoutesUac_10);

        function pop_UtilisationTerre_11(feature, layer) {
            layer.on({
                mouseout: function (e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['osm_id_2'] !== null ? autolinker.link(feature.properties['osm_id_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['code'] !== null ? autolinker.link(feature.properties['code'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['fclass'] !== null ? autolinker.link(feature.properties['fclass'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['name_2'] !== null ? autolinker.link(feature.properties['name_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_UtilisationTerre_11_0() {
            return {
                pane: 'pane_UtilisationTerre_11',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(232,113,141,1.0)',
                interactive: true,
            }
        }

        map.createPane('pane_UtilisationTerre_11');
        map.getPane('pane_UtilisationTerre_11').style.zIndex = 411;
        map.getPane('pane_UtilisationTerre_11').style['mix-blend-mode'] = 'normal';
        var layer_UtilisationTerre_11 = new L.geoJson(json_UtilisationTerre_11, {
            attribution: '',
            interactive: true,
            dataVar: 'json_UtilisationTerre_11',
            layerName: 'layer_UtilisationTerre_11',
            pane: 'pane_UtilisationTerre_11',
            onEachFeature: pop_UtilisationTerre_11,
            style: style_UtilisationTerre_11_0,
        });
        bounds_group.addLayer(layer_UtilisationTerre_11);
        map.addLayer(layer_UtilisationTerre_11);
        var baseMaps = {};
        L.control.layers(baseMaps, {
            '<img src="legend/UtilisationTerre_11.png" /> UtilisationTerre': layer_UtilisationTerre_11,
            '<img src="legend/RoutesUac_10.png" /> RoutesUac': layer_RoutesUac_10,
            '<img src="legend/ResidencesUac_9.png" /> ResidencesUac': layer_ResidencesUac_9,
            '<img src="legend/pointsUac_8.png" /> pointsUac': cluster_pointsUac_8,
            '<img src="legend/NaturesUac_7.png" /> NaturesUac': layer_NaturesUac_7,
            '<img src="legend/Magasins_6.png" /> Magasins': layer_Magasins_6,
            '<img src="legend/Laboratoires_5.png" /> Laboratoires': layer_Laboratoires_5,
            '<img src="legend/Autres_4.png" /> Autres': layer_Autres_4,
            '<img src="legend/Ecoles_Faculte_3.png" /> Ecoles_Faculte': layer_Ecoles_Faculte_3,
            '<img src="legend/contourUAC_2.png" /> contourUAC': layer_contourUAC_2,
            '<img src="legend/batiments_1.png" /> batiments': layer_batiments_1,
            '<img src="legend/Amphi_tp_sig_uac_0.png" /> Amphi_tp_sig_uac': layer_Amphi_tp_sig_uac_0,
        }).addTo(map);
        setBounds();
        var i = 0;
        layer_Amphi_tp_sig_uac_0.eachLayer(function (layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['name'] !== null ? String('<div style="color: #000000; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['name']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_Amphi_tp_sig_uac_0'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        var i = 0;
        layer_batiments_1.eachLayer(function (layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['name'] !== null ? String('<div style="color: #000000; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['name']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_batiments_1'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        var i = 0;
        layer_Ecoles_Faculte_3.eachLayer(function (layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['name'] !== null ? String('<div style="color: #69edeb; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['name']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_Ecoles_Faculte_3'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        resetLabels([layer_Amphi_tp_sig_uac_0, layer_batiments_1, layer_Ecoles_Faculte_3]);
        map.on("zoomend", function () {
            resetLabels([layer_Amphi_tp_sig_uac_0, layer_batiments_1, layer_Ecoles_Faculte_3]);
        });
        map.on("layeradd", function () {
            resetLabels([layer_Amphi_tp_sig_uac_0, layer_batiments_1, layer_Ecoles_Faculte_3]);
        });
        map.on("layerremove", function () {
            resetLabels([layer_Amphi_tp_sig_uac_0, layer_batiments_1, layer_Ecoles_Faculte_3]);
        });
    </script>
@endsection
