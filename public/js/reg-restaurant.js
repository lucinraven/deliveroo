function regMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 25.3416817, lng: 55.391809 },
    zoom: 15,
  });

  var marker = new google.maps.Marker({
    position: { lat: 25.3416817, lng: 55.391809 },
    map: map,
    draggable: true,
    title: "Your position",
  });

  google.maps.event.addListener(marker, "drag", function () {
    console.log("marker is being dragged");
  });

  google.maps.event.addListener(marker, "dragend", function () {
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $("#latitude").val(lat);
    $("#longitude").val(lng);
  });
}
