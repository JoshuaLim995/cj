<?php 
if(isset($_SESSION['userID'])){
	include 'regisUserPHP.php'; 
	?>
	<!DOCTYPE html>
	<html>
	<body>

		<div class='create'>
			<form method="post" name="createForm" action="" enctype='multipart/form-data' onsubmit="return myFunction()">
				<fieldset class="fieldset-auto-width">
					<legend><p class="big"><strong>Create 

						<?php 
						switch ($regisType) {

							case 'A':
							echo 'Admin';
							break;
							case 'D':
							echo 'Driver';
							break;
							case 'N':
							echo 'Nurse';
							break;
							case 'Z':
							echo 'Chef';
							break;
						}
						?>
					</strong></p></legend>

					<table>
					<tr>
						<td><label for="name">Name:</label></td>
						<td><input id="name" name="Name" type="text" value="" maxlength="255" /></td>
						<td><label for="IC">IC:</label></td>
						<td><input id="ic" name="IC" type="text" value="" maxlength="16" /></td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id = "nameError"></div></font></td>
						<td colspan="2"><font color="red"><div id = "icError"></div></font></td>
					</tr>
					<tr>
						<td><label for="Contact">Contact:</label></td>
						<td><input id="contact" name="Contact" type="text" value="" maxlength="16" /></td>
						<td><label for="Age">Age:</label></td>
						<td><input id="age" name="Age" type="text" value="" maxlength="3" /></td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id = "contactError"></div></font></td>
						<td colspan="2"><font color="red"><div id = "ageError"></div></font></td>
					</tr>
					<tr>
						<td><label for="Address">Address:</label></td>
						<td><input id="address" name="Address" type="text" value="" maxlength="255" /></td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id = "addressError"></div></font></td>
					</tr>
					<tr>
						<td><label for="Gender">Gender:</label></td></td>
						<td class="inLine">
							<input type="radio" name="Gender" value="M" checked> Male
							<input type="radio" name="Gender" value="F"> Female
						</td>
					</tr>
					<tr>
						<td><label for="Date">Date:</label></td>
						<td><input id="date" name="regisDate" type="date" value="" maxlength="16" /></td>
					</tr>
					<tr>
						<td><font color="red"><div id = "dateError"></div></font></td>
					</tr>
					</table>
				</fieldset>

				<br>
				<center><input type="submit" value="Save" name="next" onclick="return myFunction()"></center>
			</form>
		</div>



		<script>
			function myFunction() {
				var i = 0;
				if (createForm.name.value ==""){
					document.getElementById("nameError").innerHTML = "Name cannot be empty";

					i++;
				}else
				document.getElementById("nameError").innerHTML = null;



				if (createForm.ic.value ==""){
					document.getElementById("icError").innerHTML = "IC must be fill";

					i++;
				}else
				document.getElementById("icError").innerHTML = null;

				if (createForm.contact.value ==""){
					document.getElementById("contactError").innerHTML = "Contact must be fill";

					i++;
				}else
				document.getElementById("contactError").innerHTML = null;

				if (!createForm.age.value ==""){
					if (isNaN(createForm.age.value)){
						document.getElementById("ageError").innerHTML = "Not a number";

						i++;
					}else
					document.getElementById("ageError").innerHTML = null;

				}else{
					document.getElementById("ageError").innerHTML = "Age must be fill";

					i++;
				}

				if(createForm.address.value == ""){
					document.getElementById("addressError").innerHTML = "Address must be filled";

					i++;
				}else{
					document.getElementById("addressError").innerHTML = null;
				}





				return (i == 0);
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