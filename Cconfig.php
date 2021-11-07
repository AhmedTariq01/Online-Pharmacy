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
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	//mysqli_query($db, "DELETE FROM customer WHERE id=$id");
	$mysqli->query("DELETE from customer where id=$id") or die($msqli -> error());
	$_SESSION['message'] = "Address deleted!"; 
	header('location: Cindex.php');
	}
?>