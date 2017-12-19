<?php

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
	include('../connDB.php');

//Get users data
	$sql = "SELECT c.ID, c.Name, c.IC, c.Contact, c.BirthYear, c.Address, c.Gender, c.RegisDate, c.Patient_ID,  p.Name as P_Name, c.Relationship FROM clients c, patients p WHERE c.Patient_ID = p.ID ORDER BY c.ID";



	if($records = mysqli_query($con,$sql)){

		echo "<center>";
		echo "<span><p class='big'>Clients</p></span>";
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
		echo "<th>Patient ID</th>";
		echo "<th>Patient Name</th>";
		echo "<th>Relationship</th>";
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

			echo "<td>" .$row['Patient_ID']. "</td>";
			echo "<td>" .$row['P_Name']. "</td>";
			echo "<td>" .$row['Relationship']. "</td>";

			echo "<td>";
			echo "<a href= 'view/viewClient.php?ID={$row['ID']}'>View</a>";
	//			echo "/";
	//			echo "<a href= 'Delete.php?id={$row['ID']}'>Delete</a>";
			echo "</td>";		

			echo "<td>";
			echo "<a href= 'update/update_client.php?ID={$row['ID']}'>Update</a>";
			echo "</td>";

			echo "<td>";
			echo "<a href= 'delete.php?ID={$row['ID']}&type=$type' onclick='return myFunction({$row['ID']})'>Delete</a>";
//echo "<a href= 'delete.php?ID={$row['ID']}'>Delete</a>";
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
			var r = confirm("Delete Client? ID: " + id);
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