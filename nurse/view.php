<?php 

session_start();

if(isset($_SESSION['userID']) && $_SESSION['regisType'] == "N"){

    include ('../CSS.php');
    include ('header.php');

    if(isset($_GET["type"])){
       $type = $_GET["type"]; 
   }
   ?>


   <html>
   <head>
    <title id = "title">View</title>
</head>

<body>
    <div class="createUser">
        <form>
            <span><p class="big">View member </p></span>
            <label>Register Type:</label>
            <select name="type" onchange="this.form.submit()">

                <option value="" disabled selected>--select--</option>
                <option value="C" <?php echo (isset($type)&&$type=="C" ? 'selected':''); ?>>Client</option>
                <option value="P" <?php echo (isset($type)&&$type=="P" ? 'selected':''); ?>>Patient</option>





            </select>
        </form>
    </div>
    <?php
    if(isset($_GET["type"])){
       $type = $_GET["type"];

       switch ($type) {

        case 'U':
        include 'getAllData/getAllUsers.php';
        break;



        case 'P':
        include 'getAllData/getAllPatients.php';
        
        break;
        case 'C':
        include 'getAllData/getAllClients.php';

        break;

        default:
        # code...
        break;
    }




}
?>
</body>
</html>



<?php 
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