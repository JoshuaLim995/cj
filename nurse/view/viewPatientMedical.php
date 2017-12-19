<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){

    include ('../../CSS.php');
    include('../../connDB.php');
    ?>

    <html>
    <head>
        <title id = "title">View Medical Record</title>
    </head>
    <body>



        <a href="javascript:history.go(-1)"><img src='../../button/back.png' width="50" height="50"></a> 


        <?php
        if(isset($_GET["ID"])){
           $pID = $_GET["ID"];

           $query = "SELECT ID, Date FROM medical WHERE Patient_ID = $pID ORDER BY Date DESC";

           echo "<center>";
           echo "<span><p class='big'>Patient Medical Record</p></span>";

           if($records = mysqli_query($con,$query)){

            while ($row = mysqli_fetch_array($records)) {

               echo "<table  class ='showMedicalDate' border = 1>";
               echo "<tr>";
               echo "<th>Date</th>";
               echo "<td>".$row['Date']. "</td>";
               echo "<td>";
               echo "<a href= 'viewMedicalDetail.php?ID={$row['ID']}'>View Detail</a>";
               echo "</td>";
               echo "</tr>";
               echo "</table>";
               echo "<br/>";
           }
       }
       else{
        echo "No Record";
    }
    echo "</center>";
}

?>
</body>
</html>

<?php 
}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "<p>The page that you have requested could not be found.</p>";

    exit();
}
?>