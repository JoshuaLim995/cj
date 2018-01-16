<?php 
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
	

	include('../../connDB.php');

	$ID = $_GET["ID"];

	$sql = "SELECT ID, Driver_ID, Patient_ID, Nurse_ID, Location, Description, Date, Time FROM driver_schedule WHERE ID=$ID";


	if($c_records = mysqli_query($con,$sql)){

$row = mysqli_fetch_array($c_records);
		$Driver_ID = $row['Driver_ID'];
		$Patient_ID = $row['Patient_ID'];
		$Nurse_ID = $row['Nurse_ID'];
		$Location = $row['Location'];
		$Description = $row['Description'];
		$Date = $row['Date'];
		$Time = $row['Time'];
	}




	$showPatient = 'SELECT ID, Name FROM patients;';

	$showNurse = 'SELECT ID, Name FROM users WHERE regisType = "N"';

	$showDriver = 'SELECT ID, Name FROM users WHERE regisType = "D"';



	$resultPatient = mysqli_query($con,$showPatient);

	$resultNurse = mysqli_query($con,$showNurse);


	$resultDriver = mysqli_query($con,$showDriver);


	if (isset($_POST['update'])) {

		$Driver_ID = $_POST['Driver_ID'];
		$Patient_ID = $_POST['Patient_ID'];
		$Nurse_ID = $_POST['Nurse_ID'];
		$Location = $_POST['Location'];
		$Description = $_POST['Description'];
		$Date = $_POST['Date'];
		$Time = $_POST['Time'];


		$query = "UPDATE driver_schedule SET Driver_ID = $Driver_ID, Patient_ID = $Patient_ID, Nurse_ID = $Nurse_ID, Location = '$Location', Description = '$Description', Date = '$Date', Time = '$Time' WHERE ID = $ID";


		$result = mysqli_query($con,$query);

		var_dump($result);
		if ($result) {
			header('Location: ../viewSchedule.php');
		}else{
			echo 'failed to update schedule';
		}	


	}
	
}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";

	exit();
}
?>