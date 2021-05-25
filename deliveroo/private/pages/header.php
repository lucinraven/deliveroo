<?php
include("../private/config/config.php");

include("../private/includes/classes/User.php");
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
                    <a href="login.php" class="btn btn-primary">Login or Sign Up</a>
                    <div class="dropdown">
                        <button class="btn drop-btn">Username</button>
                        <div class="dropdown-content">
                            <a href="user-account.php">My Account</a>
                            <a href="../src/handlers/logout.php">Logout</a>
                        </div>
                    </div>
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

    <!-- Navbar -->