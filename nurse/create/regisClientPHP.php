<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){

	include('../connDB.php');


	$showPatient = 'SELECT ID, Name FROM patients;';
	$resultPatient = mysqli_query($con,$showPatient);
	if(!$resultPatient){
		echo "Patient not found";
	}



	if (isset($_POST['next'])) {

		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Age = $_POST['Age'];
		$Birthyear = date("Y") - $Age;
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];
		$regisType = 'C';
		$Patient_ID = $_POST['patient'];
		$Relationship = $_POST['Relationship'];


		$Password = md5($IC);

		$sqlPatient = "INSERT INTO clients (Name, IC, Gender, Birthyear,Contact, Address, regisDate, regisType, Password, Patient_ID, Relationship) 
		VALUES ('$Name', '$IC', '$Gender', $Birthyear, '$Contact', '$Address', '$regisDate', '$regisType', '$Password', '$Patient_ID', '$Relationship')";

		$result = mysqli_query($con,$sqlPatient);


		var_dump($result);
		if ($result) {
			echo "Client Added";
		}else{
			echo 'failed to add client';
		}	


	}

}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";

	exit();
}
?>