<?php
include('../connDB.php');


if(isset($Patient_ID) && isset($_SESSION['userID']) && $_SESSION['regisType'] == "C"){
	
	$query = "SELECT Name, IC, Contact, BirthYear, Address, Gender, RegisDate, BloodType, Meals, Allergic, Sickness, Deposit, Image FROM patients WHERE ID = $Patient_ID";

	echo "<center>";
	echo "<span><p class='big'>Patient Data</p></span>";

	if($p_records = mysqli_query($con,$query)){




		$p_row = mysqli_fetch_array($p_records);




		$image = $p_row['Image'];
		$image_src = "../../patient_image/".$image;


		echo "<img src='". $image_src . "' >";


		echo "<table border = 1>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<td>".$Patient_ID. "</td>";
		echo "</tr>";


		echo "<tr>";
		echo "<th>Name</th>";
		echo "<td>".$p_row['Name']. "</td>";
		echo "</tr>";


		echo "<tr>";
		echo "<th>IC</th>";
		echo "<td>" .$p_row['IC']. "</td>";
		echo "</tr>";




		echo "<tr>";
		echo "<th>Age</th>";
		$Age = date("Y") - $p_row['BirthYear'];
		echo "<td>" .$Age. "</td>";
		echo "</tr>";



		echo "<tr>";
		echo "<th>Gender</th>";
		echo "<td>";
		switch ($p_row['Gender']) {
			case 'F':
			echo "Female";
			break;
			case 'M':
			echo "Male";
			break;
			default:
			echo "Other";
			break;
		}
		echo "</td>";
		echo "</tr>";



		echo "<tr>";
		echo "<th>Contact</th>";
		echo "<td>" .$p_row['Contact']. "</td>";
		echo "</tr>";






		echo "<tr>";
		echo "<th>Address</th>";

		echo "<td>" .$p_row['Address']. "</td>";
		echo "</tr>";




		echo "<tr>";
		echo "<th>Blood Type</th>";

		echo "<td>" .$p_row['BloodType']. "</td>";
		echo "</tr>";



		echo "<tr>";
		echo "<th>Meals</th>";

		echo "<td>" .$p_row['Meals']. "</td>";
		echo "</tr>";



		echo "<tr>";
		echo "<th>Allergic</th>";

		echo "<td>" .$p_row['Allergic']. "</td>";
		echo "</tr>";


		echo "<tr>";
		echo "<th>Sickness</th>";

		echo "<td>" .$p_row['Sickness']. "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>Deposit</th>";

		echo "<td>" .$p_row['Deposit']. "</td>";
		echo "</tr>";






		echo "<tr>";
		echo "<th>Registration Date</th>";

		echo "<td>" .$p_row['RegisDate']. "</td>";

		echo "</tr>";

		echo "<tr>";


		echo "</table>";
		echo "<br/>";



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



echo "</center>";
?>