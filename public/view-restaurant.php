<?php
include '../private/pages/header.php';

$res_id = $_GET['ID'];
$sql = "SELECT * FROM restaurant WHERE res_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $res_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!-- Restaurant Page -->
<div class="view-restaurant-page">
    <div class="container-md">
        <div class="container-restaurant row">
            <!-- Left content column -->
            <div class="left-content col-md-8">
                <h2><?php echo $row['res_name'] ?></h2>

                <div class="restaurant-details">
                    <ul>
                        <li>
                            <p><?php echo $row['res_type'] ?></p>
                        </li>
                        <li>
                            <p><?php echo $row['res_cuisine'] ?></p>
                        </li>
                        <li>
                            <p><?php echo $row['res_email'] ?></p>
                        </li>
                        <li>
                            <p><?php echo $row['res_num'] ?></p>
                        </li>
                        <li>
                            <p>06-53234232</p>
                        </li>
                    </ul>

                    <p><?php echo $row['dscrpt'] ?></p>
                </div>

                <!-- Map banner -->
                <div class="map-banner" id="map" style="width: 100%; height: 100%;"></div>
            </div>

            <!-- Right content column -->
            <div class="right-content col-md-4">
                <div class="restaurant-image">
                    <img src="" alt="">
                </div>
                <div class="restaurant-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias voluptates nobis eos illum laudantium? Pariatur, beatae. Suscipit, porro quibusdam praesentium.</p>
                </div>
                <div class="order">
                    <!-- change map user address details -->
                    <button class="btn btn-order">Favorites</button>
                    <button class="btn btn-order">Order</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- google map script api -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNqs400Ci1TiPc1Xgi_ZpqRnvNXP9chzU&callback=viewResMap"></script>


<script type="text/javascript">
    function viewResMap() {

        <?php echo "var res_lat =" + $row['res_lat']?>
        <?php echo "var res_lng =" + $row['res_long']?>

        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: res_lat,
                lng: res_lng
            },
            zoom: 15,
        });

        marker = new google.maps.Marker({
            position: {
                lat: res_lat,
                lng: res_lng
            },
            map: map,
            draggable: true,
            title: "Your position",
        });
    }
</script>

<?php
include '../private/pages/footer.php'
?>