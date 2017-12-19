<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){

	$showPatient = 'SELECT ID, Name FROM patients;';
	$resultPatient = mysqli_query($con,$showPatient);
	if(!$resultPatient){
		echo "Patient not found";
	}



	if (isset($_POST['update'])) {

		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Age = $_POST['Age'];
		$Birthyear = date("Y") - $Age;
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];
		$Patient_ID = $_POST['patient'];
		$Relationship = $_POST['Relationship'];


		$Password = md5($IC);

		$sqlPatient = "UPDATE clients SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = '$Birthyear', Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', Patient_ID = $Patient_ID, Relationship = '$Relationship' WHERE ID=$ID";

		$result = mysqli_query($con,$sqlPatient);


		var_dump($result);
		if ($result) {
			header('Location: ../view.php?type=C');
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