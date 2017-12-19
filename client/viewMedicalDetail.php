<?php 

session_start();
if(isset($_GET["ID"]) && isset($_SESSION['Patient_ID']) && $_SESSION['regisType'] == "C"){


	include ('clientHeader.php'); 
	include ('../CSS.php');
	include('../connDB.php');
	?>

	<html>
	<head>
		<title>View Medical Detail</title>
	</head>
	<body>

		<a href="viewPatientMedical.php"><img src='../button/back.png' width="50" height="50"></a> 


		<?php

		$ID = $_GET["ID"];

		$query = "SELECT ID, Date, Nurse_ID, Patient_ID, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description FROM medical WHERE ID = $ID";




		echo "<center>";
		echo "<span><p class='big'>Patient Medical Record</p></span>";


		if($records = mysqli_query($con,$query)){




			$row = mysqli_fetch_array($records);

			echo "<table border = 1>";
			echo "<tr>";
			echo "<th>Date</th>";
			echo "<td>".$row['Date']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Nurse_ID</th>";
			echo "<td>".$row['Nurse_ID']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Patient_ID</th>";
			echo "<td>".$row['Patient_ID']. "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<th>Blood_Pressure</th>";
			echo "<td>".$row['Blood_Pressure']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Heart_Rate</th>";
			echo "<td>".$row['Heart_Rate']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Sugar_Level</th>";
			echo "<td>".$row['Sugar_Level']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Temperature</th>";
			echo "<td>".$row['Temperature']. "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<th>Description</th>";
			echo "<td>".$row['Description']. "</td>";
			echo "</tr>";

			echo "</table>";
			echo "<br/>";




		}

		echo "</center>";
		?>
	</body>
	</html>



	<?php 
}
else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";
	exit();
}
?>