<?php 
//include ('../adminHeader.php');
include ('../../CSS.php');
include('../../connDB.php');
?>

<html>
<head>
	<title id = "title">View Patient</title>
</head>
<body>


	
	<a href="../view.php?type=P"><img src='../../button/back.png' width="50" height="50"></a> 


	<?php
	if(isset($_GET["ID"])){
		$ID = $_GET["ID"];

		$query = "SELECT Name, IC, Contact, BirthYear, Address, Gender, RegisDate, BloodType, Meals, Allergic, Sickness, Deposit, Image FROM patients WHERE ID = $ID";




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
			echo "<td>".$ID. "</td>";
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

			echo "<td><a href='viewPatientMedical.php?ID={$ID}'>View Medical</a></td> ";
			echo "<td><a href='../create/createPatientMedical.php?ID={$ID}'>Add Medical Record</a></td> ";
			echo "</tr>";



			echo "</table>";
			echo "<br/>";


			$client = "SELECT ID, Name, Contact FROM clients WHERE Patient_ID = $ID";
			if($c_records = mysqli_query($con,$client)){
				echo "<span><p class='big'>Client</p></span>";

				while ($c_row = mysqli_fetch_array($c_records)) {


					echo "<table border = 1>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<td>".$c_row['ID']. "</td>";
					echo "</tr>";


					echo "<tr>";
					echo "<th>Name</th>";

					echo "<td>";



					echo "<a href='viewClient.php?ID={$c_row['ID']}'>" . $c_row['Name']. "</a>";

					echo "</td>";
					echo "</tr>";

					echo "<tr>";
					echo "<th>Contact</th>";
					echo "<td>" .$c_row['Contact']. "</td>";
					echo "</tr>";

					echo "</table>";

				}


			}
		}
		else{
			echo "No Record";
		}


	}

	echo "</center>";
	?>
</body>
</html>