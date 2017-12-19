<?php

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){
	include('../connDB.php');

	$q = $_REQUEST["q"];
	$type = $_REQUEST["type"];

	if($q!== ""){
		$q = strtolower($q);
		$len = strlen($q);
		if($type == "0"){
			$sql= "SELECT * FROM 
			patients WHERE name LIKE '$q%'";
		}else{
			$sql= "SELECT * FROM 
			patients WHERE ID LIKE '$q%'";
		}


		echo "<center>";
		if($records = mysqli_query($con,$sql)){
			
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
				$Age = date("Y") - $row['Birthyear'];
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



				echo "</tr>";
			}
			echo "</table>";
			echo "</center>";
		}
	}
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