<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "C"){


	include ('../CSS.php');
	include ('clientHeader.php'); 

	$Patient_ID = $_SESSION['Patient_ID'];
	?>	
	<!DOCTYPE html>
	<html>
	<title>Home</title>

	<body>

		<?php include 'viewPatient.php'; ?>
	</body>

	</html>

	
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