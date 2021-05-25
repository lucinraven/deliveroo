<?php
include '../private/pages/header.php'
?>

<!-- User account page -->
<div class="user-account-page">
    <div class="container-md">
        <div class="row">
            <div class="col-md-3">
                <!-- Side Bar Navigation Tab Views-->
                <h1>My Account</h1>
                <ul>
                    <li><button class="tab-btn tablink" onclick="openTab(event, 'accInfo')">Account Information</button></li>
                    <li><button class="tab-btn tablink" onclick="openTab(event, 'accFavorites')">Your Favorites</button></li>
                </ul>
            </div>

            <!-- Tab pages -->
            <div class="col-md-9">
                <!-- Favorites account tab page -->
                <div id="accInfo" class="accInfo acc-tabs">
                    <div class="header-title">
                        <h1>My Account</h1>
                    </div>

                    <form action="">
                        <div class="row">
                            <label for="itemName">First Name</label>
                            <input type="text" value=" ">
                        </div>
                        <div class="row">
                            <label for="itemName">Last Name</label>
                            <input type="text" value=" ">
                        </div>
                        <div class="row">
                            <label for="itemName">Email</label>
                            <input type="text" value=" ">
                        </div>
                        <div class="row">
                            <label for="itemName">Mobile Number</label>
                            <input type="text" value=" ">
                        </div>
                        <div class="row">
                            <label for="itemName">Password</label>
                            <input type="text" value=" ">
                        </div>
                        <div class="row">
                            <label for="itemName">Confirm Password</label>
                            <input type="text" value=" ">
                        </div>
                    </form>
                </div>

                <!-- Favorites account tab page -->
                <div id="accFavorites" class="accFavorites acc-tabs" style="display: none;">
                    <div class="header-title">
                        <h1>Your Favorites</h1>
                    </div>

                    <!-- Favorite restaurant list -->
                    <div class="favorite-list">
                        <a href="view-restaurant.php">
                            <div class="favorite-item row">
                                <!-- Right content favorite item -->
                                <div class="left-content col-md-2">
                                    <img src="" alt="">
                                </div>

                                <!-- Right content favorite item -->
                                <div class="right-content col-md-10">
                                    <h5>Heading</h5>

                                    <ul>
                                        <li>
                                            Restaurant
                                        </li>
                                        <li>
                                            Chinese
                                        </li>
                                        <li>
                                            Address
                                        </li>
                                        <li>
                                            055-53234232
                                        </li>
                                        <li>
                                            055-53234232
                                        </li>
                                    </ul>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint eos rem, nihil, non totam facere quaerat qui.</p>
                                </div>
                            </div>
                        </a>

                        <a href="view-restaurant.php">
                            <div class="favorite-item row">
                                <!-- Right content favorite item -->
                                <div class="left-content col-md-2">
                                    <img src="" alt="">
                                </div>

                                <!-- Right content favorite item -->
                                <div class="right-content col-md-10">
                                    <h5>Heading</h5>

                                    <ul>
                                        <li>
                                            Restaurant
                                        </li>
                                        <li>
                                            Chinese
                                        </li>
                                        <li>
                                            Address
                                        </li>
                                        <li>
                                            055-53234232
                                        </li>
                                        <li>
                                            055-53234232
                                        </li>
                                    </ul>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint eos rem, nihil, non totam facere quaerat qui.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../private/pages/footer.php'
?>