<?php
//calling the header php
include '../src/pages/header.php';

//to call the form handlers: login
require '../src/includes/forms/login-form.php';
?>

<!-- Login page -->
<div class="login-page">
    <div class="container-md">
        <div class="row">
            
            <!-- left content  -->
            <div class="col-md-7">
                <div class="left-content">
                    <img src="images/chef-pana.png" alt="">
                </div>
            </div>

            <!-- right content  -->
            <div class="col-md-5">
                <div class="right-content">
                    <h1>Sign In</h1>

                    <div class="login-form">
                        <form action="login.php" method="POST">
                            <div class="row">
                                <label for="">Email</label>
                                <input type="text" name="log_email">
                            </div>

                            <div class="row">
                                <label for="">Password</label>
                                <input type="password" name="log_password">
                                <?php 
                                    if (in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect"; 
                                ?>
                            </div>

                            <input type="submit" name="login-button" class="btn"></button>
                        </form>
                    </div>
                    <span>or</span>

                    <!-- social component -->
                    <div class="social-components">
                        <button class="btn facebook">Facebook</button>

                        <button class="btn google">Google</button>
                    </div>

                    <a href="signup.php">Don't have an account? Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../src/pages/footer.php'
?>