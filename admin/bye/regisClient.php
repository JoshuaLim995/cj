<?php 
	include('../connDB.php');
	include('adminHeader.php');

	if (isset($_POST['create'])) {
		$name = $_POST['name'];
		$ic = $_POST['ic'];
		$contact = $_POST['contact'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$addr = $_POST['addr'];
		$relation = $_POST['relation'];
		$date = $_POST['date'];
		$photo = $_POST['file'];

		if ($name == null || $ic == null || $contact == null || $sex == null || $addr == null || $relation == null || $date == null) {
			echo '<script type="text/javascript">';
			echo "myFunction()";
			echo "</script>";
		}else{
			$sqlClient = "INSERT INTO clienttable(Photo,Name,IC,Contact,Age,Addr,Sex, regisDate, regisType, relation, password) VALUES($photo ,$name, $ic, $contact, $age, $addr,  $sex, $date, 1, $relation, $ic);";

			$userID = "SELECT ID FROM clienttable WHERE Name = '.$name.';";

			$sqlUser = "INSERT INTO usertable(userPass,Name,IC,Contact,Age,Addr, Sex, regisDate, regisType) VALUES($ic, $name, $ic, $contact, $age,  $addr, $sex, $date, 1);";

			$resultClient = mysqli_query($con, $sqlClient);
			var_dump($resultClient);

			$resultUser = mysqli_query($con, $sqlUser);
			var_dump($resultUser);

			if($resultClient AND $resultUser){
				echo "<script type='text/javascript'>alert('Client created');</script>";
			}else{
				echo "<script type='text/javascript'>alert('Error. Please try again');</script>";
			}
		}
	}
?>

<div class='create'>
	<form method="post">
		<fieldset>
		<legend><p class="big"><strong>Create Client</strong></p></legend>
		<label for="name">Name:</label>
		<input id="name" name="name" type="text" value="" maxlength="255" />
		<br/><br/>

		<label for="IC">IC:</label>
		<input id="ic" name="ic" type="text" value="" maxlength="16" />
		<br/><br/>

		<label for="Contact">Contact:</label>
		<input id="contact" name="contact" type="text" value="" maxlength="16" />
		<br/><br/>

		<label>Age:</label>
		<input id="age" name="age" type="text" value="" maxlength="16" />
		<br/><br/>

		<label for="Address">Address:</label>
		<input id="addr" name="addr" type="text" value="" maxlength="255" />
		<br/><br/>

		<label for="Sex">Gender:</label>
		<select id="sex" name="sex">
			<option value="-1">------</option>
			<option value="0">Female</option>
			<option value="1">Male</option>
		</select>
		<br/><br/>

		<label for="Date">Date:</label>
		<input type="datetime-local" name= "date" size="16" >
		<br/><br/>

		<label for="Relationship">Relationship:</label>
		<input id="relation" name="relation" type="text" value="" maxlength="16" />
		<br/><br/>

		<label for="Photo">Photo:</label>
		<input id="file" name="file" type="file"/>
		<br/><br/>
		</fieldset>

		<br>
		<center><input type="submit" value="Create" name="create"></center>
	</form>
</div>