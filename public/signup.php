<?php
//calling the header php
include '../private/pages/header.php';
//to call the form handlers: register(sign up)
require '../private/includes/forms/signup-form.php';
?>

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
                        <form action="signup.php" method="POST">
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