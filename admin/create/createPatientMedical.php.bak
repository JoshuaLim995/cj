<?php 

//include ('regisUser.php'); 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){

	include ('createPatientMedicalPHP.php');  
	include('../../CSS.php');

	?>

	<!DOCTYPE html>
	<html>
	<body>

		<?php 
		echo "<a href= '../view/viewPatient.php?ID={$Patient_ID}'><img src='../../button/back.png' width='50' height='50'></a>";
		?>


		<div class='create'>
			<form method="post" name="createForm" action="" enctype='multipart/form-data' onsubmit="return myFunction()">

				<fieldset>
					<legend><p class="big"><strong>Create Patient Medical Record</strong></p></legend>

					<label>Patient ID: <?php echo $Patient_ID ?></label>
					<br>
					<label>Patient Name: <?php echo $Patient_Name ?></label>
					<br><br>
					<label>Date: <?php echo $Date ?></label>
					<br><br>


					<label for="Blood_Pressure">Blood_Pressure:</label>
					<input id="Blood_Pressure" name="Blood_Pressure" type="text" value="" maxlength="255" />
					<font color="red"><div id = "Blood_PressureError"></div></font>
					<br/><br/>



					<label for="Heart_Rate">Heart_Rate:</label>
					<input id="Heart_Rate" name="Heart_Rate" type="text" value="" maxlength="16" />
					<font color="red"><div id = "Heart_RateError"></div></font>
					<br/><br/>

					<label for="Sugar_Level">Sugar_Level:</label>
					<input id="Sugar_Level" name="Sugar_Level" type="text" value="" maxlength="16" />
					<font color="red"><div id = "Sugar_LevelError"></div></font>
					<br/><br/>

					<label for="Temperature">Temperature:</label>
					<input id="Temperature" name="Temperature" type="text" value="" maxlength="16" />
					<font color="red"><div id = "TemperatureError"></div></font>
					<br/><br/>

					<label>Description:</label>
					<br>
					<textarea rows="4" cols="50" name="Description">Enter text here...</textarea> 
					<br/><br/>



					

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
						document.getElementById("Blood_PressureError").innerHTML = "Blood_Pressure cannot be empty";
						i++;
						
					}


					if (!createForm.Heart_Rate.value ==""){

						if (isNaN(createForm.Heart_Rate.value)){
							document.getElementById("Heart_RateError").innerHTML = "Please Enter Valid number";

							i++;
						}else
						document.getElementById("Heart_RateError").innerHTML = null;
					}else{
						document.getElementById("Heart_RateError").innerHTML = "Heart_Rate cannot be empty";
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

						document.getElementById("Sugar_LevelError").innerHTML = "IC must be fill";
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