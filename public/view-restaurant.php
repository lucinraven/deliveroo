<?php
include '../private/pages/header.php';

$res_id = $_GET['ID'];
$sql = "SELECT * FROM restaurant WHERE res_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i",$res_id);
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
                <div class="map-banner"></div>
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

<?php



include '../private/pages/footer.php'
?>