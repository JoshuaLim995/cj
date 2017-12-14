<?php include ('regisUser.php'); 
include ('sendPatientData.php');  ?>

<!DOCTYPE html>
<html>
<body>


	<div class='create'>
		<form method="post" name="createForm" action="" enctype='multipart/form-data' onsubmit="return myFunction()">

			<fieldset>
				<legend><strong>Create Patient</strong></legend>
				<label for="name">Name:</label>
				<input id="name" name="Name" type="text" value="" maxlength="255" />
				<font color="red"><div id = "nameError"></div></font>
				<br/><br/>



				<label for="Deposit">Deposit:</label>
				<input id="deposit" name="Deposit" type="text" value="" maxlength="16" />
				<font color="red"><div id = "depositError"></div></font>
				<br/><br/>

				<label for="IC">IC:</label>
				<input id="ic" name="IC" type="text" value="" maxlength="16" />
				<font color="red"><div id = "icError"></div></font>
				<br/><br/>

				<label for="Contact">Contact:</label>
				<input id="contact" name="Contact" type="text" value="" maxlength="16" />
				<font color="red"><div id = "contactError"></div></font>
				<br/><br/>

				<label for="Age">Age:</label>
				<input id="age" name="Age" type="text" value="" maxlength="3" />
				<font color="red"><div id = "ageError"></div></font>
				<br/><br/>

				<label for="Address">Address:</label>
				<input id="address" name="Address" type="text" value="" maxlength="255" />
				<font color="red"><div id = "contactError"></div></font>
				<br/><br/>

				<label for="Allergic">Allergic:</label>
				<input id="allergic" name="Allergic" type="text" value="" maxlength="255" />
				<br/><br/>

				<label for="Gender">Gender:</label>
				<select id="gender" name="Gender">
					<option value="-1">------</option>
					<option value="0">Female</option>
					<option value="1">Male</option>
				</select>
				<font color="red"><div id = "genderError"></div></font>
				<br/><br/>

				<label for="BloodType">Blood Type:</label>
				<select id="gender" name="BloodType">
					<option value="-1">------</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>			
				</select>
				<font color="red"><div id = "genderError"></div></font>
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
				<input id="date" name="regisDate" type="date" value="" maxlength="16" />
				<font color="red"><div id = "dateError"></div></font>
				<br/><br/>

				<label for="Photo">Photo:</label>

				<input id="file" name='file' type='file'/>
			</fieldset>

			<br>






		<!-- 		<button type="button" name="next" onclick="return myFunction()">Submit</button> -->
		<input type="submit" value="Next" name="next" onclick="return myFunction()"> 


			<script>
				function myFunction() {

					if (createForm.name.value =="")
					{
						document.getElementById("nameError").innerHTML = "Name cannot be empty";
						return false;
					}
					else
						document.getElementById("nameError").innerHTML = null;

if (createForm.deposit.value =="")
					{
						document.getElementById("depositError").innerHTML = "deposit cannot be empty";
						return false;
					}
					else
						document.getElementById("depositError").innerHTML = null;


if (createForm.ic.value =="")
					{
						document.getElementById("icError").innerHTML = "IC must be fill";
						return false;
					}
					else
						document.getElementById("icError").innerHTML = null;

if (createForm.contact.value =="")
					{
						document.getElementById("contactError").innerHTML = "Contact must be fill";
						return false;
					}
					else
						document.getElementById("contactError").innerHTML = null;



					
				}
			</script>

		</body>
		</html> 
