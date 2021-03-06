<?php 

include ('createPatientMedicalPHP.php');  

?>

<!DOCTYPE html>
<html>
<body>

	<?php 
	echo "<a href= '../view/viewPatient.php?ID={$Patient_ID}'><img src='../../button/back.png' width='50' height='50'></a>";
	?>


	<div class='create'>
		<form method="post" name="createForm" action="" enctype='multipart/form-data' onsubmit="return myFunction()">

			<fieldset class="fieldset-auto-width">
				<legend><p class="big"><strong>Create Patient Medical Record</strong></p></legend>

				<table>
					<tr>
						<td><label for="Patient_ID">Patient ID:</label></td>
						<td><?php echo $Patient_ID ?></td>						
					</tr>

					<tr>
						<td><label for="Patient_Name">Patient Name:</label></td>
						<td><?php echo $Patient_Name ?></td>
					</tr>
					<tr>
						<td><label for="Date">Date:</label></td>
						<td><?php echo $Date ?></td>
					</tr>
					
					<tr>
						<td><label for="Heart_Rate">Heart Rate:</label></td>
						<td><input id="Heart_Rate" name="Heart_Rate" type="text" value="" maxlength="255" /></td>
					</tr>
					<tr><td colspan="2"><font color="red"><div id = "Heart_RateError"></div></font></td></tr>

					<tr>
						<td><label for="Sugar_Level">Sugar Level:</label></td>
						<td><input id="Sugar_Level" name="Sugar_Level" type="text" value="" maxlength="255" /></td>
					</tr>
					<tr><td colspan="2"><font color="red"><div id = "Sugar_LevelError"></div></font></td></tr>

					<tr>
						<td><label for="Blood_Pressure">Blood Pressure:</label></td>
						<td><input id="Blood_Pressure" name="Blood_Pressure" type="text" value="" maxlength="255" /></td>
					</tr>
					<tr><td colspan="2"><font color="red"><div id = "Blood_PressureError"></div></font></td></tr>

					<tr>
						<td><label for="Temperature">Temperature:</label></td>
						<td><input id="Temperature" name="Temperature" type="text" value="" maxlength="255" /></td>
					</tr>
					<tr><td colspan="2"><font color="red"><div id = "TemperatureError"></div></font></td></tr>

					<tr>
						<td><label for="Other">Other:</label></td>
						<td><textarea rows="4" cols="50" name="Other" placeholder="Enter text here..."></textarea></td>
					</tr>

					<tr>
						<td><label for="Description">Description:</label></td>
						<td><textarea rows="4" cols="50" name="Description" placeholder="Enter text here..."></textarea></td>
					</tr>

				</table>

			</fieldset>

			<br>

			<input type="submit" value="Next" name="next" onclick="return myFunction()"> 

		</div>
		<script>



			function myFunction() {
				var i = 0;
				if (!createForm.Blood_Pressure.value =="")
				{
					if (isNaN(createForm.Blood_Pressure.value)){
						document.getElementById("Blood_PressureError").innerHTML = "Please Enter Valid number";

						i++;
					}else
					document.getElementById("Blood_PressureError").innerHTML = null;
				}
				else{
					document.getElementById("Blood_PressureError").innerHTML = "Blood Pressure cannot be empty";
					i++;
					
				}


				if (!createForm.Heart_Rate.value ==""){

					if (isNaN(createForm.Heart_Rate.value)){
						document.getElementById("Heart_RateError").innerHTML = "Please Enter Valid number";

						i++;
					}else
					document.getElementById("Heart_RateError").innerHTML = null;
				}else{
					document.getElementById("Heart_RateError").innerHTML = "Heart Rate cannot be empty";
					i++;
				}


				if (!createForm.Sugar_Level.value =="")
				{
					if (isNaN(createForm.Sugar_Level.value)){
						document.getElementById("Sugar_LevelError").innerHTML = "Please Enter Valid number";

						i++;
					}else
					document.getElementById("Sugar_LevelError").innerHTML = null;
				}
				else{

					document.getElementById("Sugar_LevelError").innerHTML = "Sugar Level must be fill";
					i++;
					
				}

				if (!createForm.Temperature.value =="")
				{
					if (isNaN(createForm.Temperature.value)){
						document.getElementById("TemperatureError").innerHTML = "Please Enter Valid number";

						i++;
					}else
					document.getElementById("TemperatureError").innerHTML = null;
				}
				else{
					document.getElementById("TemperatureError").innerHTML = "Temperature must be fill";
					i++;
					
				}

				

				return (i == 0);
			}
		</script>

	</body>
	</html> 



