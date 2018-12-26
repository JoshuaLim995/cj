<?php
$host = "den1.mysql4.gear.host";

$db_name = "goldenage";
$username = "goldenage";
$password = "Xf5aD1gB_j2!";


$con = mysqli_connect($host, $username, $password, $db_name);
if ($con === false)
{
	die("ERROR: Could not connect." .mysqli_connect_error());
	return mysqli_connect_error(); 
}
?>




