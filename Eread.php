<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Data</title>
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
                  #grad {
  background-image: linear-gradient(-90deg, brown,orange,pink);
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
     $sql="select * from employee where id=$id";
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
               while($row=$result->fetch_array()):
            ?>    
              <div class="form-group">
                <label class="col-md-3 control-label">ID:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["id"];
                ?>
              </output> 
          </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label">Name:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["name"];
                ?>
              </output>
              </div> 
               </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Gender:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["gender"];
                ?>
              </output> 
          </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Date of Birth:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["dob"];
                ?>
              </output>
               </div>
               </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Address:</label>
                <div class="col-md-8">
                <output>
                <?php
                  echo $row["address"];
                ?>
              </output> 
          </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">CNIC:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["cnic"];
                ?>
              </output>
               </div>
               </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Phone Number:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["phone"];
                ?>
              </output>
               </div>
               </div>
                <div class="form-group">
                <label class="col-md-3 control-label">Qualification:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["qualification"];
                ?>
              </output>
               </div>
               </div>
                <div class="form-group">
                <label class="col-md-3 control-label">Date of joining:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["doj"];
                ?>
              </output>
               </div>
               </div>
                <div class="form-group">
                <label class="col-md-3 control-label">Salary:</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["salary"];
                ?>
              </output>
               </div>
               </div>
            <?php endwhile ?>
         </form>
     </center>
            </div>      
            </div>
            </div>
            </div>  

</body>
</html>