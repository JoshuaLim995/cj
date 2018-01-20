<?php 

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

			<fieldset class="fieldset-auto-width">
				<legend><p class="big"><strong>Update Patient</strong></p></legend>

				<table>
					<tr>
						<td><label for="name">Name:</label></td>
						<td><input id="name" name="Name" type="text" value="<?php echo $Name; ?>" maxlength="255" /></td>
						<td><label for="Deposit">Deposit:</label></td>
						<td><input id="deposit" name="Deposit" type="text" value="<?php echo $Deposit; ?>" maxlength="16" /></td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id = "nameError"></div></font></td>
						<td colspan="2"><font color="red"><div id = "depositError"></div></font></td>
					</tr>
					<tr>
						<td><label for="IC">IC:</label></td>
						<td><input id="ic" name="IC" type="text" value="<?php echo $IC; ?>" maxlength="16" /></td>
						<td><label for="Contact">Contact:</label></td>
						<td><input id="contact" name="Contact" type="text" value="<?php echo $Contact; ?>" maxlength="16" /></td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id = "icError"></div></font></td>
						<td colspan="2"><font color="red"><div id = "contactError"></div></font></td>
					</tr>
					<tr>
						<td><label for="Age">Age:</label></td>
						<td><input id="age" name="Age" type="text" value="<?php echo $Age; ?>" maxlength="3" /></td>
						<td><label for="Address">Address:</label></td>
						<td><input id="address" name="Address" type="text" value="<?php echo $Address; ?>" maxlength="255" /></td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id = "ageError"></div></font></td>
						<td colspan="2"><font color="red"><div id = "addressError"></div></font></td>
					</tr>
					<tr>
						<td><label for="Allergic">Allergic:</label></td>
						<td><input id="allergic" name="Allergic" type="text" value="<?php echo $Allergic; ?>" maxlength="255" /></td>
					</tr>
					<tr>
						<td><label for="Gender">Gender:</label></td>
						<td>
							<input id="male" type="radio" name="Gender" value="M" <?php echo ($Gender=="M" ? 'checked':''); ?>> Male
							<input id="female" type="radio" name="Gender" value="F" <?php echo ($Gender=="F" ? 'checked':''); ?>> Female

						</td> 
					</tr>
					<tr>
						<td><label class="inLine" for="BloodType">Blood Type:</label></td>
						<td>
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
						</td>
					</tr>
					<tr>
						<td class="inLine"><font color="red"><div id = "bloodTypeError"></div></font></td>
					</tr>
					<tr>
						<td><label for="Diseases">Sickness:</label></td>
						<td colspan="3" class="inLine">
							<input type="checkbox" name="diseases[]" value="Diabetes" <?php if(in_array('Diabetes', $s_array)){
								echo "checked";
							} ?>>Diabetes
							<input type="checkbox" name="diseases[]" value="Heart Diseases" <?php if(in_array('Heart Diseases', $s_array)){
								echo "checked";
							} ?>>Heart Diseases
							<input type="checkbox" name="diseases[]" value="Dementia" <?php if(in_array('Dementia', $s_array)){
								echo "checked";
							} ?>>Dementia
							<input type="checkbox" name="diseases[]" value="Lung disease" <?php if(in_array('Lung disease', $s_array)){
								echo "checked";
							} ?>>Lung disease
						</td>
					</tr>
					<tr>
						<td>Other Sickness:</td>
						<td colspan="3" class="inLine"><textarea rows="2" cols="50" name="Other_Disease" placeholder="Other Sickness..."><?php foreach ($s_array as $sick) {
								switch ($sick) {
									case 'Diabetes':
									case 'Heart Diseases':
									case 'Dementia':
									case 'Lung disease':
        							# code...
									break;

									default:
									echo $sick;
									break;
								}
							} ?></textarea></td>
						</tr>
						<tr>
							<td><label class="inLine" for="Food">Food Sensitive:</label></td>
							<td colspan="3" class="inLine">
								<input type="checkbox" name="food[]" value="Vegetarian" <?php if(in_array('Vegetarian', $m_array)){
								echo "checked";
							} ?> >Vegetarian
								<input type="checkbox" name="food[]" value="Full Vegetarian" <?php if(in_array('Full Vegetarian', $m_array)){
								echo "checked";
							} ?> >Full Vegetarian
								<input type="checkbox" name="food[]" value="No Pork" <?php if(in_array('No Pork', $m_array)){
								echo "checked";
							} ?> >No Pork
								<input type="checkbox" name="food[]" value="No Cow" <?php if(in_array('No Cow', $m_array)){
								echo "checked";
							} ?> >No Cow
								<input type="checkbox" name="food[]" value="No Seafood" <?php if(in_array('No Seafood', $m_array)){
								echo "checked";
							} ?> >No Seafood
								<input type="checkbox" name="food[]" value="Normal" <?php if(in_array('Normal', $m_array)){
								echo "checked";
							} ?> >Normal
							</td>
						</tr>
						<tr>
							<td>Other:</td>
							<td colspan="3" class="inLine"><textarea rows="2" cols="50" name="Other_Food" placeholder="Other Meals..."><?php foreach ($m_array as $food) {
								switch ($food) {
									case 'Vegetarian':
									case 'Full Vegetarian':
									case 'No Pork':
									case 'No Cow':
									case 'No Seafood':
									case 'Normal':
        							# code...
									break;

									default:
									echo $food;
									break;
								}
							} ?></textarea></td>
						</tr>
						<tr>
							<td><label for="Date">Date:</label></td>
							<td colspan="3"><input id="date" name="regisDate" type="date" value="<?php echo $regisDate; ?>" maxlength="16" /></td>
						</tr>
						<tr>
							<td><font color="red"><div id = "dateError"></div></font></td>
						</tr>
						<tr>
							<td><label for="Photo">Photo:</label></td>
							<td><input id="file" name='file' type='file'/></td>
						</tr>
						<tr>
							<td><label for="Addition">Additional Information:</label></td>
							<td><textarea rows="4" cols="50" name="Additional"><?php echo $Additional_Info; ?></textarea></td>
						</tr>
					</table>	



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

