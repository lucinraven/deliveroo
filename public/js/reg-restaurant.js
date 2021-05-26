function regMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 25.3416817, lng: 55.391809 },
    zoom: 15,
  });


  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
        var marker = new google.maps.Marker({
          position: pos,
          map: map,
          draggable: true,
          title: "Your position",
        });
        map.setCenter(pos);
        google.maps.event.addListener(marker, "drag", function () {
          console.log("marker is being dragged");
        });
        
        $("#latitude").val(pos.lat);
        $("#longitude").val(pos.lng);

        google.maps.event.addListener(marker, "dragend", function () {
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();
      
          $("#latitude").val(lat);
          $("#longitude").val(lng);
        });
      },
      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    marker = new google.maps.Marker({
      position: { lat: 25.3416817, lng: 55.391809 },
      map: map,
      draggable: true,
      title: "Your position",
    });
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

}
