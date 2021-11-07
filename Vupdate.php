<!DOCTYPE html>
<html>
<head>
    <title>Update Vendor</title>
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
        margin-top: 10px;

}
    </style>
</head>
<?php
   require_once "Vconfig.php";
   $id=$_GET['update'];
   $sql="select * from Vendor where id=$id";

?>
<body id="grad">
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="wrapper">
            
        <center>
        <form class="form-horizontal" id="form" action="Vupdate.php" method="POST" > 
          <div class="page-header clearfix">
          <a href="Vindex.php" class="btn btn-default pull-left">Cancel</a>

          <input type="submit" name="update" class="btn btn-success pull-right">
        </div>
          <?php
           if($result=$mysqli->query($sql))
             {
           if($result->num_rows>0): 
          ?>
          <?php while($row=$result->fetch_array()) :?>   
              <div class="form-group">
              
                <div class="col-md-8">
               <input type="hidden" name="id" value=" <?php echo $row['id'];?>" class="form-control">
               </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label">Name:</label>
                <div class="col-md-8">
               <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
         
              </div> 
               </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Phone:</label>
                <div class="col-md-8">
             <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
 
               </div>
               </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Address:</label>
                <div class="col-md-8">
                <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control"> 
                
          </div>
              </div>
            <?php endwhile ?>
            <?php $result->free();?>
        <?php else: ?>
        <p class="lead"><em>No Record found to display</em></p>
          <?php endif ?>
            <?php 
            }
            else
            {
              echo "error: could not execute  ";
            }
            $mysqli->close();
            ?>
         </form>
     </center>
            </div>      
            </div>
            </div>
            </div>  
</body>
</html>


?>