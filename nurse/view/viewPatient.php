
<html>
<head>
	<title id = "title">View Patient</title>
</head>
<body>


	
	<a href="../view.php?type=P"><img src='../../button/back.png' width="50" height="50"></a> 


<?php 

	include('../../connDB.php');
	include('../../CSS.php');
	include('../../include/view/viewPatient.php');

?>

</body>
</html>


<script>
	function myFunction() {
		var id = arguments[0];
		var r = confirm("Delete Patient? ID: " + id);
		if (r == true) {
			return true;
		} else {
			return false;
		}
	}
</script>