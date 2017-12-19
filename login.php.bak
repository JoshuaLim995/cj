<?php include ('CSS.php') ?>
<?php
session_start();
include('connDB.php');

if(isset($_POST['login'])){
	require 'connDB.php';
	$user = $_POST['loginID'];
	$pass = $_POST['password'];

	$regisTypeSQL = 
		"SELECT 
		regisType
		FROM usertable
		WHERE userID ='$user'";
	$resultRegisTypeSQL = mysqli_query($con,$regisTypeSQL);
	$getRegisType = mysqli_fetch_array($resultRegisTypeSQL);
	$regisType = $getRegisType['regisType'];
	echo $regisType;
	if($regisType == '0'){
		$_SESSION['userID'] = $user;
		header('Location: admin/adminPage.php');
	}else if($regisType == '1') {
		$_SESSION['userID'] = $user;
		header('Location: client/clientPage.php');
	}else if($regisType == '2'){
		$_SESSION['userID'] = $user;
		header('Location: chef/chefPage.php');
	}else if($regisType == '3'){
		$_SESSION['userID'] = $user;
		header('Location: driver/driverPage.php');
	}else if($regisType == '4'){
		$_SESSION['userID'] = $user;
		header('Location: nurse/nursePage.php');	
	}else{
		echo "Wrong username or password! Please try again.";
	}

	if(isset($_POST['logout'])){
		session_unregister(userID);
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