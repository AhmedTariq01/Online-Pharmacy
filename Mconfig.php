<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pharmacy');
/*OOP */
/* Attempt to connect to MySQL database */
$mysqli=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM medicine WHERE id=$id");

	//  $_SESSION['message']="Record has been deleted";
    //  $_SESSION['msg_type']="danger";

     header("location: Mview.php");
}

      function getData(){
      $mysqli=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $sql = "SELECT * FROM medicine";

        $result = $mysqli->query($sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

?>

