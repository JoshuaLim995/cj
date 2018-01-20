<?php 

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){

	if(isset($_POST['update'])){


		$Name = $_POST['Name'];
		$IC = $_POST['IC'];
		$Gender = $_POST['Gender'];
		$Age = $_POST['Age'];
		$Birthyear = date("Y") - $Age;
		$Contact = $_POST['Contact'];
		$Address = $_POST['Address'];
		$regisDate = $_POST['regisDate'];

		$date = str_replace('/', '-', $regisDate);


		$BloodType = $_POST['BloodType'];
		$Allergic = $_POST['Allergic'];

		$Deposit = $_POST['Deposit'];
		$Additional = $_POST['Additional'];

		if(isset($_POST['diseases'])){
			$Sickness = implode(",",$_POST['diseases']);

			if(isset($_POST['Other_Disease'])){
				$Sickness = $Sickness . ',' .  $_POST['Other_Disease'];
			}
		}
		else{
			$Sickness = $_POST['Other_Disease'];
		}

		if(isset($_POST['food'])){
			$Meals = implode(",",$_POST['food']);
			if(isset($_POST['Other_Food'])){
				$Meals = $Meals . ',' .  $_POST['Other_Food'];
			}
		}
		else {
			$Meals = $_POST['Other_Food'];
		}

		$target_dir = "../../patient_image/";



		if(isset($_FILES['file']['name'])){

			$image = $_FILES['file']['name'];
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");



			$extensions_arr = array("jpg","jpeg","png","gif");

			if( in_array($imageFileType,$extensions_arr) ){

				$query = "UPDATE patients SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = $Birthyear, Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', BloodType = '$BloodType', Meals = '$Meals' , Allergic = '$Allergic', Sickness = '$Sickness', Deposit = $Deposit, Image = '$image', Additional_Info = '$Additional' WHERE id=$ID";

				$result = mysqli_query($con,$query);


				var_dump($result);
				if ($result) {
					echo "Patient Updated";
					move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$image);
					header('Location: ../view.php?type=P');
				}else{
					echo 'failed';
				}	

			}
			else{
				$query = "UPDATE patients SET Name = '$Name', IC = '$IC', Gender = '$Gender', Birthyear = $Birthyear, Contact = '$Contact', Address = '$Address', regisDate = '$regisDate', BloodType = '$BloodType', Meals = '$Meals' , Allergic = '$Allergic', Sickness = '$Sickness', Deposit = $Deposit, Additional_Info = '$Additional' WHERE id=$ID";

				$result = mysqli_query($con,$query);


				var_dump($result);
				if ($result) {
					header('Location: ../view.php?type=P');
				}else{
					echo 'failed to add client';
				}	
			}
		}
		else
			echo "No Image";
	}
}else{
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page that you have requested could not be found.</p>";

	exit();
}
?>