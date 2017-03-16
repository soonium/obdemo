<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <title>Howlett Playground</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #map {
                height: 80%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Barclays Bank: {{ $count }} ATMs <img src="images/np.png" height="45px"/>
                </div>

            </div>

        </div>
        <div id="map"></div>

        <script>

          var iconBase = 'images/';
          var icons = {
                    barclays: {
                      icon: iconBase + 'barclays.icon.png'
                    }
                  };


          var locations =
            {!! $locations !!}
          ;

          function initMap() {
            var ukLatLng = {lat: 54.559322, lng: -4.174804};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 6,
              center: ukLatLng
            });

            var markers = [];

            for (var i = 0; i < locations.length; i++) {
                var loc = locations[i];

                var marker = new google.maps.Marker({
                  position: { lat: Number(loc[1]), lng: Number(loc[2]) },
                  map: map,
                  title: String(loc[0]),
                  icon: icons['barclays'].icon
                });

                var infowindow = new google.maps.InfoWindow({
                    content: String(loc[3]),
                    maxWidth: 200
                });

                bindInfoWindow(marker, map, infowindow, String(loc[3]));

                markers.push(marker);
            }

            var markerCluster = new MarkerClusterer(map,markers);

          }

          function bindInfoWindow(marker, map, infowindow, html) {
              marker.addListener('click', function() {
                  infowindow.setContent(html);
                  infowindow.open(map, this);
              });
          }


        </script>
        <script src="js/markerclusterer.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfLnWXcXe1SDgsmaCkb2KPHZMSKgt5Pb8&callback=initMap"></script>
    </body>
</html>
