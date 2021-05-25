<?php

include("../private/config/config.php");
//to call the form handlers: register(sign up)
require '../private/includes/forms/signup-form.php';
?>

<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS -->
<link rel="stylesheet" href="../public/css/mainStylesheet.css">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

<title>Deliveroo</title>
</head>

<body>

<!-- Navbar -->
<div class="navbar navbar-expand-lg">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->


        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="navbar-brand me-2" href="../public/index.php">
                    <b>Deliveroo</b>
                </a>
            </ul>
            
            <!-- Left links -->
            <div class="d-flex align-items-center">
                <a href="all-restaurants.php" class="btn btn-primary">All restaurant</a>
                <a href="register-restaurant.php" class="btn btn-primary">Partner with us</a>
                    <?php if(isset($_SESSION['email'])){
                        echo '<div class="dropdown">
                        <button class="btn drop-btn">'. $_SESSION["email"] .'</button>
                        <div class="dropdown-content">
                            <a href="user-account.php">My Account</a>
                            <a href="../private/includes/handlers/logout.php">Logout</a>
                        </div>
                    </div>'; } else {
                        echo '<a href="login.php" class="btn btn-primary">Login or Sign Up</a>';
                    }
                    ?>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</div>

<!-- Modal -->
<div class="modal fade" id="authentication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Sign up page -->
<div class="sign-up-page">
    <div class="container-md">
        <div class="row">
            
            <!-- left content  -->
            <div class="col-md-7">
                <div class="left-content">
                    <img src="images/pizza maker-pana.png" alt="">
                </div>
            </div>

            <!-- right content  -->
            <div class="col-md-5">
                <div class="right-content">
                    <h1>Sign Up!</h1>
                    <div class="login-form">
                        <form action="signup.php" method="post">
                            <div class="row">
                                <label for="">Email</label>
                                <input type="text" name="reg-email">

                                <?php 
                                    if (in_array("Email already exist.", $error_array)) echo "Email already exist."; 
                                    else if(in_array("Invalid email format.", $error_array)) echo "Invalid email format.";
                                ?>
                            </div>

                            <div class="row">
                                <label for="">First name</label>
                                <input type="text" name="reg-fname">

                                <?php 
                                    if (in_array("Characters must not be less than 2 or more than 25.", $error_array)) echo "Characters must not be less than 2 or more than 25"; 
                                ?>
                            </div>

                            <div class="row">
                                <label for="">Last name</label>
                                <input type="text" name="reg-lname">

                                <?php 
                                    if (in_array("Your first name must be between 2 and 25 characters", $error_array)) echo "Your first name must be between 2 and 25 characters.<br>"; 
                                ?>
                            </div>

                            <div class="row">
                                <label for="">Password</label>
                                <input type="password" name="reg-password">

                                <?php
                                    if(in_array("Your password can only contain english characters or numbers.", $error_array)) echo "Your password can only contain english characters or numbers<br>"; 
                                
                                    else if(in_array("Your password must be between 5 and 30 characters.", $error_array)) echo "Your password must be between 5 and 30 characters."; 
                                ?>
                            </div>

                            <div class="row">
                                <label for="">Confirm Password</label>
                                <input type="password" name="reg-confirmPass">

                                <?php 
                                    if(in_array("Both password do not match.", $error_array)) echo "Both password do not match."; 
                                ?>
                            </div>

                            <input type="submit" name="register-btn" value="Register" class="btn">
                        </form>
                    </div>
                    <a href="login.php">Already have an account? Sign in.</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../private/pages/footer.php'
?>