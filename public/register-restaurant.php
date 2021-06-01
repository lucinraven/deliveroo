<?php

include '../private/pages/header.php';

require '../private/includes/forms/restaurant-form.php';
?>

<!-- Register restaurant page -->
<div class="register-restaurant-page">
    <div class="container-md">
        <!-- register form inputs -->
        <div class="register-forms row">
            <div class="left-content col-md-5">
                <h1>Register your restaurant and become our partner</h1>

                <div class="form-container">
                    <form action="register-restaurant.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <label for="">
                                Restaurant Name
                            </label>
                            <input type="text" name="res-name">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Business type</label>
                                <select name="business-type" id="">
                                    <option value="restaurant">Restaurant</option>
                                    <option value="cafe">Cafe</option>
                                    <option value="bakery">Bakery</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="food-stall">Food Stall</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Cuisine</label>
                                <select name="cuisine" id="">
                                    <option value="american">American</option>
                                    <option value="asian">Asian</option>
                                    <option value="thai">Thai</option>
                                    <option value="filipino">Filipino</option>
                                    <option value="french">French</option>
                                    <option value="middle-eastern">Middle Eastern</option>
                                    <option value="korean">Korean</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="vietnamese">Vietnamese</option>
                                    <option value="vegetarian">Vegetarian</option>
                                    <option value="healthy">Healthy</option>
                                    <option value="desert">Dessert</option>
                                    <option value="bakery">Bakery</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Business Email</label>
                                <input type="text" name="res-email">
                                <?php
                                if (in_array("Email already exist.", $error_array)) echo "Email already exist.";
                                else if (in_array("Invalid email format.", $error_array)) echo "Invalid email format.";
                                ?>
                            </div>
                            <div class="col-md-6">
                                <label for="">Mobile Number</label>
                                <input type="text" name="res-num">
                            </div>
                        </div>

                        <div class="row">
                            <label for="">
                                Upload Restaurant Logo
                            </label>
                            <input type="file" name="Image" id="fileUpload" accept="image/*">
                            <?php
                                if (in_array("Invalid file format.", $error_array)) echo "Invalid file format.";
                                else if (in_array("Unknown error.", $error_array)) echo "Unknown error.";
                                else if (in_array("File size too large.", $error_array)) echo "File size too large.";
                            ?>
                        </div>

                        <div class="row">
                            <label for="">
                                Restaurant description
                            </label>
                            <textarea type="text" name="res-description"></textarea>
                        </div>

                        <div class="row">
                            <label for="">
                                Restaurant building name
                            </label>
                            <input type="text" name="res-building">
                        </div>

                        <div class="row">
                            <label for="">
                                Set your location
                            </label>
                            <div id="map"></div>
                        </div>

                        <div class="row">
                            <input type="hidden" name="res-lat" id="latitude">
                            <input type="hidden" name="res-long" id="longitude">
                        </div>

                        <input class="btn submit-btn" type="submit" name="reg-res-btn" value="Submit">
                    </form>
                </div>
            </div>
            <div class="right-content col-md-7">
                <img src="images/street food-pana.png" alt="">
            </div>
        </div>
        <!-- register form inputs end of code-->

    </div>
</div>
<!-- register restaurant page end of code -->
<script type="text/javascript" src="js/reg-restaurant.js"></script>

<!-- JQUERY -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- google map script api -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=[YOUR API KEY]&callback=viewResMap"></script>

<?php
include '../private/pages/footer.php'
?>