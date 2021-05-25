<?php
// Declaring credential variables
$email = ""; // Email
$firstName = ""; //First name
$lastName = ""; // Last Name
$password = ""; // Password
$confirmPassword = ""; // Confirm Password
$error_array = array();

if(isset($_POST['register-btn'])){
    // Registration form values 
    // Email
    $email = strip_tags($_POST['reg-email']); // Remove html tags
    $email = str_replace(' ', '', $email); // Remove spaces
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // Purge all illegal characters from email

    // First Name
    $firstName = strip_tags($_POST['reg-fname']); //Removing html tags
    $firstName = str_replace(' ', '', $firstName); // Remove spaces
    $firstName = ucfirst(strtolower($firstName)); // Converting first smaller case letter to uppercase first letter and rest smaller case letter
    $_SESSION['reg-fname'] = $firstName; // Stores first name into session variable

    // Last Name
    $lastName = strip_tags($_POST['reg-lname']);
    $lastName = str_replace(' ', '', $lastName); // Remove spaces
    $lastName = ucfirst(strtolower($lastName)); // Converting first smaller case letter to uppercase first letter and rest smaller case letter
    $_SESSION['reg-lname'] = $lastName; // Stores first name into session variable

    //Password
	$password = strip_tags($_POST['reg-password']); //Remove html tags

     //Password
	$confirmPassword = strip_tags($_POST['reg-confirmPass']); //Remove html tags

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        // Check if email already exist in database
        $check_email = $con->prepare("SELECT email FROM users WHERE email=?");

        $check_email->bind_param("s", $email);
        $check_email->execute();

        $result = $check_email->get_result();

        $num_rows = $result->num_rows;

        if($num_rows > 0){
            array_push($error_array, "Email already exist.");
        }
    }else{
        array_push($error_array, "Invalid email format.");
    }

    // Checks the inputted first name is less than 2 characters or more than 25 characters
    if (strlen($firstName) > 25 || strlen($firstName) < 2){
        array_push($error_array, "Characters must not be less than 2 or more than 25.");
    }

     // Checks the inputted last name is less than 2 characters or more than 25 characters
    if (strlen($lastName) > 25 || strlen($lastName) < 2){
        array_push($error_array, "Characters must not be less than 2 or more than 25.");
    }

    // Checks if the inputted characters is allowed characters.
    if (preg_match('/[^A-Za-z0-9]/', $password)) {
		array_push($error_array, "Your password can only contain english characters or numbers");
	}

    if (strlen($confirmPassword > 30 || strlen($confirmPassword) < 5)) {
		array_push($error_array, "Your password must be between 8 and 30 characters.");
	}

    // If no mentioned errors above is correct this code will execute
    if(empty($error_array)){
        $password = md5($password); // Encrypt password into hash values before sending to database

        $query = $con->prepare("INSERT INTO users VALUES('', ?, ?, ?, ?, '', '', '', '', '')");

        $query->bind_param("ssss", $email, $firstName, $lastName, $password);
        $query->execute();

        $_SESSION['firstName'] = $firstName;
        $_SESSION['email'] = $email;

		header("Location: index.php");
		exit();
    }
}
?>