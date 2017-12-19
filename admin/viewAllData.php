<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
	

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