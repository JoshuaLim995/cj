
  <html>
  <head>
    <title id = "title">View Medical Detail</title>
  </head>
  <body>



    <a href="javascript:history.go(-1)"><img src='../../button/back.png' width="50" height="50"></a> 




    <?php

    if(isset($_GET["ID"])){
     $ID = $_GET["ID"];

     $query = "SELECT m.ID, Date, u.Name AS Nurse_Name, p.Name AS Patient_Name, Blood_Pressure, Heart_Rate, Sugar_Level, Temperature, Description FROM medical m, users u, patients p WHERE m.ID = $ID AND m.Nurse_ID = u.ID AND m.Patient_ID = p.ID";


     if($records = mysqli_query($con,$query)){

      $row = mysqli_fetch_array($records);

     echo "<center>";
     echo "<span><p class='big'> Medical Record</p></span>";



      echo "<table border = 1>";

      echo "<tr>";
      echo "<th>Patient_Name</th>";
      echo "<td>".$row['Patient_Name']. "</td>";
      echo "</tr>";



      echo "<tr>";
      echo "<th>Date</th>";
      echo "<td>".$row['Date']. "</td>";
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

echo "Monitored by ".$row['Nurse_Name'];


    }
    else{
      echo "No Record";
    }


  }

  echo "</center>";
  ?>
</body>
</html>
