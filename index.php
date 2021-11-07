<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		body
		{
			margin : 0;
			padding: 0;
			font-family: sans-serif;
			background: url(login3.jpg);
			background-size: cover;
		}
		.box{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width: 350px;
			padding: 40px;
			background: rgba(0,0,0,.5);
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0,0,0,.4);
			border-radius: 10px;
		}
		.box h2
		{
			margin: 0 0 30px;
			padding: 0;
			color: #fff;
			text-align: center;
		}
		.box .inputbox
		{
			position: relative;
		}
		.box .inputbox input
		{
			width: 100%;
			padding: 7px 0;
			font-size: 12px;
			color: #fff;
			letter-spacing: 1px;
			margin-bottom: 30px;
			border: none;
			border-bottom: 1px solid #fff;
			outline: none; 
			background: transparent;
			border-radius: 4px;
		}
		.box .inputbox label
		{
			position: absolute;
			top: 0;
			left: 0;
			padding: 10px 0;
			font-size: 16px;
			color: #fff;
			pointer-events: none;
			transition: .5s;
		}
		.box .inputbox input:focus ~ label,
		.box .inputbox input:valid ~ label
		{
          top: -22px;
          left: 0;
         0 color: #03a9f4;
          font-size: 10px;
		}
		.box input[type="submit"]
		{
			background: transparent;
			border: none;
			outline: none;
			color: #fff;
			background: #03a9f4;
			padding: 10px 20px;
			cursor: pointer;
			border-radius: 5px; 
		}
	</style>
</head>
<?php
require_once "Vconfig.php";
if (isset($_POST['signin'])) {

$username=$_POST["username"];
$pass=$_POST["password"];
$sql="select * from admin";
           if($result=$mysqli->query($sql)) {
	        while($row=$result->fetch_array())
	        {
	        	if ($row['username']==$username && $row['password']==$pass) {
                  header("location: main_menu.php");
	        	}
	        	else
	        	{
	        		echo "Wrong password or username";
	        	}
	        }
          }
          else
          {
          	echo "Error";
          }
      }
?>
<body>
     <div class="box" >
     	<h2>Login</h2>
     	<form action="index.php" method="POST">
     		<div class="inputbox">
     			<input type="text" name="username" required="">
     			<label>UserName</label>
     		</div>
     		<div class="inputbox">
     			<input type="password" name="password" required="">
     			<label>Password</label>
     		</div>
     		<input type="submit" name="signin" value="Login">
     	</form>
     </div>
</body>
</html>
