<?php
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){
	include ('../CSS.php') 

	?>
	<div class="logout">
		<button>
			<a href='logout.php'> Logout </a>
		</button>
	</div>
	<div class="adminHeader">
		<span><a href='nursePage.php'><strong>Home</strong></a></span>
		<span><strong>|</strong></span>
		<span><a href='create.php'><strong>Create</strong></a></span>
		<span><strong>|</strong></span>
		<span><a href='view.php'><strong>View</strong></a></span>
		<span><strong>|</strong></span>
		<span><a href='assignDriver.php'><strong>Assign Driver</strong></a></span>
		<span><strong>|</strong></span>
		<span><a href='searchPatient.php'><strong>Search</strong></a></span>
	</div>


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