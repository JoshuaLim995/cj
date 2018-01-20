<?php

if(isset($_SESSION['userID'])){
	include('../connDB.php');


	$sql = "SELECT ds.ID AS ds_ID, d.Name AS Driver_Name, p.Name AS Patient_Name, n.Name AS Nurse_Name, ds.Location, ds.Description, ds.Date, ds.Time FROM users d INNER JOIN driver_schedule ds ON ds.Driver_ID = d.ID INNER JOIN users n ON ds.Nurse_ID = n.ID INNER JOIN patients p ON ds.Patient_ID = p.ID ORDER BY Date DESC, Time DESC";



	if($records = mysqli_query($con,$sql)){

		echo "<center>";
		echo "<span><p class='big'>Driver Schedule</p></span>";
		echo "<table class ='showData' 	border = 1>";
		echo "<tr>";		
		echo "<th>Date</th>";
		echo "<th>Time</th>";
		echo "<th>Location</th>";
		echo "<th>Driver</th>";
		echo "<th>Nurse</th>";
		echo "<th>Patient</th>";
		echo "<th>Description</th>";
		echo "</tr>";

		while ($row = mysqli_fetch_array($records)) {
			echo "<tr>";			
			echo "<td>".$row['Date']. "</td>";
			echo "<td>".$row['Time']. "</td>";
			echo "<td>".$row['Location']. "</td>";
			echo "<td>".$row['Driver_Name']. "</td>";
			echo "<td>".$row['Nurse_Name']. "</td>";
			echo "<td>" .$row['Patient_Name']. "</td>";
			echo "<td>" .$row['Description']. "</td>";


			echo "<td>";
			echo "<a href= 'update/update_schedule.php?ID={$row['ds_ID']}'>Update</a>";
			echo "</td>";


			echo "<td>";
			echo "<a href= 'delete.php?ID={$row['ds_ID']}&type=schedule' onclick='return myFunction({$row['ds_ID']})'>Delete</a>";
			echo "</td>";	
			echo "</tr>";
		}
		echo "</table>";
		echo "</center>";
	}
	else{

	}

	?>


	<script>
		function myFunction() {
			var id = arguments[0];
			var r = confirm("Delete Schedule?");
			if (r == true) {
				return true;
			} else {
				return false;
			}
		}
	</script>

	<?php
}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";

	echo "<a href= '../login.php'>";
	echo "Please Login to open this page.";
	echo "</a>";
	exit();
}
?>