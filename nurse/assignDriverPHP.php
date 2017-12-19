<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){
	include('../connDB.php');

	$showPatient = 'SELECT ID, Name FROM patients;';

	$showNurse = 'SELECT ID, Name FROM users WHERE regisType = "N"';

	$showDriver = 'SELECT ID, Name FROM users WHERE regisType = "D"';



	$resultPatient = mysqli_query($con,$showPatient);

	$resultNurse = mysqli_query($con,$showNurse);


	$resultDriver = mysqli_query($con,$showDriver);


	if (isset($_POST['assign'])) {

		$Driver_ID = $_POST['Driver_ID'];
		$Patient_ID = $_POST['Patient_ID'];
		$Nurse_ID = $_POST['Nurse_ID'];
		$Location = $_POST['Location'];
		$Description = $_POST['Description'];
		$Date = $_POST['Date'];
		$Time = $_POST['Time'];


		$query = "INSERT INTO driver_schedule (Driver_ID, Patient_ID, Nurse_ID, Location, Description, Date, Time) 
		VALUES ('$Driver_ID', '$Patient_ID', '$Nurse_ID', '$Location', '$Description', '$Date', '$Time')";


		$result = mysqli_query($con,$query);

		var_dump($result);
		if ($result) {
			echo "Driver Assigned";
		}else{
			echo 'failed to assign driver';
		}	


	}
}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";
	exit();
}
?>