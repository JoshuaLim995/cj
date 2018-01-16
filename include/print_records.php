<html>
<head>
	<title>Print Medical Report</title>
</head>
<body onload="myFunction()">


<?php

include('../connDB.php');

if(isset($_GET["Patient"])){
	$pID = $_GET["Patient"];

	$query = "SELECT m.ID, Date, u.Name AS Nurse_Name, p.Name AS Patient_Name, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description FROM medical m, users u, patients p WHERE m.Nurse_ID = u.ID AND m.Patient_ID = p.ID AND p.ID = $pID ORDER BY Date DESC";

	echo "<center>";
	if($result = mysqli_query($con,$query)){
		$row = mysqli_fetch_array($result);

		echo "<h1>".$row['Patient_Name']." Medical Report</h1>";
		echo "<table class='print' border = 1>";
		echo "<tr>";
		echo "<th>Date</th>";
		echo "<th>Blood_Pressure</th>";
		echo "<th>Heart_Rate</th>";
		echo "<th>Sugar_Level</th>";
		echo "<th>Temperature</th>";
		echo "<th>Description</th>";
		echo "<th>Nurse</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>".$row['Date']."</td>";
		echo "<td>".$row['Blood_Pressure']."</td>";
		echo "<td>".$row['Heart_Rate']."</td>";
		echo "<td>".$row['Sugar_Level']."</td>";
		echo "<td>".$row['Temperature']."</td>";
		echo "<td>".$row['Description']."</td>";
		echo "<td>".$row['Nurse_Name']."</td>";
		echo "</tr>";

		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['Date']."</td>";
			echo "<td>".$row['Blood_Pressure']."</td>";
			echo "<td>".$row['Heart_Rate']."</td>";
			echo "<td>".$row['Sugar_Level']."</td>";
			echo "<td>".$row['Temperature']."</td>";
			echo "<td>".$row['Description']."</td>";
			echo "<td>".$row['Nurse_Name']."</td>";
			echo "</tr>";
		}
	}
	else{
		echo "No Record";
	}

}

	echo "</center>";

?>

<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>