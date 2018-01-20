<?php 

if(isset($_SESSION['userID'])){

	if(isset($_GET["ID"])){
		$ID = $_GET["ID"];



		$Nurse_ID = $_SESSION['userID'];

		
				$query = "SELECT m.ID, Date, m.Nurse_ID, p.ID AS P_ID, p.Name AS Patient_Name, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description, Other FROM medical m, patients p WHERE m.ID = $ID AND m.Patient_ID = p.ID";

		if($m_records = mysqli_query($con,$query)){

			$m_row = mysqli_fetch_array($m_records);
			$Patient_Name = $m_row['Patient_Name'];
			$Patient_ID = $m_row['P_ID'];
			$Date = $m_row['Date'];
			$Nurse_ID = $m_row['Nurse_ID'];

			$Blood_Pressure = $m_row['Blood_Pressure']; 
			$Heart_Rate = $m_row['Heart_Rate'];
			$Sugar_Level = $m_row['Sugar_Level'];
			$Temperature = $m_row['Temperature'];
			$Description = $m_row['Description'];
			$Other = $m_row['Other'];
		}

		if (isset($_POST['update'])) {

			$Blood_Pressure = $_POST['Blood_Pressure']; 
			$Heart_Rate = $_POST['Heart_Rate'];
			$Sugar_Level = $_POST['Sugar_Level'];
			$Temperature = $_POST['Temperature'];
			$Description = $_POST['Description'];
			$Other = $_POST['Other'];


			$query = "UPDATE medical SET Date = '$Date', Nurse_ID = '$Nurse_ID', Patient_ID = '$Patient_ID', Blood_Pressure = '$Blood_Pressure', Heart_Rate = '$Heart_Rate', Sugar_Level = '$Sugar_Level', Temperature = '$Temperature', Description = '$Description', Other = '$Other'";



			$result = mysqli_query($con,$query);


			var_dump($result);
			if ($result) {
				echo "Patient Medical Record Updated";
			}else{
				echo 'failed to update Patient Medical Record';
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
	echo "The page that you have requested could not be found.";
	exit();
}


?>