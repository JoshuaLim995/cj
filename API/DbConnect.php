<?php 

$host = "den1.mysql6.gear.host";
$db_name = "goldenage";
$username = "goldenage";
$password = "Xf5aD1gB_j2!";
 
//creating a new connection object using mysqli 
$conn = new mysqli($host, $username, $password, $db_name);
 
//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
