<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){
	include '../../CSS.php'; 
include ('getPatient.php'); 
include ('updatePatientPHP.php');  


?>

<!DOCTYPE html>
<html>
<body>
<title>Update Patient</title>

	<a href="../view.php?type=P"><img src='../../button/back.png' width="50" height="50"></a>

	<div class='create'>
		<form method="post" name="createForm" action="" enctype='multipart/form-data' onsubmit="return myFunction()">

			<fieldset>
				<legend><p class="big"><strong>Update Patient</strong></p></legend>

					<label for="name">Name:</label>
			<input id="name" name="Name" type="text" value="<?php echo $Name; ?>" maxlength="255" />
					<font color="red"><div id = "nameError"></div></font>
					<br/><br/>



				<label for="Deposit">Deposit:</label>
				<input id="deposit" name="Deposit" type="text" value="<?php echo $Deposit; ?>" maxlength="16" />
				<font color="red"><div id = "depositError"></div></font>
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

				<label for="Allergic">Allergic:</label>
				<input id="allergic" name="Allergic" type="text" value="<?php echo $Allergic; ?>" maxlength="255" />
				<br/><br/>

		<input id="male" type="radio" name="Gender" value="M" <?php echo ($Gender=="M" ? 'checked':''); ?>> Male<br>
					<input id="female" type="radio" name="Gender" value="F" <?php echo ($Gender=="F" ? 'checked':''); ?>> Female<br>


				<br/>
				<label for="BloodType">Blood Type:</label>
				<select id="bloodType" name="BloodType">
					<option value="-1" disabled selected>-------</option>
					<option value="O+" <?php echo ($BloodType=="O+" ? 'selected':''); ?> >O+</option>
					<option value="O-" <?php echo ($BloodType=="O-" ? 'selected':''); ?>>O-</option>
					<option value="A+" <?php echo ($BloodType=="A+" ? 'selected':''); ?>>A+</option>
					<option value="A-" <?php echo ($BloodType=="A-" ? 'selected':''); ?>>A-</option>
					<option value="B+" <?php echo ($BloodType=="B+" ? 'selected':''); ?>>B+</option>
					<option value="B-" <?php echo ($BloodType=="B-" ? 'selected':''); ?>>B-</option>
					<option value="AB+" <?php echo ($BloodType=="AB+" ? 'selected':''); ?>>AB+</option>
					<option value="AB-" <?php echo ($BloodType=="AB-" ? 'selected':''); ?>>AB-</option>	
				</select>
				<font color="red"><div id = "bloodTypeError"></div></font>
				<br/><br/>

				<label for="Diseases">Diseases:</label>
				<input type="checkbox" name="diseases[]" value="Diabetes">Diabetes
				<input type="checkbox" name="diseases[]" value="Heart Diseases">Heart Diseases
				<input type="checkbox" name="diseases[]" value="Dementia">Dementia
				<input type="checkbox" name="diseases[]" value="Lung disease">Lung disease
				<br/><br/>

				<label for="Food">Food Sensitive:</label>
				<input type="checkbox" name="food[]" value="Vegetarian">Vegetarian
				<input type="checkbox" name="food[]" value="Full Vegetarian">Full Vegetarian
				<input type="checkbox" name="food[]" value="No Pork">No Pork
				<input type="checkbox" name="food[]" value="No Cow">No Cow
				<input type="checkbox" name="food[]" value="No Seafood">No Seafood
				<input type="checkbox" name="food[]" value="Normal">Normal
				<br/><br/>

				<label for="Date">Date:</label>
	<input id="date" name="regisDate" type="date" value="<?php echo $regisDate; ?>" maxlength="16" />
	<font color="red"><div id = "dateError"></div></font>
	<br/><br/>

				<label for="Photo">Photo: <?php echo $Image ?></label>

				<input id="file" name='file' type='file' />
			</fieldset>

			<br>

			<input type="submit" value="Update" name="update" onclick="return myFunction()"> 

		</div>
		<script>
			function myFunction() {
				var i = 0;
				if (createForm.name.value =="")
				{
					document.getElementById("nameError").innerHTML = "Name cannot be empty";
					i++;
				}
				else
					document.getElementById("nameError").innerHTML = null;


				if (!createForm.deposit.value ==""){

					if (isNaN(createForm.deposit.value)){
						document.getElementById("depositError").innerHTML = "Not a number";

						i++;
					}else
					document.getElementById("depositError").innerHTML = null;
				}else{
					document.getElementById("depositError").innerHTML = "deposit cannot be empty";
					i++;
				}


				if (createForm.ic.value =="")
				{
					document.getElementById("icError").innerHTML = "IC must be fill";
					i++;
				}
				else
					document.getElementById("icError").innerHTML = null;

				if (createForm.contact.value =="")
				{
					document.getElementById("contactError").innerHTML = "Contact must be fill";
					i++;
				}
				else
					document.getElementById("contactError").innerHTML = null;

				if (!createForm.age.value ==""){
					if (isNaN(createForm.age.value)){
						document.getElementById("ageError").innerHTML = "Not a number";
						i++;
					}
					else{
						document.getElementById("ageError").innerHTML = null;
					}
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

				if(createForm.bloodType.value == "-1"){
					document.getElementById("bloodTypeError").innerHTML = "Please select a blood type";

					i++;
				}else{
					document.getElementById("bloodTypeError").innerHTML = null;
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