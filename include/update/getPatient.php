<?php 
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
  include('../../connDB.php');


  if(isset($_GET["ID"])){
   $ID = $_GET["ID"];

   $query = "SELECT Name, IC, Contact, BirthYear, Address, Gender, RegisDate, BloodType, Meals, Allergic, Sickness, Deposit, Image, Additional_Info FROM patients WHERE ID = $ID";



   if($records = mysqli_query($con,$query)){

    $row = mysqli_fetch_array($records);

    $Name = $row['Name'];
    $IC = $row['IC'];
    $Age = date("Y") - $row['BirthYear'];
    $Gender = $row['Gender'];
    $Contact = $row['Contact'];
    $Address = $row['Address'];
    $regisDate = $row['RegisDate'];


    $BloodType = $row['BloodType'];
    $Allergic = $row['Allergic'];

    $Meals = $row['Meals'];
    $Sickness = $row['Sickness'];

$s_array = explode( ',', $Sickness);
$m_array = explode( ',', $Meals);
// if(in_array('Diabetes', $array)){
//   echo "Diabetes";
// }
// if(in_array('Heart Diseases', $array)){
//  // echo "Heart Diseases";
// }
// if(in_array('Dementia', $array)){
//   echo "Dementia";
// }
// if(in_array('Lung disease', $array)){
//   echo "Lung disease";
// }

//else{
  // foreach ($array as $sick) {
  //   switch ($sick) {
  //     case 'Diabetes':
  //     case 'Heart Diseases':
  //     case 'Dementia':
  //     case 'Lung disease':
  //       # code...
  //       break;
      
  //     default:
  //       $other = $sick;
  //       break;
  //   }
  // }


    $Deposit = $row['Deposit'];
    $RegisDate = $row['RegisDate'];

    $Image = $row['Image'];

    $Additional_Info = $row['Additional_Info'];

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