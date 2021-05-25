<?php

include '../private/pages/header.php'
?>

<!-- Register restaurant page -->
<div class="register-restaurant-page">
    <div class="container-md">
        <!-- register form inputs -->
        <div class="register-forms row">
            <div class="left-content col-md-5">
                <h1>Register your restaurant and become our partner</h1>

                <div class="form-container">
                    <form action="">
                        <div class="row">
                            <label for="">
                                Restaurant Name
                            </label>
                            <input type="text">
                        </div>

                        <div class="row">
                            <label for="">
                                Restaurant building name
                            </label>
                            <input type="text">
                        </div>

                        <div class="row">
                            <label for="">
                                Street name
                            </label>
                            <input type="text">
                        </div>

                        <div class="row">
                            <label for="">
                                City
                            </label>
                            <input type="text">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Business type</label>
                                <select name="" id="">
                                    <option value="cafe">Cafe/</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Cuisine</label>
                                <select name="" id="">
                                    <option value="cafe">Cafe/</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Business Email</label>
                                <input type="text">
                            </div>
                            <div class="col-md-6">
                                <label for="">Mobile Number</label>
                                <input type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Telephone</label>
                                <input type="text">
                            </div>
                        </div>

                        <input class="btn submit-btn" type="button" value="Submit">
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
<?php
include '../private/pages/footer.php'
?>