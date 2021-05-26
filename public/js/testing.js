<script>
        //initialise and add the map
        function initMap(){
//    location of midtown manhattan
            var midtown = {lat: 40.7549, lng: -73.9840};
//    the maps centered at midtown
            var map = new google.maps.Map(document.getElementById('map-location'),{zoom:17, center:midtown});
//    the marker
            var marker = new google.maps.Marker({position: midtown, map: map, draggable: true});

            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    marker.setPosition(pos);

                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

            //    dragged event of the marker
            google.maps.event.addListener(marker, 'dragend', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                var address;

                $('#latitude').val(lat);
                $('#longitude').val(lng);

                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({latLng: marker.getPosition()}, function(result,status){
                    if(status == google.maps.GeocoderStatus.OK){
                        address = result[0].formatted_address;
                        // console.log(address);
                        $('#location_name').val(address);
                    }
                    else{
                        console.log('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });

        //    when the place is changed in the location box the map updates
            searchBox = new google.maps.places.SearchBox(document.querySelector( '#location_name' ));

            google.maps.event.addListener(searchBox, 'places_changed', function(){
                var places = searchBox.getPlaces(),
                bounds = new google.maps.LatLngBounds();

                for(var i = 0; place = places[i]; i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(15);

                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#latitude').val(lat);
                $('#longitude').val(lng);
            });
        }
    </script>