<?php 

require_once 'DbConnect.php';

$response = array();

if(isset($_GET['apicall']) == "login"){

//	if(isTheseParametersAvailable(array('Name', 'Password'))){

		$Name = $_POST['Name'];
		$Password = md5($_POST['Password']); 

//		$Name = 'facehugger';
//		$Password = md5('123123'); 

		//LATER WILL HAVE TO ADD MORE

		$query = "
		SELECT id, Name, regisType, '0' AS Patient_ID FROM users WHERE Name = '$Name' AND Password = '$Password'
		UNION 
		SELECT id, Name, regisType, Patient_ID FROM clients WHERE Name = '$Name' AND Password = '$Password'
		";

		$response = getData($query);




}else{
	$response['error'] = true; 
	$response['message'] = 'Invalid API Call';
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "The page that you have requested could not be found.";
	exit();
}

echo json_encode($response);

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
		$response['message'] = 'Invalid username or password';
	}
	return $response;
}


function isTheseParametersAvailable($params){

	foreach($params as $param){
		if(!isset($_POST[$param])){
			return false; 
		}
	}
	return true; 
}