<?php 
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
	include('../../connDB.php');

	if(isset($_GET["ID"])){
		$Patient_ID = $_GET["ID"];



		$Nurse_ID = $_SESSION['userID'];
		$Date = date('Y-m-d');
		
		$query = "SELECT Name FROM patients WHERE ID = $Patient_ID";
		if($p_records = mysqli_query($con,$query)){

			$p_row = mysqli_fetch_array($p_records);
			$Patient_Name = $p_row['Name'];
		}


		if (isset($_POST['next'])) {


			$Blood_Pressure = $_POST['Blood_Pressure']; 
			$Heart_Rate = $_POST['Heart_Rate'];
			$Sugar_Level = $_POST['Sugar_Level'];
			$Temperature = $_POST['Temperature'];
			$Description = $_POST['Description'];


			$query = "INSERT INTO medical (Date, Nurse_ID, Patient_ID, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description) 
			VALUES ('$Date', '$Nurse_ID', '$Patient_ID', '$Blood_Pressure', '$Heart_Rate', '$Sugar_Level', '$Temperature', '$Description')";



			$result = mysqli_query($con,$query);


			var_dump($result);
			if ($result) {
				echo "Patient Medical Record Added";
			}else{
				echo 'failed to add Patient Medical Record';
			}	
		}
	}
	else{
		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}

}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";

	exit();
}
?>