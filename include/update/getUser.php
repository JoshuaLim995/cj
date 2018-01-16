<?php
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
  include('../../connDB.php');

  if(isset($_GET["ID"])){
   $ID = $_GET["ID"];

   $query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, RegisType FROM users WHERE id = $ID";


   if($c_records = mysqli_query($con,$query)){

    $row = mysqli_fetch_array($c_records);

    $Name = $row['Name'];
    $IC = $row['IC'];
    $Age = date("Y") - $row['BirthYear'];
    $Gender = $row['Gender'];
    $Contact = $row['Contact'];
    $Address = $row['Address'];
    $regisType = $row['RegisType'];
    $regisDate = $row['RegisDate'];
  }
  else{
    echo "No Record";
  }
}
}else{
  header("HTTP/1.0 404 Not Found");
  echo "<h1>404 Not Found</h1>";
  echo "<p>The page that you have requested could not be found.</p>";

  exit();
}
?>