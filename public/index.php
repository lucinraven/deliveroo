<?php
include '../private/pages/header.php';
?>

<!-- Index header content -->
<div class="index-page">
    <div class="header-banner">
        <!-- Header banner -->
        <div class="container-md">
            <!-- banner -->
            <div class="banner-content row">
                <div class="col-md-6">
                    <h1>Your favorite restaurant and takeaways, delivered to your door.</h1>

                    <div class="banner-box">
                        <p>Enter your favorite restaurant or click the button to find local restaurant near you.</p>

                        <!-- search box container -->
                        <div class="search-box-container d-flex">
                             <!-- search box input -->
                            <div class="search-input">
                                <input type="text">

                                <button type="button" id="locate-btn" class="locate-btn btn-primary pr-5" data-mdb-toggle="modal" data-mdb-target="#geolocation">
                                    <i class="fas fa-location-arrow"></i>
                                </button>
                            </div>
                             <!-- search button -->
                            <div class="search-find">
                                <button class="search-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner image -->
                <div class="col-md-6">
                    <img src="images/take away-pana.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="geolocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All restaurant</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="redirect-btn" class="btn">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Index body content -->
    <div class="body-content">
        <div class="container-md">
            <!-- Section 1 -->
            <section class="section-1">
                <h1>How does Deliveroo work?</h1>
                <p>Find local restaurants near you.</p>

                <!-- banner -->
                <div class="banner">
                    <div class="banner-item">
                        <img src="" alt="">

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="banner-item">
                        <img src="" alt="">

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="banner-item">
                        <img src="" alt="">

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </section>
            <!-- Section 1 end of code-->

            <!-- Section 2 -->
            <section class="section-2">
                <h1>Fresh from restaurant</h1>

                <div class="row">
                    <div class="col-md-6">
                        <img src="" alt="">
                    </div>

                    <div class="col-md-6">
                        <h1>Deliveroo for business</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                        

                        <a href="btn"><button class="btn">Enquire</button></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h1>Deliveroo for business</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="col-md-6">
                        <img src="" alt="">
                    </div>
                </div>

                <div class="register-banner">
                    <button class="btn">Sign Up</button>
                </div>
            </section>
            <!-- Section 2 end -->
        </div>
    </div>
</div>

<script type="text/javascript" >
// Loading google map api and locating users location
function indexMap() {
    let map, infoWindow;
    var geocoder;
  
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 25.3416817, lng: 55.391809 },
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
        var restaurantsLocations = [];
        <?php
            $sql = "SELECT * FROM restaurant";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
        ?>
        restaurantsLocations.push(
            {
                "restaurantName": "<?php echo $row['res_name'] ?>",
                "restaurantLong": "<?php echo $row['res_long'] ?>",
                "restaurantLat": "<?php echo $row['res_lat'] ?>"
            }
        );
        <?php } ?>
        console.log("restaurantsLocations",restaurantsLocations);
        restaurantsLocations.forEach( res =>{
            var point = new google.maps.LatLng(
                  parseFloat(res.restaurantLat),
                  parseFloat(res.restaurantLong));
            
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: res.restaurantName
            });
        
        });

        


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

</script>



<!-- google map script api -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNqs400Ci1TiPc1Xgi_ZpqRnvNXP9chzU&callback=indexMap"></script>

    

<?php
include '../private/pages/footer.php'

?>


