<?php

	$q = intval($_GET['q']);

	if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
	}

	if($q == 0){
		include('regisAdmin.php');
	}
?>