<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){

	include '../../CSS.php'; 
	include 'getClient.php'; 
	include 'updateClientPHP.php';


	

	?>
	<!DOCTYPE html>
	<html>
	<title>Update Client</title>
	<body>

		<a href="../view.php?type=C"><img src='../../button/back.png' width="50" height="50"></a>

		<div class='create'>
			<form method="post" name="createForm" action="" enctype='multipart/form-data' onsubmit="return myFunction()">
				<fieldset>
					<legend><p class="big"><strong>Update Client</strong></p></legend>
					<label for="name">Name:</label>
					<input id="name" name="Name" type="text" value="<?php echo $Name; ?>" maxlength="255" />
					<font color="red"><div id = "nameError"></div></font>
					<br/><br/>


					<label for="IC">IC:</label>
					<input id="ic" name="IC" type="text" value="<?php echo $IC; ?>" maxlength="16" />
					<font color="red"><div id = "icError"></div></font>
					<br/><br/>

					<label for="Contact">Contact:</label>
					<input id="contact" name="Contact" type="text" value="<?php echo $Contact; ?>" maxlength="16" />
					<font color="red"><div id = "contactError"></div></font>
					<br/><br/>

					<label for="Age">Age:</label>
					<input id="age" name="Age" type="text" value="<?php echo $Age; ?>" maxlength="3" />
					<font color="red"><div id = "ageError"></div></font>
					<br/><br/>

					<label for="Address">Address:</label>
					<input id="address" name="Address" type="text" value="<?php echo $Address; ?>" maxlength="255" />
					<font color="red"><div id = "addressError"></div></font>
					<br/><br/>

					<!-- Gender -->
					<input id="male" type="radio" name="Gender" value="M" <?php echo ($Gender=="M" ? 'checked':''); ?>> Male<br>
					<input id="female" type="radio" name="Gender" value="F" <?php echo ($Gender=="F" ? 'checked':''); ?>> Female<br>

					<br/>

					<label for="Date">Date:</label>
					<input id="date" name="regisDate" type="date" value="<?php echo $regisDate; ?>" maxlength="16" />
					<font color="red"><div id = "dateError"></div></font>
					<br/><br/>




					<label>Patient:</label>
					<select id="patient" name="patient">
						<option value ="<?php echo $Patient_ID; ?>"><?php echo $P_Name; ?></option>
						<?php while($row = mysqli_fetch_array($resultPatient)):;?>
							<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
						<?php endwhile;?>
					</select>
					<font color="red"><div id="patientError"></div></font>
					<br>



					<label for="Relationship">Relationship:</label>
					<input id="relationship" name="Relationship" type="text" value="<?php echo $Relationship; ?>" maxlength="16" />
					<font color="red"><div id = "relationshipError"></div></font>
					<br/><br/>

				</fieldset>

				<br>
				<center><input type="submit" value="Update" name="update" onclick="return myFunction()"></center>
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

				if(createForm.relationship.value == ""){
					document.getElementById("relationshipError").innerHTML = "Relationship must be filled";

					i++;
				}else{
					document.getElementById("relationshipError").innerHTML = null;
				}

				if(createForm.patient.value == "-1"){
					document.getElementById("patientError").innerHTML = "Please Select Patient";

					i++;
				}else{
					document.getElementById("patientError").innerHTML = null;
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

	echo "<a href= '../../login.php'>";
	echo "Please Login to open this page.";
	echo "</a>";
	exit();
}
?>