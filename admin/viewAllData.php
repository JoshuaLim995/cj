<?php 




$query = "SELECT id, Name, IC, Contact, regisType FROM users 
UNION 
SELECT id, Name, IC, Contact, regisType FROM clients
UNION 
SELECT id, Name, IC, Contact, regisType FROM patients
ORDER BY FIELD(regisType, 'A', 'N', 'D', 'Z', 'C', 'P'), id";

if($result = mysqli_query($con,$query)){
	echo "<center>";
	echo "<p class = big><strong>All User Data</strong></p>";
	echo "<table class ='showData' 	border = 1>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Name</th>";
	echo "<th>IC</th>";
	echo "<th>Contact</th>";
	echo "<th>Type</th>";
	echo "</tr>";

	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['id']. "</td>";
		echo "<td>" .$row['Name']. "</td>";
		echo "<td>" .$row['IC']. "</td>";
		echo "<td>" .$row['Contact']. "</td>";

		echo "<td>";
		switch ($row['regisType']) {
			case 'A':
			echo "Admin";
			break;
			case 'C':
			echo "Client";
			break;
			case 'Z':
			echo "Chef";
			break;
			case 'D':
			echo "Driver";
			break;
			case 'N':
			echo "Nurse";
			break;
			case 'P':
			echo "Patient";
			break;	
			default:
			echo "Invalid";
			break;
		}
		echo "</td>";

		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
}else{
	echo "No record found";
}



?>