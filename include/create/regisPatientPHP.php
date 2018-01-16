<?php 

if(isset($_SESSION['userID'])){

	if(isset($_POST['next'])){


		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Age = $_POST['Age'];
		$Birthyear = date("Y") - $Age;
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];
		$Additional = $_POST['Additional'];

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
		else{
			$Sickness = $_POST['Other_Disease'];
		}
		if(isset($_POST['food'])){
			$Meals = implode(",",$_POST['food']);
		}
		else {
			$Meals = $_POST['Other_Food'];
		}

		$target_dir = "../patient_image/";

		$image = $_FILES['file']['name'];
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");


		$extensions_arr = array("jpg","jpeg","png","gif");

		if( in_array($imageFileType,$extensions_arr) ){


			$sqlPatient = "INSERT INTO patients (Name, IC, Birthyear, Gender, BloodType, Address, Contact, Meals, Allergic, Sickness, regisType, regisDate, Deposit, Image, Additional_Info) VALUES ('$Name', '$IC', $Birthyear, '$Gender', '$BloodType', '$Address', '$Contact', '$Meals', '$Allergic', '$Sickness', '$regisType', '$date', '$Deposit', '$image', '$Additional')";

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

}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";
	exit();
}
?>