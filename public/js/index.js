// Loading google map api and locating users location
function indexMap() {
    let map, infoWindow;

    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 5333.4234232, lng: 21.2342312 },
      zoom: 15,
    });
  
    infoWindow = new google.maps.InfoWindow();

    const locationButton = document.getElementById("locate-btn");
    locationButton.addEventListener("click", () => {
      // Try HTML5 geolocation.
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
              title: "Your position",
            });
            map.setCenter(pos);
          },
          () => {
            handleLocationError(true, infoWindow, map.getCenter());
          }
        );
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
    });
  
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(
        browserHasGeolocation
          ? "Error: The Geolocation service failed."
          : "Error: Your browser doesn't support geolocation."
      );
      infoWindow.open(map);
    }
  }
  
  // Redirects user to the browser page upon click the confirm button in the modal pop up
  document.getElementById("redirect-btn").onclick = function () {
    location.href = "../public/browser.php";
  };