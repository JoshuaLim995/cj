<?php 
session_start();
include ('CSS.php');

include('connDB.php');

if(isset($_POST['login'])){

	$Name = $_POST['loginID'];
	$Password = md5($_POST['password']); 


	$query = "SELECT id, Name, regisType, '0' AS Patient_ID FROM users WHERE Name = '$Name' AND Password = '$Password'
	UNION 
	SELECT id, Name, regisType, Patient_ID FROM clients WHERE Name = '$Name' AND Password = '$Password'";

	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);



	$_SESSION['userID'] = $row['id'];
	$_SESSION['userName'] = $row['Name'];
	$_SESSION['regisType'] = $row['regisType'];

	switch ($row['regisType']) {
		case 'A':
		header('Location: admin/adminPage.php');
		break;
		case 'N':
		header('Location: nurse/nursePage.php');
		break;
		case 'D':
		header('Location: driver/driverPage.php');
		break;
		case 'Z':
		header('Location: chef/chefPage.php');
		break;
		case 'C':
			header('Location: client/clientPage.php');
			$_SESSION['Patient_ID'] = $row['Patient_ID'];
			break;
		default:
		echo "Wrong username or password! Please try again.";
		break;
	}

}
?>
<div class='login'>
	<form method="post">
		<fieldset>
			<legend><strong>LOGIN</strong></legend>
			<label for="loginID">Login ID:</label>
			<input id="loginID" name="loginID" type="text" value="" maxlength="255" />
			<br/><br/>

			<label for="password">Password:</label>
			<input id="password" name="password" type="password" value="" maxlength="16" />
			<br/><br/>
		</fieldset>
		<br>
		<center><input type="submit" value="Login" name="login"></center>
	</form>
</div>