<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;
 background-image: url('image.jpg');}
* {box-sizing: border-box;}



/* Position the navbar container inside the image */
.container {
  position: absolute;
  margin: 20px;
  width: auto;
}





/* The navbar */
.topnav {
  overflow: hidden;
  background-color: #555151;
}

/* Navbar links */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}
h1{
font-size:48px;
}
.active {
  background-color: #4CAF50;
}
.selec{
  width: 160px;
  height: 50px;
  background: #555151;
  color: #fff;
  font-size: 17px;
}
</style>
</head>
<body>

<h1><B>PHARMACY MENU</B></h1>
<div>
  <div class="container">
    <div class="topnav">
	  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i>LOGOUT</a>
      <a href="Mview.php">MEDICINE</a>
      <a href="Cindex.php">CUSTOMER</a>
      <a href="Vindex.php">VENDOR</a>
      <a href="Eindex.php">EMPLOYEE</a>
	  <a href="reports/main_report.php"><i class="fa fa-file-text" aria-hidden="true"></i> REPORTS</a>
	  <a href="BILL.php">BILL</a>
    <a href="Mindex.php">PURCHASE MEDICINE</a>
    <a href="more.php">MORE</a>
    </div>
  </div>
</div>
</body>
</html>
