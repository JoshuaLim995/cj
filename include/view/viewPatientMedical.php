<html>
<head>
	<title id = "title">View Patient Medical</title>
</head>
<body>

	<?php
	session_start();
	if(isset($_GET["ID"])){
		$pID = $_GET["ID"];
		
		echo "<a href='viewPatient.php?ID=" . $pID . "'><img src='../../button/back.png' width='50' height='50'></a> ";




		$_SESSION['pID'] = $pID;

		$query = "SELECT ID, Date FROM medical WHERE Patient_ID = $pID ORDER BY Date DESC";


		echo "<center>";
		echo "<span><p class='big'>Patient Medical Record</p></span>";


		if($records = mysqli_query($con,$query)){

			echo "
			<button>
				<a href= '../print.php?Patient={$pID}'>Print All</a>
			</button>";


			while ($row = mysqli_fetch_array($records)) {

				echo "<table  class ='showMedicalDate' border = 1>";
				echo "<tr>";
				echo "<th>Date</th>";
				echo "<td>".$row['Date']. "</td>";
				echo "<td>";
				echo "<a href= 'viewMedicalDetail.php?ID={$row['ID']}'>View Detail</a>";
				echo "</td>";
				
				if($_SESSION['regisType'] == "A"){
					echo "<td>";
					echo "<a href= '../update/updatePatientMedical.php?ID={$row['ID']}'>Update</a>";
					echo "</td>";
					echo "<td>";
					echo "<a href= '../delete.php?ID={$row['ID']}&type=medical' onclick='return myFunction({$row['ID']})'>Delete</a>";
					echo "</td>";
				}

				echo "</tr>";

				echo "</table>";
				echo "<br/>";

			}
		}
		else{
			echo "No Record";
		}


	}

	echo "</center>";
	?>

	<script>
		function myFunction() {
			var id = arguments[0];
			var r = confirm("Delete Medical Record?");
			if (r == true) {
				return true;
			} else {
				return false;
			}
		}
	</script>

</body>
</html>