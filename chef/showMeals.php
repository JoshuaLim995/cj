<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "Z"){


	include('../connDB.php');



	$query = "SELECT Meals, COUNT(Meals) AS Count FROM patients GROUP BY Meals";

$total = 0;
	if($records = mysqli_query($con,$query)){

		echo "<center>";
		echo "<span><p class='big'>Meals</p></span>";
		echo "<table class ='showData' 	border = 1>";

		while ($row = mysqli_fetch_array($records)) {
			echo "<tr>";
			echo "<th>". $row['Meals'] . "</th>";
			echo "<td>" .$row['Count']. "</td>";
			echo "</tr>";

			$total += $row['Count'];
		}
		echo "</table>";

echo "Total: " . $total . " Meals";


		echo "</center>";
	}




/*
	$vegetarianSql = "SELECT COUNT(*) FROM patienttable WHERE foodSensitive = '0'";
	$resultVegetarianSQL = mysqli_query($con,$vegetarianSql);
	$vegetarianCount = mysqli_fetch_array($resultVegetarianSQL);

	$noporkSql = "SELECT COUNT(*) FROM patienttable WHERE foodSensitive = '1'";
	$resultNoporkSQL = mysqli_query($con,$noporkSql);
	$noporkCount = mysqli_fetch_array($resultNoporkSQL);

	$nocowSql = "SELECT COUNT(*) FROM patienttable WHERE foodSensitive = '2'";
	$resultNocowSQL = mysqli_query($con,$nocowSql);
	$nocowCount = mysqli_fetch_array($resultNocowSQL);

	$normalSql = "SELECT COUNT(*) FROM patienttable WHERE foodSensitive = '3'";
	$resultNormalSQL = mysqli_query($con,$normalSql);
	$normalCount = mysqli_fetch_array($resultNormalSQL);

	$total = $vegetarianCount[0] + $noporkCount[0] + $nocowCount[0] + $normalCount[0];
	echo "<center>";
	echo "Vegetarian : $vegetarianCount[0] person";
	echo "<br>";
	echo "No Pork : $noporkCount[0] person";
	echo "<br>";
	echo "No Cow : $nocowCount[0] person";
	echo "<br>";
	echo "Normal : $normalCount[0] person";
	echo "<br>";
	echo "Total : $total person";
	echo "</center>";
*/




}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";
	exit();
}
?>