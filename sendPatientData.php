<?php 



include('connDB.php');

if(isset($_POST['next'])){


	$Name = $_POST['Name'];
	$IC = $_POST['IC'];
	$Gender = $_POST['Gender'];
	$Age = $_POST['Age'];
	$Birthyear = date("Y") - $Age;
	$Contact = $_POST['Contact'];
	$Address = $_POST['Address'];
	$regisDate = $_POST['regisDate'];

$date = str_replace('/', '-', $regisDate);


	$regisType = "P";
	$BloodType = $_POST['BloodType'];
	$Allergic = $_POST['Allergic'];
	
	$Deposit = $_POST['Deposit'];

	$Meals = null;
	$Sickness = null;


	if(isset($_POST['diseases'])){
		$Sickness = implode(",",$_POST['diseases']);
	}
	if(isset($_POST['food'])){
		$Meals = implode(",",$_POST['food']);
	}

$target_dir = "image/";

	/*
	$IC = $_POST['ic'];
	$contact = $_POST['contact'];
	$age = $_POST['age'];
	$Address = $_POST['addr'];
	$Gender = $_POST['sex'];
	$regisDate = $_POST['date'];
	$allergic = $_POST['allergic'];
	$pass = $_POST['ic'];
	$regisType = '5';
	$target_dir = "image/";


	$diseases = "diseases";
	$foodSensitive = "food";
*/

	


	$image = $_FILES['file']['name'];
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$extensions_arr = array("jpg","jpeg","png","gif");



 // Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");

	if( in_array($imageFileType,$extensions_arr) ){

//					$sqlPatient = "INSERT INTO patienttable(Photo, Name, IC, Contact, Age, Addr, Sex, diseases, foodSensitive,  regisDate, regisType, deposit) VALUES ('$image', '$name', '$ic', '$contact', '$age', '$addr', '$sex', '$diseases', '$foodSensitive', '$date', '$regisType', '$deposit')";

//		$sqlPatient = "INSERT INTO patients(Name, IC, Image) VALUES ('$Name', '$IC', '$image')";

		$sqlPatient = "INSERT INTO patients (Name, IC, Birthyear, Gender, BloodType, Address, Contact, Meals, Allergic, Sickness, regisType, regisDate, Margin, Image) VALUES ('$Name', '$IC', $Birthyear, '$Gender', '$BloodType', '$Address', '$Contact', '$Meals', '$Allergic', '$Sickness', '$regisType', '$date', '$Deposit', '$image')";

		$resultPatient = mysqli_query($con,$sqlPatient);

		
		var_dump($resultPatient);
		if ($resultPatient) {
			echo "Patient Added";
			move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$image);

		}else{
			echo 'failed';
		}	

	}
	else
		echo "No Image";
}
?>