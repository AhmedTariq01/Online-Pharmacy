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
    body{
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
#form {
        margin-top: 10px;

}
    </style>
</head>
<?php
     require_once "Mconfig.php";
     if (isset($_POST['search'])) 
     	$id=$_POST['id'];
     	$sql="select * from medicine where id=$id";
?>

<?php


require_once "Mconfig.php";
if(isset($_POST['update'])){
    $id= $_POST['id'];
    $Name = $_POST['Name'];
    $Mg  = $_POST['Mg'];
    $Retail_Price = $_POST['Retail_Price'];
    $Used_for = $_POST['Used_for'];
    $Side_Effects = $_POST['Side_Effects'];
    // echo $Retail_Price;
   

  $sql = "UPDATE `medicine` SET Name='$Name', Mg='$Mg', Retail_Price='$Retail_Price', Used_for='$Used_for', Side_Effects='$Side_Effects' where id=$id";
     $mysqli -> query($sql);

        header("Location: main_menu.php");
  
 
}
?>

<body id="grad">
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="wrapper">
            
        <center>
        <form class="form-horizontal" id="form" action="Mupdate.php" method="POST" > 
          <div class="page-header clearfix">
          <input type="text" name="id" placeholder="Update Medicine" class="form-container">
          <a href="Mview.php" class="btn btn-default pull-left">Cancel</a>
         
          <input type="submit" name="search" value="search" class="btn btn-success pull-right">
          
        </div>
          <?php
           if($result=$mysqli->query($sql))
             {
           if($result->num_rows>0): 
          ?>
          <?php while($row=$result->fetch_array()) :?>   
              <div class="form-group">
              </div>
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
              <div class="form-group" >
                <label class="col-md-3 control-label">Name:</label>
                <div class="col-md-8">
               <input type="text" name="Name" value="<?php echo $row['Name']; ?>" class="form-control">

              </div> 
               </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Mg:</label>
                <div class="col-md-8">
             <input type="text" name="Mg" value="<?php echo $row['Mg']; ?>" class="form-control">

               </div>
               </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Retail_Price:</label>
                <div class="col-md-8">
                <input type="text" name="Retail_Price" value="<?php echo $row['Retail_Price']; ?>" class="form-control"> 
          </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Used_for:</label>
                <div class="col-md-8">
                <input type="text" name="Used_for" value="<?php echo $row['Used_for']; ?>" class="form-control"> 
          </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Side_Effects:</label>
                <div class="col-md-8">
                <input type="text" name="Side_Effects" value="<?php echo $row['Side_Effects']; ?>" class="form-control"> 
          </div>
              </div>
              <input type="submit" name="update" value="update" class="btn btn-success center" >
            <?php endwhile ?>
            <?php $result->free();?>
        <?php else: ?>
        <p class="lead"><em>No Record found to display</em></p>
          <?php endif ?>
            <?php 
            }
            else
            {
              echo " Please enter the ID of the medicine you want to update  ";
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