<?php
// Declaring variables
$res_name = ""; // Restaurant Name
$res_email = ""; // Restaurant Email
$res_num = ""; // Restaurant Number
$res_logo = ""; // Restaurant logo
$res_description = ""; // Restaurant Description
$res_building = "";  // Restaurant building
$res_long = ""; // Restaurant longitude location
$res_lat = ""; // Restaurant latitude location
$res_type = ""; // Restaurant business type
$res_cuisine = ""; // Restaurant cuisine type

// Declaring upload image variables
$fileName = "";
$fileTemp = "";
$fileSize = "";
$fileError = "";
$fileType = "";

// Declaring error aray variable
$error_array = array();

if (isset($_POST['reg-res-btn'])) {
    //Restaurant Name
    $res_name = strip_tags($_POST['res-name']); // remove html tags
    $res_name = str_replace('', '', $res_name); //remove spacing
    $res_name = ucfirst(strtolower($res_name)); // converting first smaller case letter to capital

    // Restaurant Email
    $res_email = strip_tags($_POST['res-email']); // remove html tags
    $res_email = str_replace(' ', ' ', $res_email); // remove spacing
    $res_email = filter_var($res_email, FILTER_SANITIZE_EMAIL); // removes illegal character from email 

    // Restaurant Number
    $res_num = filter_var($res_num, FILTER_VALIDATE_INT);

    // Restaurant building
    $res_description = strip_tags($_POST['res-description']); // remove html tags
    $res_description = str_replace('', '', $res_description); //remove spacing
    $res_description = ucfirst(strtolower($res_description)); // converting first smaller case letter to capital


    // Restaurant building
    $res_building = strip_tags($_POST['res-building']); // remove html tags
    $res_building = str_replace('', '', $res_building); //remove spacing
    $res_building = ucfirst(strtolower($res_building)); // converting first smaller case letter to capital

    // Restaurant city latitude and longitude
    $res_lat = trim($_POST['res-lat']);
    $res_long = trim($_POST['res-long']);

    // Restaurant Cuisine
    $res_cuisine = trim($_POST['cuisine']);
    $res_type = trim($_POST['business-type']);

    if (filter_var($res_email, FILTER_VALIDATE_EMAIL)) {

        // Checks if email already exist in database
        $check_email = $con->prepare("SELECT res_email FROM restaurant WHERE res_email=?");

        $check_email->bind_param("s", $email);
        $check_email->execute();

        $result = $check_email->get_result();

        $num_rows = $result->num_rows;

        if ($num_rows > 0) {
            array_push($error_array, "Email already exist.");
        }
    } else {
        array_push($error_array, "Invalid email format.");
    }

    // Check the image upload
    $fileName = $_FILES['Image']['name'];
    $fileTmp = $_FILES['Image']['tmp_name'];
    $fileSize = $_FILES['Image']['size'];
    $fileError = $_FILES['Image']['error'];
    $fileType = $_FILES['Image']['type'];

    $fileNameNew = "";
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (!in_array($fileActualExt, $allowed)) {
        array_push($error_array, "Invalid file format");
    }

    if ($fileError !== 0) {
        array_push($error_array, "Unknown error");
    }

    if ($fileSize >= 1000000) {
        array_push($error_array, "File size too large");
    }

    if (empty($error_array)) {
        $fileNameNew = "restaurant-logo" . uniqid() . "." . $fileActualExt;
        $fileDestination = '../public/images/restaurant-logo/' . $fileNameNew;

        $directory = '../public/images/restaurant-logo/' . $fileNameNew;

        move_uploaded_file($fileTmp, $fileDestination);

        $query = $con->prepare("INSERT INTO restaurant VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $query->bind_param("ssssssssss", $res_name, $res_cuisine, $res_type, $res_email, $res_num, $fileNameNew, $res_building, $res_description, $res_long, $res_lat);
        $query->execute();

        header("Location: all-restaurants.php");
        exit();
    }
}
