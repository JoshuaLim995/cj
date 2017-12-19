<?php 
//include ('../adminHeader.php');
include ('../../CSS.php');
include('../../connDB.php');
?>

<html>
<head>
    <title id = "title">View Patient</title>
</head>
<body>


	
<a href="javascript:history.go(-1)"><img src='../../button/back.png' width="50" height="50"></a> 


    <?php
    if(isset($_GET["ID"])){
     $ID = $_GET["ID"];

     $query = "SELECT ID, Date, Nurse_ID, Patient_ID, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description FROM medical WHERE Patient_ID = $ID ORDER BY Date DESC";




     echo "<center>";
     echo "<span><p class='big'>Patient Medical Record</p></span>";


     if($records = mysqli_query($con,$query)){




        while ($row = mysqli_fetch_array($records)) {

 echo "<table border = 1>";
            echo "<tr>";
            echo "<th>Date</th>";
          echo "<td>".$row['Date']. "</td>";
            echo "</tr>";


            echo "<tr>";
            echo "<th>Nurse_ID</th>";
            echo "<td>".$row['Nurse_ID']. "</td>";
            echo "</tr>";


  echo "<tr>";
            echo "<th>Patient_ID</th>";
            echo "<td>".$row['Patient_ID']. "</td>";
            echo "</tr>";

              echo "<tr>";
            echo "<th>Blood_Pressure</th>";
            echo "<td>".$row['Blood_Pressure']. "</td>";
            echo "</tr>";


              echo "<tr>";
            echo "<th>Heart_Rate</th>";
            echo "<td>".$row['Heart_Rate']. "</td>";
            echo "</tr>";


              echo "<tr>";
            echo "<th>Sugar_Level</th>";
            echo "<td>".$row['Sugar_Level']. "</td>";
            echo "</tr>";


              echo "<tr>";
            echo "<th>Temperature</th>";
            echo "<td>".$row['Temperature']. "</td>";
            echo "</tr>";

                         echo "<tr>";
            echo "<th>Description</th>";
            echo "<td>".$row['Description']. "</td>";
            echo "</tr>";

          echo "</table>";
echo "<br/>";
  
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