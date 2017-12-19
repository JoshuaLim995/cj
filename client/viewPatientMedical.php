<?php 
session_start();

if(isset($_SESSION['Patient_ID']) && $_SESSION['regisType'] == "C"){
	include('../connDB.php');
	include ('clientHeader.php'); 


	$Patient_ID = $_SESSION['Patient_ID'];

	$query = "SELECT ID, Date FROM medical WHERE Patient_ID = $Patient_ID ORDER BY Date DESC";

echo '<title>Medical Records</title>';
	echo "<center>";
	echo "<span><p class='big'>Patient Medical Record</p></span>";

	if($records = mysqli_query($con,$query)){
		while ($row = mysqli_fetch_array($records)) {

			echo "<table  class ='showMedicalDate' border = 1>";
			echo "<tr>";
			echo "<th>Date</th>";
			echo "<td>".$row['Date']. "</td>";
			echo "<td>";
			echo "<a href= 'viewMedicalDetail.php?ID={$row['ID']}'>View Detail</a>";
			echo "</td>";
			echo "</tr>";

			echo "</table>";
			echo "<br/>";

		}
	}
	else{
		echo "No Record";
	}



}
else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";
	exit();
}




?>

