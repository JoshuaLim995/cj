<?php

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
	include('../connDB.php');


	$sql = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, RegisType FROM users ORDER BY ID";



	if($records = mysqli_query($con,$sql)){

		echo "<center>";
		echo "<span><p class='big'>Users</p></span>";
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
		echo "<th>Type</th>";
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


			switch ($row['RegisType']) {
				case 'A':
				echo "Admin";
				break;
				case 'N':
				echo "Nurse";
				break;
				case 'D':
				echo "Driver";
				break;
				case 'Z':
				echo "Chef";
				break;

				default:
		# code...
				break;
			}
			echo "</td>";

			echo "<td>";
			echo "<a href= 'view/viewUser.php?ID={$row['ID']}'>View</a>";
	//			echo "/";
	//			echo "<a href= 'Delete.php?id={$row['ID']}'>Delete</a>";
			echo "</td>";


			echo "<td>";
			echo "<a href= 'update/update_user.php?ID={$row['ID']}'>Update</a>";
			echo "</td>";

				/*echo "<td>";
				echo "<a href= 'edit.php?id={$row['userID']}'>Edit</a>";
				echo "/";
				echo "<a href= 'Delete.php?id={$row['userID']}'>Delete</a>";
				echo "</td>";*/

			//		xmlhttp.open("GET","getRecord.php?q="+str+"&type="+type.value,true);

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
				var r = confirm("Delete User? ID: " + id);
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