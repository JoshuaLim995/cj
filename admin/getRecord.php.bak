<?php
	include('../connDB.php');

	$q = $_REQUEST["q"];
	$type = $_REQUEST["type"];

	if($q!== ""){
		$q = strtolower($q);
		$len = strlen($q);
		if($type == "0"){
			$sql= "SELECT * FROM 
			usertable WHERE name LIKE '$q%'";
		}else{
			$sql= "SELECT * FROM 
			usertable WHERE userID LIKE '$q%'";
		}

		if($records = mysqli_query($con,$sql)){
			echo "<center>";
			echo "<table class ='showData' 	border = 1>";
			echo "<tr>";
			echo "<th>Link</th>";
			echo "<th>ID</th>";
			echo "<th>Name</th>";
			echo "<th>IC</th>";
			echo "<th>Contact</th>";
			echo "<th>Address</th>";
			echo "<th>Gender</th>";
			echo "<th>Registration Date</th>";
			echo "<th>Type</th>";
			echo "</tr>";

			while ($row = mysqli_fetch_array($records)) {
				echo "<tr>";

echo '<td><input type="submit" value="Next" name="next"></td>';


				echo "<td>".$row['userID']. "</td>";
				echo "<td>" .$row['Name']. "</td>";
				echo "<td>" .$row['IC']. "</td>";
				echo "<td>" .$row['Contact']. "</td>";
				echo "<td>" .$row['Addr']. "</td>";
				if($row['Sex'] == '0'){
					echo "<td>Female</td>";
				}elseif($row['Sex'] == '1'){
					echo "<td>Male</td>";
				}
				echo "<td>" .$row['regisDate']. "</td>";
				if($row['regisType'] == '0'){
					echo "<td>Admin</td>";
				}elseif ($row['regisType'] == '1') {
					echo "<td>Client</td>";
				}elseif ($row['regisType'] == '2') {
					echo "<td>Chef</td>";
				}elseif ($row['regisType'] == '3') {
					echo "<td>Driver</td>";
				}elseif ($row['regisType'] == '4') {
					echo "<td>Nurse</td>";
				}elseif ($row['regisType'] == '5') {
					echo "<td>Patient</td>";
				}
				/*echo "<td>";
				echo "<a href= 'edit.php?id={$row['userID']}'>Edit</a>";
				echo "/";
				echo "<a href= 'Delete.php?id={$row['userID']}'>Delete</a>";
				echo "</td>";*/
				echo "</tr>";
			}
			echo "</table>";
			echo "</center>";
		}
	}
?>