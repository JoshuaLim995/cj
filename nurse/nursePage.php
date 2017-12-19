<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){

	include ('../CSS.php');
	include ('header.php');

	?>

<!DOCTYPE html>
	<html>
	<title>Home</title>

	<body>

		
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