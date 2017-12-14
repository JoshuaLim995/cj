<?php

//require_once 'DbConnect.php';
$response = array();
$server_ip = gethostbyName(gethostName());

//Patient image location path
define('PATIENT_IMAGE', 'patient_image/');


if(isset($_GET['apicall'])){
	$apicall = $_GET['apicall'];

	$type = $_POST['type'];

	if($apicall == "Create"){	

	//General Information
		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Birthyear = $_POST['Birthyear'];
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];
		$regisType = $_POST['regisType'];	

		switch($type){
			case "User":
			//Check if all parameters are available
			if(isTheseParametersAvailable(array($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType))){
			//Check if User exist in the database
				$exist = isExist("Users", $IC);
				if(!$exist)
					$response = createUser($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType);
				else{
					$response['error'] = true;
					$response['message'] = 'User Exist in Database';
				}
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;		

			case "Client":
//Client additional information
			$Patient_ID = $_POST['Patient_ID'];

			//Check if all parameters are available
			if(isTheseParametersAvailable(array($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType,$Patient_ID))){
			//Check if Client exist in the database
				$exist = isExist("Clients", $IC);
				if(!$exist){
					$response = createClient($Name, $IC, $Gender, $Birthyear, $Contact, $Address, $regisDate, $regisType, $Patient_ID);
				}
				else{
					$response['error'] = true;
					$response['message'] = 'Client Exist in Database';
				}
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;
			
			case "Patient":
	//Patient additional information
			$BloodType = $_POST['BloodType'];
			$Meals = $_POST['Meals'];
			$Allergic = $_POST['Allergic'];
			$Sickness = $_POST['Sickness'];
			$Deposit = $_POST['Deposit'];
		//Image
		//	$image = $_FILES['pic']['name'];
			//Check if all parameters are available
			if(isTheseParametersAvailable(array($Name, $IC, $Birthyear, $Gender, $BloodType, $Address, $Contact, $Meals, $Allergic, $Sickness, $regisType, $regisDate, $Deposit))){
			//Check if Client exist in the database
				$exist = isExist("Patients", $IC);
				if(!$exist)
					$response = createPatient($Name, $IC, $Birthyear, $Gender, $BloodType, $Address, $Contact, $Meals, $Allergic, $Sickness, $regisType, $regisDate, $Deposit);
				else{
					$response['error'] = true;
					$response['message'] = 'Patient Exist in Database';
				}
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;
			default:
			$response['error'] = true; 
			$response['message'] = 'Invalid Register Type';
			break;
		}

	}
	else if($apicall == "ReadAll"){
		switch($type){
			case "User":
			$query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, RegisType FROM users";
			break;			
			case "Client":
			$query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, Patient_ID FROM clients";
			break;
			case "Patient":
//			$query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, BloodType, Meals , Allergic, Sickness, Deposit, Image FROM patients";
			$query = "SELECT p.ID, p.Name, p.IC, p.Contact, p.BirthYear, p.Address, p.Gender, p.RegisDate, p.BloodType, p.Meals, p.Allergic, p.Sickness, p.Deposit, p.Image, c.ID AS Client_ID FROM patients p LEFT JOIN clients c ON p.ID = c.Patient_ID";
			break;
			case "Medical":
				$query = "SELECT ID, Date, Patient_ID, Nurse_ID, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description FROM medical";
				break;
			case 'Driver_Schedule':
				$query = "SELECT ds.ID, d.Name AS Driver_Name, p.Name AS Patient_Name, n.Name AS Nurse_Name, ds.Location, ds.Description, ds.Date, ds.Time FROM users d INNER JOIN driver_schedule ds ON ds.Driver_ID = d.ID INNER JOIN users n ON ds.Nurse_ID = n.ID INNER JOIN patients p ON ds.Patient_ID = p.ID";
			break;
			case 'Meal':
				$query = "SELECT Meals, COUNT(Meals) AS Count FROM patients GROUP BY Meals";
				break;
			default:
			$response['error'] = true; 
			$response['message'] = 'Invalid Register Type';
			break;
		}
		if(isset($query))
			$response = getData($query);
	}

	else if($apicall == "ReadData"){
	//get id 
		$id = $_POST['id'];
		if(isset($id)){
			switch($type){
				case "User":
				$query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, RegisType FROM users WHERE id = $id";
				break;			
				case "Client":
				$query = "SELECT c.ID, c.Name, c.IC, c.Contact, c.BirthYear, c.Address, c.Gender, c.RegisDate, c.Patient_ID,  p.Name as P_Name FROM clients c, patients p WHERE c.Patient_ID = p.ID AND c.ID = $id";
				break;
				case "Patient":
				$query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, BloodType, Meals , Allergic, Sickness, Deposit, Image FROM patients WHERE id = $id";
				break;
				case "Medical":
				$query = "SELECT ID, Date, Nurse_ID, Patient_ID, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description FROM medical WHERE Patient_ID = $id";
				break;
				case 'Driver_Schedule':
					$query = "SELECT ds.ID, d.Name AS Driver_Name, p.Name AS Patient_Name, n.Name AS Nurse_Name, ds.Location, ds.Description, ds.Date, ds.Time FROM users d INNER JOIN driver_schedule ds ON ds.Driver_ID = d.ID INNER JOIN users n ON ds.Nurse_ID = n.ID INNER JOIN patients p ON ds.Patient_ID = p.ID WHERE ds.Driver_ID = $id";
					break;
				default:
				$response['error'] = true; 
				$response['message'] = 'Invalid Register Type';
				break;
			}
			if(isset($query))
				$response = getData($query);
		}
		else{
			$response['error'] = true; 
			$response['message'] = 'Required parameter not available';	
		}
	}
	else if($apicall == "Update"){
		$id = $_POST['id'];
		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Birthyear = $_POST['Birthyear'];
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];
		$regisType = $_POST['regisType'];

		switch($type){
			case "User":
			if(isTheseParametersAvailable(array($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType, $id))){
				$response = updateUser($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType, $id);
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;			
			case "Client":
			if(isTheseParametersAvailable(array($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType, $id))){
				$response = updateClient($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType, $id);
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;
			case "Patient":
			//Patient additional information
			$BloodType = $_POST['BloodType'];
			$Meals = $_POST['Meals'];
			$Allergic = $_POST['Allergic'];
			$Sickness = $_POST['Sickness'];
			$Deposit = $_POST['Deposit'];
			
			if(isTheseParametersAvailable(array($Name, $IC, $Birthyear, $Gender, $BloodType, $Address, $Contact, $Meals, $Allergic, $Sickness, $regisType, $regisDate, $Deposit, $id))){
				$response = updatePatient($Name, $IC, $Birthyear, $Gender, $BloodType, $Address, $Contact, $Meals, $Allergic, $Sickness, $regisType, $regisDate, $Deposit, $id);
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;
			default:
			$response['error'] = true; 
			$response['message'] = 'Invalid Register Type';
			break;
		}
	}

	else if($apicall == "Delete"){
	//get id 
		$id = $_POST['id'];
		if(isset($id)){

			switch($type){
				case "User":
				$query = "DELETE FROM users WHERE ID = $id";
				break;			
				case "Client":
				$query = "DELETE FROM clients WHERE id = $id";
				break;
				case "Patient":
				$query = "DELETE FROM patients WHERE id = $id";
				break;
				default:
				$response['error'] = true; 
				$response['message'] = 'Invalid Register Type';
				break;
			}
			if(isset($query))
				$response = delete($query);
		}
		else{
			$response['error'] = true; 
			$response['message'] = 'Required parameter not available';
		}
	}

	else if($apicall == "Create_Medical"){
		$Date = $_POST['Date'];
		$Nurse_ID = $_POST['Nurse_ID'];
		$Patient_ID = $_POST['Patient_ID'];
		$Blood_Pressure = $_POST['Blood_Pressure']; 
		$Heart_Rate = $_POST['Heart_Rate'];
		$Sugar_Level = $_POST['Sugar_Level'];
		$Temperature = $_POST['Temperature'];
		$Description = $_POST['Description'];

		switch ($type) {
			case "Medical":
			if(isTheseParametersAvailable(array($Date,$Nurse_ID,$Patient_ID,$Blood_Pressure,$Heart_Rate,$Sugar_Level, $Temperature, $Description))){
				$response = createMedical($Date,$Nurse_ID,$Patient_ID,$Blood_Pressure,$Heart_Rate,$Sugar_Level, $Temperature, $Description);
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;
			
			default:
			$response['error'] = true; 
			$response['message'] = 'Invalid Value Type';
			break;
		}		
	}

	else if($apicall == "Create_Driver_Schedule"){
		$Driver_ID = $_POST['Driver_ID'];
		$Patient_ID = $_POST['Patient_ID'];
		$Nurse_ID = $_POST['Nurse_ID'];
		$Location = $_POST['Location'];
		$Description = $_POST['Description'];
		$Date = $_POST['Date'];
		$Time = $_POST['Time'];

		switch ($type) {
			case "Driver_Schedule":
			if(isTheseParametersAvailable(array($Driver_ID, $Patient_ID, $Nurse_ID, $Location, $Description, $Date, $Time))){
				$response = create_Driver_Schedule($Driver_ID, $Patient_ID, $Nurse_ID, $Location, $Description, $Date, $Time);
			}
			else{
				$response['error'] = true;
				$response['message'] = 'Required Parameters not available';
			}
			break;
			
			default:
			$response['error'] = true; 
			$response['message'] = 'Invalid Value Type';
			break;
		}	

	}
	else {
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
}
else{
	$response['error'] = true; 
	$response['message'] = 'No API call';
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "The page that you have requested could not be found.";
	exit();
}

//Send out the Response
echo json_encode($response);


//Function to check parameter
function isTheseParametersAvailable($params){
	foreach($params as $param){
		if(!isset($param)){
			return false; 
		}
	}
	return true; 
}

//Function to check existing account Should return false if not exist
function isExist($tableName, $IC){
	include 'DbConnect.php';
	$query = "SELECT id FROM $tableName WHERE IC = ?";
	
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $IC);
	$stmt->execute();
	$stmt->store_result();
	
	if($stmt->num_rows > 0)
		return true;
	else 
		return false;    
}

//Function to add User
function createUser($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType){
	include 'DbConnect.php';
	$response = array();
	$Password = md5($IC);
	$stmt = $conn->prepare("INSERT INTO users (Name, IC, Gender, Birthyear,Contact, Address, regisDate, regisType, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $Name, $IC, $Gender, $Birthyear, $Contact, $Address, $regisDate, $regisType, $Password);

	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'User registered successfully'; 		
	}
	else{
		$response['error'] = true; 
		$response['message'] = 'Unable to Register User'; 
	}
	$stmt->close();
	return $response;
}

//Function to get Patient's ID
function getPatientID($Patient_Name, $Patient_IC){
	include 'DbConnect.php';
	$stmt = $conn->prepare("SELECT id FROM patients WHERE Name = ? AND ic = ?");
	$stmt->bind_param("ss",$Patient_Name, $Patient_IC);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows > 0){
		$stmt->bind_result($Patient_ID);
		$stmt->fetch();
		return $Patient_ID;
	}
	else
		return 0;
}

//Funtion to add Client
function createClient($Name, $IC, $Gender, $Birthyear, $Contact, $Address, $regisDate, $regisType, $Patient_ID){
	include 'DbConnect.php';
	$response = array();
	$Password = md5($IC);
	$stmt = $conn->prepare("INSERT INTO clients (Name, IC, Gender, Birthyear,Contact, Address, regisDate, regisType, Password, Patient_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssssss", $Name, $IC, $Gender, $Birthyear, $Contact, $Address, $regisDate, $regisType, $Password, $Patient_ID);
	
	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'Client registered successfully'; 		
	}
	else{
		$response['error'] = true; 
		$response['message'] = 'Unable to Register Client'; 
	}
	$stmt->close();
	return $response;
}

//Function to add Patient
function createPatient($Name, $IC, $Birthyear, $Gender, $BloodType, $Address, $Contact, $Meals, $Allergic, $Sickness, $regisType, $regisDate, $Deposit){
	include 'DbConnect.php';
	$response = array();
	try{

		if(isset($_FILES['pic']['name'])){
			$image = $_FILES['pic']['name'];
			$image_temp = $_FILES['pic']['tmp_name'];

			$query = "INSERT INTO patients (Name, IC, Birthyear, Gender, BloodType, Address, Contact, Meals, Allergic, Sickness, regisType, regisDate, Deposit, image) VALUES ('$Name', '$IC', $Birthyear, '$Gender', '$BloodType', '$Address', '$Contact', '$Meals', '$Allergic', '$Sickness', '$regisType', '$regisDate', '$Deposit', '$image')";
		}
		else{
			$query = "INSERT INTO patients (Name, IC, Birthyear, Gender, BloodType, Address, Contact, Meals, Allergic, Sickness, regisType, regisDate, Deposit) VALUES ('$Name', '$IC', $Birthyear, '$Gender', '$BloodType', '$Address', '$Contact', '$Meals', '$Allergic', '$Sickness', '$regisType', '$regisDate', '$Deposit')";
		}

		//Store into database
		$stmt = $conn->prepare($query);

		if($stmt->execute()){
			$response['error'] = false;
			$response['message'] = 'Patient registered successfully';
			if(isset($_FILES['pic']['name']))
				move_uploaded_file($image_temp, PATIENT_IMAGE . $image);
		}else{
			throw new Exception("Could not register patient");
		}
		$stmt->close();
	}catch(Exception $e){
		$response['error'] = true;
		$response['message'] = 'Could not register patient';
		$stmt->close();
	}	
	return $response;
}

function createMedical($Date,$Nurse_ID,$Patient_ID,$Blood_Pressure,$Heart_Rate,$Sugar_Level, $Temperature, $Description){
	include 'DbConnect.php';
	$response = array();
	$stmt = $conn->prepare("INSERT INTO medical (Date, Nurse_ID, Patient_ID, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description) VALUES (?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssdddds", $Date, $Nurse_ID, $Patient_ID, $Blood_Pressure, $Heart_Rate, $Sugar_Level, $Temperature, $Description);


	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'Patient\'s medical saved'; 
	}
	else{
		$response['error'] = true; 
		$response['message'] = 'Unable to save Patient medical record'; 
	}
	$stmt->close();
	return $response;
}

function create_Driver_Schedule($Driver_ID, $Patient_ID, $Nurse_ID, $Location, $Description, $Date, $Time){
	include 'DbConnect.php';
	$response = array();
	$stmt = $conn->prepare("INSERT INTO driver_schedule (Driver_ID, Patient_ID, Nurse_ID, Location, Description, Date, Time) VALUES (?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssss", $Driver_ID, $Patient_ID, $Nurse_ID, $Location, $Description, $Date, $Time);

	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'Driver Schedule created'; 
	}
	else{
		$response['error'] = true; 
		$response['message'] = 'Unable to create Driver Schedule'; 
	}
	$stmt->close();
	return $response;
}

//Function to get data from using query
function getData($query){
	include 'DbConnect.php';
	$response = array();
	
	$result=$conn->query($query);
	if($result -> num_rows > 0){
		while($e = mysqli_fetch_assoc($result)){
			$output[]=$e;
		}
		$response['error'] = false;
		$response['message'] = 'Success';
		$response['result'] = $output;
	}
	else{
		$response['error'] = true;
		$response['message'] = 'No record';
	}
	return $response;
}

//Function to update User
function updateUser($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType, $id){
	include 'DbConnect.php';
	$response = array();
	$stmt = $conn->prepare("UPDATE users SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = '$Birthyear', Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', regisType = '$regisType' WHERE id=$id");
	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'User Update successfully'; 
	}
	else{
		$response['error'] = true; 
		$response['message'] = 'Could Not Update User'; 
	}
	$stmt->close();
	return $response;
}

//Function to update Client
function updateClient($Name,$IC,$Gender, $Birthyear, $Contact,$Address,$regisDate,$regisType, $id){
	include 'DbConnect.php';
	$response = array();
	$stmt = $conn->prepare("UPDATE clients SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = '$Birthyear', Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', regisType = '$regisType' WHERE id=$id");
	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'Client Update successfully'; 
	}
	else{
		$response['error'] = true; 
		$response['message'] = 'Could Not Update Client'; 
	}
	$stmt->close();
	return $response;
}

//Function to update Patient
function updatePatient($Name, $IC, $Birthyear, $Gender, $BloodType, $Address, $Contact, $Meals, $Allergic, $Sickness, $regisType, $regisDate, $Deposit, $id){
	include 'DbConnect.php';
	$response = array();
	//check if image is null
	if(isset($_FILES['pic']['name'])){
		$image = $_FILES['pic']['name'];
		$image_temp = $_FILES['pic']['tmp_name'];
		$query = "UPDATE patients SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = $Birthyear, Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', regisType = '$regisType', BloodType = '$BloodType', Meals = '$Meals' , Allergic = '$Allergic', Sickness = '$Sickness', Deposit = $Deposit, Image = '$image' WHERE id=$id";
	}
	else{
		$query = "UPDATE patients SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = $Birthyear, Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', regisType = '$regisType', BloodType = '$BloodType', Meals = '$Meals' , Allergic = '$Allergic', Sickness = '$Sickness', Deposit = $Deposit WHERE id=$id";
	}
	try{
		$stmt = $conn->prepare($query);
		if($stmt->execute()){
			$response['error'] = false; 
			$response['message'] = 'Patient Update successfully'; 
			if(isset($_FILES['pic']['name'])){
				move_uploaded_file($image_temp, PATIENT_IMAGE . $image);
			}
		}
		else{
			throw new Exception("Could Not Update patient");
		}
	}catch(Exception $e){
		$response['error'] = true; 
		$response['message'] = 'Could Not Update patient'; 
	}
	$stmt->close();
	return $response;
}

//Function to delete data
function delete($query){
	include 'DbConnect.php';
	$response = array();
	
	$stmt = $conn->prepare($query);
	if($stmt->execute()){
		$stmt->close();
		$response['error'] = false;
		$response['message'] = 'Delete Success';
	}
	else{
		$stmt->close();
		$response['error'] = true; 
		$response['message'] = 'Error Execute Query';
	}
	return $response;
}


