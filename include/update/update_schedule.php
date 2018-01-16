<?php
include ('updateSchedulePHP.php') ?>

<!DOCTYPE html>
<html>
<body>
	<a href="../viewSchedule.php"><img src='../../button/back.png' width="50" height="50"></a>

	<div class='create' align="center">
		<form method="post" name="assignDriver" action="" enctype='multipart/form-data' onsubmit="return myFunction()">
			<fieldset class="fieldset-auto-width">
				<legend><strong><p class="big">Update Schedule</p></strong></legend>
				<table>
					<tr>
						<td class="inLine"><label>Patient Name:</label></td>
						<td >
							<select id="patient" name="Patient_ID">
								<option value ="-1">-------</option>
								<?php while($row = mysqli_fetch_array($resultPatient)):;?>
									<option value="<?php echo $row[0];?>" <?php echo ($Patient_ID==$row[0] ? 'selected':''); ?>><?php echo $row[1];?></option>
								<?php endwhile;?>
							</select>
						</td>
						<td class="inLine"><label>Nurse Name:</label></td>
						<td >
							<select id="nurse" name="Nurse_ID">
								<option value ="-1">-------</option>
								<?php while($row = mysqli_fetch_array($resultNurse)):;?>
									<option value="<?php echo $row[0];?>" <?php echo ($Nurse_ID==$row[0] ? 'selected':''); ?>><?php echo $row[1];?></option>
								<?php endwhile;?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"><font color="red"><div id="patientError"></div></font></td>
						<td colspan="2"><font color="red"><div id="nurseError"></div></font></td>
					</tr>
					<tr>
						<td class="inLine"><label>Driver Name:</label></td>
						<td><select id="driver" name="Driver_ID">
							<option value ="-1">-------</option>
							<?php while($row = mysqli_fetch_array($resultDriver)):;?>
								<option value="<?php echo $row[0];?>" <?php echo ($Driver_ID==$row[0] ? 'selected':''); ?>><?php echo $row[1];?></option>
							<?php endwhile;?>
						</select>
					</td>
					<td><font color="red"><div id="driverError"></div></font></td>
				</tr>
				<tr>
					<td class="inLine"><label>Time:</label></td>
					<td><input id="time" type="time" name= "Time" value="<?php echo $Time; ?>" size="16" ></td>
					<td class="inLine"><label>Date:</label></td>
					<td><input id="date" type="date" name= "Date" value="<?php echo $Date; ?>" size="16" ></td>
				</tr>
				<tr>
					<td colspan="2"><font color="red"><div id="timeError"></div></font></td>
					<td colspan="2"><font color="red"><div id="dateError"></div></font></td>
				</tr>
				<tr>
					<td><label>Location:</label></td>
					<td><input id="location" type="text" name= "Location" value="<?php echo $Location; ?>" size="16" ></td>
				</tr>
				<tr>
					<td colspan="2"><font color="red"><div id="locationError"></div></font></td>
				</tr>
				<tr>
					<td><label>Description:</label></td>
					<td><textarea rows="4" cols="50" name="Description" placeholder="Enter text here..."><?php echo $Description; ?></textarea> </td>
				</tr>
			</table>
		</fieldset>
		<center><input type="submit" value="Update" name="update" onclick="return myFunction()"> </center>	
	</form>
</div>

<script type="text/javascript">
	function myFunction()
	{
		var i = 0;
		if(assignDriver.patient.value == "-1"){
			document.getElementById("patientError").innerHTML = "Please select patient";
			i++;
		}else{
			document.getElementById("patientError").innerHTML = null;
		}
		if (assignDriver.nurse.value =="-1")
		{
			document.getElementById("nurseError").innerHTML = "Please select nurse";
			i++;
		}
		else
			document.getElementById("nurseError").innerHTML = null;

		if (assignDriver.driver.value =="-1")
		{
			document.getElementById("driverError").innerHTML = "Please select driver";
			i++;
		}
		else
			document.getElementById("driverError").innerHTML = null;


		if(assignDriver.location.value == ""){
			document.getElementById("locationError").innerHTML = "Please input location";
			i++;
		}
		else
			document.getElementById("locationError").innerHTML = null;



		return (i == 0);
	}
</script>




</body>
</html> 
