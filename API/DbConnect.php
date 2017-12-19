<?php 

$host = "den1.mysql4.gear.host";
$db_name = "goldenage";
$username = "goldenage";
$password = "Ee4T_z16o~vK";
/*
$servername = "localhost";
$username = "goldenAge";
$password = "";
$database = "goldenage";
 */
 
//creating a new connection object using mysqli 
$conn = new mysqli($servername, $username, $password, $database);
 
//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
