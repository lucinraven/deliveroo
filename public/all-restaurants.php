<?php
include '../private/pages/header.php';

?>

<!-- display list of restaurant page -->
<div class="all-restaurant-page">
    <div class="container-md">
        <div class="items-showcase">
            <!-- Restaurant list showcase -->
            <div class="row">
                <h1>All restaurant</h1>
                <!-- Card restaurant items-->
                <?php
                $sql = "SELECT res_id, res_name, res_cuisine, res_logo FROM restaurant";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) 
                {
                ?>
                    <a class="view-item" href="./view-restaurant.php?ID=<?php echo $row['res_id'];?>">
                        <img src="./images/restaurant-logo/<?php echo $row['res_logo']?>" alt="" />

                        <h2><?php echo $row['res_name'] ?></h2>
                        <p><?php echo $row['res_cuisine'] ?></p>
                    </a>
                <?php } 
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include '../private/pages/footer.php'

?>