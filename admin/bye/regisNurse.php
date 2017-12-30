<?php include ('regisUser.php') ?>

<?php
	include('../connDB.php');

	if(isset($_POST['create'])){
		$name = $_POST['name'];
		$ic = $_POST['ic'];
		$contact = $_POST['contact'];
		$age = $_POST['age'];
		$addr = $_POST['addr'];
		$sex = $_POST['sex'];
		$date = $_POST['date'];
		$regisType = '4';
		$password = $_POST['ic'];

		if($name == null || $ic == null || $contact == null || $addr == null || $sex == null || $date == null){
			echo '<script type="text/javascript">';
			echo "myFunction()";
			echo "</script>";
		}else{
			$sql = "INSERT INTO membertable(Name, IC, Contact, Age, Addr, Sex, regisDate, regisType, password) VALUES ('$name', '$ic', '$contact', '$age', '$addr', '$sex', '$date', '$regisType','$password')";
			$result = mysqli_query($con,$sql); 
			var_dump($result);
			if ($result) {
				echo "Nurse Added";
			}else{
				echo "Fail to add Nurse";
			}

			$nurseID = mysqli_insert_id($con);

			$sqlUser = "INSERT INTO usertable(userID, userPass, Name, IC, Contact, Age, Addr, Sex, regisDate, regisType) 
			VALUES ('$nurseID','$password','$name', '$ic', '$contact', '$age', '$addr', '$sex', '$date', '4');";
			$resultUser = mysqli_query($con,$sqlUser); 
			var_dump($resultUser);
			if($resultUser){
				echo "User table added";
			}else{
				echo "something wrong";
			}
		}
	}
?>
<div class='create'>
	<form  name='createForm' method="POST">
		<fieldset>
		<legend><strong>Create Nurse</strong></legend>
		<label for="name">Name:</label>
		<input id="name" name="name" type="text" value="" maxlength="255" />
		<font color="red"><div id = "nameError"></div></font>
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

		<label for="Sex">Gender:</label>
		<select id="sex" name="sex">
			<option value="-1">------</option>
			<option value="0">Female</option>
			<option value="1">Male</option>
		</select>
		<font color="red"><div id = "sexError"></div></font>
		<br/><br/>

		<label for="Date">Date:</label>
		<input id="date" name="date" type="date" value="" maxlength="16" />
		<font color="red"><div id = "dateError"></div></font>
		<br/><br/>
		</fieldset>

		<br>
		<center><input type="submit" value="Create" name="create" onclick="return myFunction()"> </center>
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