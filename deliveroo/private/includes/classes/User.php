<?php
class User
{
	private $email;
	private $con;

	public function __construct($con, $email)
	{
		$this->$con = $con;
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
		$this->email = mysqli_fetch_array($user_details_query);
	}
}
?>