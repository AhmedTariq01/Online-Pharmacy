<!DOCTYPE html>
<html>
<head>
    <title>Read data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>
    <style type="text/css">
        .wrapper
    {
      width:650px;
      margin: 0 auto;
    }
    .page-header h2
    {
        margin-top: 0;
    }
           #grad {
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
#form {
        margin-top: 150px;

}
    </style>
</head>
<?php 
     require_once "Cconfig.php";
     $id=$_GET['read'];
     $sql="select * from customer where id=$id";
?>
<body id="grad">
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="wrapper">
            <div class="page-header clearfix">
        <center>
        <form class="form-horizontal" id="form" >
       <div class="page-header clearfix">
          <a href="Cindex.php" class="btn btn-success "> OK  </a>
        </div>
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
                <label class="col-md-3 control-label">Address</label>
                <div class="col-md-8">
              <output>
                <?php
                  echo $row["address"];
                ?>
              </output>
               </div>
               </div>
               <div class="form-group">
                <label class="col-md-3 control-label">City:</label>
                <div class="col-md-8">
                <output>
                <?php
                  echo $row["city"];
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