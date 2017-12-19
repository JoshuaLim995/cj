<?php
session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){

	include ('../CSS.php');
	include ('header.php');
	include('../connDB.php');?>

	<!DOCTYPE html>
	<html>
	<title>Home</title>

	<body>

		<form name="searchUser" method="post" border='1'>
			<div class="createUser">
				<span><p class="big">Search</p></span>
				<span><input id="search" name="search" type="text" value="" maxlength="255" onkeyup="showRecord(this.value)" /></span>
				<span>
					<select id="type" name="type">
						<option value="0">Name</option>
						<option value="1">ID</option>
					</select>
				</span>
			</div>
			<div id="record">
				
			</div>
		</form>

		<script type="text/javascript">
			function showRecord(str){
				if(str.length == 0){
					document.getElementById("record").innerHTML = "";
				}else{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function(){
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("record").innerHTML = this.responseText;
						}
					}
					xmlhttp.open("GET","getRecord.php?q="+str+"&type="+type.value,true);
					xmlhttp.send();
				}
			}
		</script>

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