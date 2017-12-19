<?php 
session_start();
if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "A"){
    include('../connDB.php');




    if(isset($_REQUEST["ID"]) && isset($_REQUEST['type'])){

     $ID = $_REQUEST["ID"];
     $type = $_REQUEST["type"];

     switch ($type) {
        case 'U':
        $query = "DELETE FROM users WHERE ID = $ID";
        break;
        case 'P':
        $query = "DELETE FROM patients WHERE ID = $ID";
        break;
        case 'C':
        $query = "DELETE FROM clients WHERE ID = $ID";
        break;
        default:

        break;
    }

    if(isset($query)){
        $result = mysqli_query($con,$query);

        $return = 'Location: view.php?type=' . $type;
        if ($result) {
            header($return);
        }else{
            echo 'failed to delete';
        }   

    }else{
        echo "Query is NULL";

        exit();
    }




}
else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "<p>The page that you have requested could not be found.</p>";


    exit();
}

}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "<p>The page that you have requested could not be found.</p>";

    echo "<a href= '../login.php'>";
    echo "Please Login to open this page.";
    echo "</a>";
    exit();
}
?>