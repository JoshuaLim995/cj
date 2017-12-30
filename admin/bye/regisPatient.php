<?php include ('regisUser.php') ?>

<?php
	include('../connDB.php');

		if(isset($_POST['next'])){
			$name = $_POST['name'];
			$deposit = $_POST['deposit'];
			if(isset($_POST['diseases'])){
				$diseases = implode(",",$_POST['diseases']);
			}
			if(isset($_POST['food'])){
				$foodSensitive = implode(",",$_POST['food']);
			}
			$ic = $_POST['ic'];
			$contact = $_POST['contact'];
			$age = $_POST['age'];
			$addr = $_POST['addr'];
			$sex = $_POST['sex'];
			$date = $_POST['date'];
			$allergic = $_POST['allergic'];
			$pass = $_POST['ic'];
			$regisType = '5';
			$target_dir = "../image/";
			$target = $target_dir.basename($_FILES['fileToUpload']['name']);
			$image = $_FILES['fileToUpload']['name'];
			$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");

			if($name == null || $ic == null || $contact == null || $addr == null || $sex == null || $date == null){
				echo '<script type="text/javascript">';
				echo "myFunction()";
				echo "</script>";
			}else{
				if( in_array($imageFileType,$extensions_arr) ){

					$sqlPatient = "INSERT INTO patienttable(image, Name, IC, Contact, Age, Addr, Allergic, Sex, diseases, foodSensitive,  regisDate, regisType, deposit) 
					VALUES ('$image', '$name', '$ic', '$contact', '$age', '$addr', '$allergic', '$sex', '$diseases', '$foodSensitive', '$date', '$regisType', '$deposit')";

					$resultPatient = mysqli_query($con,$sqlPatient);

					move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir.$image);
					var_dump($resultPatient);
					if ($resultPatient) {
						echo "Patient Added";

						$patientID = mysqli_insert_id($con);

						$sqlUser = "INSERT INTO usertable(userID, userPass, Name, IC, Contact, Age, Addr, Sex, regisDate, regisType) 
						VALUES ('$patientID','$pass','$name', '$ic', '$contact', '$age', '$addr', '$sex', '$date', '5')";
						$resultUser = mysqli_query($con,$sqlUser); 
						var_dump($resultUser);
					}else{
						echo "Fail to add Patient";
					}	
				}
			}
		}
?>
<div class='create'>
	<form  name='createForm' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-date">
		<fieldset>
		<legend><strong>Create Patient</strong></legend>
		<label for="name">Name:</label>
		<input id="name" name="name" type="text" value="" maxlength="255" />
		<font color="red"><div id = "nameError"></div></font>
		<br/><br/>

		<label for="deposit">deposit:</label>
		<input id="deposit" name="deposit" type="text" value="" maxlength="16" />
		<font color="red"><div id = "depositError"></div></font>
		<br/><br/>

		<label for="IC">IC:</label>
		<input id="ic" name="ic" type="text" value="" maxlength="16" />
		<font color="red"><div id = "icError"></div></font>
		<br/><br/>

		<label for="Contact">Contact:</label>
		<input id="contact" name="contact" type="text" value="" maxlength="16" />
		<font color="red"><div id = "contactError"></div></font>
		<br/><br/>

		<label for="Age">Age:</label>
		<input id="age" name="age" type="text" value="" maxlength="3" />
		<font color="red"><div id = "ageError"></div></font>
		<br/><br/>

		<label for="Address">Address:</label>
		<input id="addr" name="addr" type="text" value="" maxlength="255" />
		<font color="red"><div id = "contactError"></div></font>
		<br/><br/>

		<label for="Allergic">Allergic:</label>
		<input id="allergic" name="allergic" type="text" value="" maxlength="255" />
		<br/><br/>

		<label for="Sex">Gender:</label>
		<select id="sex" name="sex">
			<option value="-1">------</option>
			<option value="0">Female</option>
			<option value="1">Male</option>
		</select>
		<font color="red"><div id = "sexError"></div></font>
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
		<input id="date" name="date" type="date" value="" maxlength="16" />
		<font color="red"><div id = "dateError"></div></font>
		<br/><br/>

		<label for="Photo">Photo:</label>
		<input id="file" name="fileToUpload" type="file"/>
		<!-- <p class="right"><a href="http://localhost/goldenAge/admin/regisClient">Create Relative(Client)</a></p> -->
		</fieldset>

		<br>
		<center><input type="submit" value="Next" name="next" onclick="return myFunction()"> </center>
	</form>
</div>

<script type="text/javascript">
	function myFunction()
	{
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
		if (createForm.contact.value =="-1")
		{
			document.getElementById("contactError").innerHTML = "Contact must be fill";
			return false;
		}
		else
			document.getElementById("contactError").innerHTML = null;
		if (createForm.sex.value =="")
		{
			document.getElementById("ageError").innerHTML = "Please enter age";
			return false;
		}
		else
			document.getElementById("ageError").innerHTML = null;
		if (createForm.sex.value =="-1")
		{
			document.getElementById("sexError").innerHTML = "Please select gender";
			return false;
		}
		else
			document.getElementById("sexError").innerHTML = null;
		if (createForm.Date.value =="")
		{
			document.getElementById("dateError").innerHTML = "Please enter date";
			return false;
		}
		else
			document.getElementById("dateError").innerHTML = null;
	}
</script>