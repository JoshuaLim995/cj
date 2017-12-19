<?php

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){

	include('../connDB.php');

//Get users data
//$sql = "SELECT p.ID, p.Name, p.IC, p.Contact, p.BirthYear, p.Address, p.Gender, p.RegisDate, p.BloodType, p.Meals, p.Allergic, p.Sickness, p.Deposit, p.Image, c.ID AS Client_ID, c.Name AS Client_Name FROM patients p LEFT JOIN clients c ON p.ID = c.Patient_ID";

//$sql = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, BloodType, Meals, Allergic, Sickness, Deposit, Image FROM patients";

	$sql = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate FROM patients ORDER BY ID";

	echo "<center>";
	if($records = mysqli_query($con,$sql)){


		echo "<span><p class='big'>Patients</p></span>";
		echo "<table class ='showData' 	border = 1>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Name</th>";
		echo "<th>IC</th>";
		echo "<th>Age</th>";
		echo "<th>Contact</th>";
		echo "<th>Address</th>";
		echo "<th>Gender</th>";
		echo "<th>Registration Date</th>";
		echo "</tr>";

		while ($row = mysqli_fetch_array($records)) {
			echo "<tr>";
			echo "<td>".$row['ID']. "</td>";
			echo "<td>" .$row['Name']. "</td>";
			echo "<td>" .$row['IC']. "</td>";
			$Age = date("Y") - $row['BirthYear'];
			echo "<td>" .$Age. "</td>";
			echo "<td>" .$row['Contact']. "</td>";
			echo "<td>" .$row['Address']. "</td>";
			if($row['Gender'] == 'F'){
				echo "<td>Female</td>";
			}elseif($row['Gender'] == 'M'){
				echo "<td>Male</td>";
			}
			echo "<td>" .$row['RegisDate']. "</td>";

			echo "<td>";
			echo "<a href= 'view/viewPatient.php?ID={$row['ID']}'>View</a>";
	//			echo "/";
	//			echo "<a href= 'Delete.php?id={$row['ID']}'>Delete</a>";
			echo "</td>";

			echo "<td>";
			echo "<a href= 'update/update_patient.php?ID={$row['ID']}'>Update</a>";
			echo "</td>";

			echo "<td>";
			echo "<a href= 'delete.php?ID={$row['ID']}&type=$type' onclick='return myFunction({$row['ID']})'>Delete</a>";
//echo "<a href= 'delete.php?ID={$row['ID']}'>Delete</a>";
			echo "</td>";	

			echo "</tr>";
		}
		echo "</table>";

	}
	else{
		echo 'No Records';
	}
	echo "</center>";

	?>

	<script>
		function myFunction() {
			var id = arguments[0];
			var r = confirm("Delete Patient? ID: " + id);
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