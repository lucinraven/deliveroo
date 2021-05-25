<?php

$error_array = array();

//to login the user from register.php
if (isset($_POST['login-button'])) {

	//sanitize email
	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
	//Get password
	$password = md5($_POST['log_password']);

	$check_database_query = $con->prepare("SELECT * FROM users WHERE email=? AND pwd=?");
	$check_database_query->bind_param("ss", $email, $password);
	$check_database_query->execute();

	$result = $check_database_query->get_result();

	$check_login_query = $result->num_rows;

	if ($check_login_query === 1) {
		$row = $result->fetch_assoc();
		$email = $row['email'];
		$_SESSION['email'] = $email;

		header("Location: index.php");
		exit();

	} else {
		array_push($error_array, "Email or password was incorrect<br>");
	}
}

