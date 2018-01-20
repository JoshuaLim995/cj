
<html>
<head>
	<title id = "title">View Medical Detail</title>
</head>
<body>



	<a href="javascript:history.go(-1)"><img src='../../button/back.png' width="50" height="50"></a> 




	<?php

	if(isset($_GET["ID"])){
		$ID = $_GET["ID"];

		$query = "SELECT m.ID, Date, u.Name AS Nurse_Name, p.ID AS P_ID, p.Name AS Patient_Name, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description, Other FROM medical m, users u, patients p WHERE m.ID = $ID AND m.Nurse_ID = u.ID AND m.Patient_ID = p.ID";


		if($records = mysqli_query($con,$query)){

			$row = mysqli_fetch_array($records);

			$pID = $row['P_ID'];

			$p_query = "SELECT BirthYear, Gender, BloodType, Meals, Allergic, Sickness FROM patients WHERE ID = $pID";
			$p_records = mysqli_query($con,$p_query);
			$p_row = mysqli_fetch_array($p_records);



			echo "<center>";
			echo "<span><p class='big'> Medical Record</p></span>";

// echo "<div>";
// echo "<p>Date: ".$row['Date']."</p>";
// echo "<p>Patient Name: ".$row['Patient_Name']."</p>";
// $Age = date("Y") - $p_row['BirthYear'];
// echo "<p>Age: ".$Age."</p>";
// echo "<p>Gender: ";
// 			switch ($p_row['Gender']) {
// 				case 'F':
// 				echo "Female";
// 				break;
// 				case 'M':
// 				echo "Male";
// 				break;
// 				default:
// 				echo "Other";
// 				break;
// 			}
// echo "</p>";
// echo "<p>Date: ".$row['Date']."</p>";

// echo "</div>";


			echo "<table class='medical' border = 1>";

			echo "<tr>";
			echo "<th>Date</th>";
			echo "<td>".$row['Date']. "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<th>Patient Name</th>";
			echo "<td>".$row['Patient_Name']. "</td>";
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
			echo "<th>Blood Pressure</th>";
			echo "<td>".$row['Blood_Pressure']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Heart Rate</th>";
			echo "<td>".$row['Heart_Rate']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Sugar Level</th>";
			echo "<td>".$row['Sugar_Level']. "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<th>Temperature</th>";
			echo "<td>".$row['Temperature']. "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<th>Description</th>";
			echo "<td>".$row['Description']. "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<th>Other</th>";
			echo "<td>".$row['Other']. "</td>";
			echo "</tr>";

			echo "</table>";
			echo "<br/>";



			echo "<button onclick='myFunction()'>Print</button>";
			echo "<br>";
			echo "Monitored by ".$row['Nurse_Name'];


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
