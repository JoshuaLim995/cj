<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){

    include ('../../CSS.php');
    include('../../connDB.php');
    ?>

    <html>
    <head>
        <title id = "title">View Client</title>
    </head>
    <body>



        <a href="../view.php?type=C"><img src='../../button/back.png' width="50" height="50"></a> 


        <?php
        if(isset($_GET["ID"])){
           $ID = $_GET["ID"];

           $query = "SELECT c.ID, c.Name, c.IC, c.Contact, c.BirthYear, c.Address, c.Gender, c.RegisDate, c.Patient_ID,  p.Name as P_Name, c.Relationship FROM clients c, patients p WHERE c.Patient_ID = p.ID AND c.ID = $ID";




           echo "<center>";
           echo "<span><p class='big'>Client Data</p></span>";


           if($c_records = mysqli_query($con,$query)){

            while ($c_row = mysqli_fetch_array($c_records)) {




                echo "<table border = 1>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<td>".$ID. "</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<th>Name</th>";
                echo "<td>".$c_row['Name']. "</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<th>IC</th>";
                echo "<td>" .$c_row['IC']. "</td>";
                echo "</tr>";




                echo "<tr>";
                echo "<th>Age</th>";
                $Age = date("Y") - $c_row['BirthYear'];
                echo "<td>" .$Age. "</td>";
                echo "</tr>";



                echo "<tr>";
                echo "<th>Gender</th>";
                echo "<td>";
                switch ($c_row['Gender']) {
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
                echo "<td>" .$c_row['Contact']. "</td>";
                echo "</tr>";






                echo "<tr>";
                echo "<th>Address</th>";

                echo "<td>" .$c_row['Address']. "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>Registration Date</th>";
                echo "<td>" .$c_row['RegisDate']. "</td>";
                echo "</tr>";



                echo "<tr>";
                echo "<th>Patient_ID</th>";
                echo "<td>" .$c_row['Patient_ID']. "</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<th>P_Name</th>";
                echo "<td>" .$c_row['P_Name']. "</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<th>Relationship</th>";
                echo "<td>" .$c_row['Relationship']. "</td>";
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

<?php 
}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "<p>The page that you have requested could not be found.</p>";
    exit();
}
?>