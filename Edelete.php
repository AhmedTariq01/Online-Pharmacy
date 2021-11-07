<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
      <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{  
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</head>
<?php 
     require_once "Econfig.php";
     $id=$_GET['id'];
     $sql="Delete FROM employee 
           WHERE id='$id'";
?>
<body id="grad">
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="wrapper">
            <div class="page-header clearfix">
        <center>
        <form class="form-horizontal" id="form" >
            <?php
           if($result=$mysqli->query($sql))
            ?>
            <?php
               $Delete=$mysqli->query($sql);
               if($mysqli->query($sql))
               header('location: Eindex.php')
              
            ?>
         </form>
     </center>
            </div>      
            </div>
            </div>
            </div>  

</body>
</html>