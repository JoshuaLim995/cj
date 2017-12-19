<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){

	include('../connDB.php');

	if (isset($_POST['next'])) {

		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Age = $_POST['Age'];
		$Birthyear = date("Y") - $Age;
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];



		$Password = md5($IC);

		$sqlUser = "INSERT INTO users (Name, IC, Gender, Birthyear,Contact, Address, regisDate, regisType, Password) 
		VALUES ('$Name', '$IC', '$Gender', $Birthyear, '$Contact', '$Address', '$regisDate', '$regisType', '$Password')";

		$result = mysqli_query($con,$sqlUser);


		var_dump($result);
		if ($result) {
			echo "User Added";
		}else{
			echo 'failed to add user';
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