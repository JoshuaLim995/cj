<?php 
//include ('../adminHeader.php');
include ('../../CSS.php');
include('../../connDB.php');
?>

<html>
<head>
    <title id = "title">View User</title>
</head>
<body>


	
<a href="../view.php?type=U"><img src='../../button/back.png' width="50" height="50"></a> 


    <?php
    if(isset($_GET["ID"])){
     $ID = $_GET["ID"];

     $query = "SELECT ID, Name, IC, Contact, BirthYear, Address, Gender, RegisDate, RegisType FROM users WHERE id = $ID";

//     $query = "SELECT Name, IC, Contact, BirthYear, Address, Gender, RegisDate FROM patients WHERE ID = $ID";




     echo "<center>";
     echo "<span><p class='big'>User Data</p></span>";


     if($c_records = mysqli_query($con,$query)){

        while ($row = mysqli_fetch_array($c_records)) {




            echo "<table border = 1>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<td>".$ID. "</td>";
            echo "</tr>";


            echo "<tr>";
            echo "<th>Name</th>";
            echo "<td>".$row['Name']. "</td>";
            echo "</tr>";


            echo "<tr>";
            echo "<th>IC</th>";
            echo "<td>" .$row['IC']. "</td>";
            echo "</tr>";




            echo "<tr>";
            echo "<th>Age</th>";
            $Age = date("Y") - $row['BirthYear'];
            echo "<td>" .$Age. "</td>";
            echo "</tr>";



            echo "<tr>";
            echo "<th>Gender</th>";
            echo "<td>";
            switch ($row['Gender']) {
                case 'F':
                echo "Female";
                break;
                case 'M':
                echo "Male";
                break;
                default:
                echo "Other";
                break;
            }
            echo "</td>";
            echo "</tr>";



            echo "<tr>";
            echo "<th>Contact</th>";
            echo "<td>" .$row['Contact']. "</td>";
            echo "</tr>";






            echo "<tr>";
            echo "<th>Address</th>";

            echo "<td>" .$row['Address']. "</td>";
            echo "</tr>";


            echo "<tr>";
            echo "<th>RegisType</th>";

            echo "<td>";


		switch ($row['RegisType']) {
			case 'A':
			echo "Admin";
			break;
			case 'N':
			echo "Nurse";
			break;
			case 'D':
			echo "Driver";
			break;
			case 'Z':
			echo "Chef";
			break;

			default:
		# code...
			break;
		}
		echo "</td>";
            echo "</tr>";
            

            echo "<tr>";
            echo "<th>Registration Date</th>";
            echo "<td>" .$row['RegisDate']. "</td>";
            echo "</tr>";



    echo "</table>";



        }
    }
    else{
        echo "No Record";
    }


}

echo "</center>";
?>
</body>
</html>