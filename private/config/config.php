<?php 
session_start(); 

$con = mysqli_connect("localhost", "root", "", "deliveroo"); // setting variable for database

if($con->connect_error){
    die("connection failed: ".$con->connect_error);
}
?>