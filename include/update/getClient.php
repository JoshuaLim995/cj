<?php
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
  include('../../connDB.php');

  if(isset($_GET["ID"])){
   $ID = $_GET["ID"];

   $query = "SELECT c.ID, c.Name, c.IC, c.Contact, c.BirthYear, c.Address, c.Gender, c.RegisDate, c.Patient_ID,  p.Name as P_Name, c.Relationship FROM clients c, patients p WHERE c.Patient_ID = p.ID AND c.ID = $ID";


   if($c_records = mysqli_query($con,$query)){

    $row = mysqli_fetch_array($c_records);

    $Name = $row['Name'];
    $IC = $row['IC'];
    $Age = date("Y") - $row['BirthYear'];
    $Gender = $row['Gender'];
    $Contact = $row['Contact'];
    $Address = $row['Address'];
    $regisDate = $row['RegisDate'];
    $Patient_ID = $row['Patient_ID'];
    $P_Name = $row['P_Name'];

    $Relationship = $row['Relationship'];
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