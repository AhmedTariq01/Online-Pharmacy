<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pharmacy');
/*OOP */
/* Attempt to connect to MySQL database */
$mysqli=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 $id=0;
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);


}

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM Vendor WHERE id=$id")or die($mysqli->error());

	 $_SESSION['message']="Record has been deleted";
     $_SESSION['msg_type']="danger";
     header("location: Vindex.php");
}

    if(isset($_POST['update']))
    {
      $id=$_POST['id'];
      $name=$_POST['name'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
 
       $mysqli->query("UPDATE Vendor SET name='$name', phone='$phone', address='$address' where id=$id") or die($mysqli->error());
    
       header("location: Vindex.php");

    }

?>