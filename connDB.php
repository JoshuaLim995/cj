<?php
$host = "den1.mysql4.gear.host";

$db_name = "goldenage";
$username = "goldenage";
$password = "Ee4T_z16o~vK";

//$db_name = "id4035166_goldenage";
//$username = "id4035166_joshua";
//$password = "12345";

$con = mysqli_connect($host, $username, $password, $db_name);
if ($con === false)
{
	die("ERROR: Could not connect." .mysqli_connect_error());
	return mysqli_connect_error(); 
}
?>




