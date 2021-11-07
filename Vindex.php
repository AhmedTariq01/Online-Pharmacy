<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vendor</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
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
	table tr td:last-child a
	{
		margin-right: 15px;
	}
	    	.grad {
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
#search {
  margin-left: 120px;
}
   .black
    {
       background-color: #000000;
       color:  #662200;
    }
</style>
<script type="text/javascript">
  function toggleClass(el){
     if(el.className=="black")
     {
      el.className="grad";

     }
     else
     {
      el.className="black";
     }  
   }
</script>

</head>
<?php

     // start session

    
      require_once "Vconfig.php";
      $sql="select * from Vendor";
?>
<body class="grad">
	<?php
            if (isset($_SESSION['message'])):
	?>
	<div class="alert alert-<?=$SESSION['msg_type']?>">

		<?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
		?>
	</div>
    <?php endif ?>
<div class="wrapper">
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="page-header clearfix">
  				<h2 class="pull-left"><strong>VENDOR</strong></h2>
         
          <a href="Vsearch.php" class="btn btn-success pull-right" >Search Vendor</a>
  				<a href="main_menu.php" class="btn btn-success " id="search"><i class="fa fa-reply" aria-hidden="true"></i>Back</a>
  			</div>
  		</div>
  		<?php if($result=$mysqli->query($sql))
  		{
  			if($result->num_rows>0): ?>
  			<table class="table table-bordered table-striped">
               <thead>
               	  <tr>
               	  	<th>#</th>
               	  	<th>Name</th>
               	  	<th>Phone</th>
               	  	<th>Address</th>
               	  	<th>Action</th>
               	  </tr>
               </thead>
               <tbody>
               <?php while($row=$result->fetch_array()) :?>              	
               	<tr>
               		<td> <?php echo $row['id'] ?></td>
               		<td> <?php echo $row['name'] ?></td>
               		<td> <?php echo $row['phone'] ?></td>
               		<td> <?php echo $row['address'] ?></td>
               		<td>
               			
               			<a href='Vread.php?id=<?php echo $row['id'] ?>' title='view' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
               		  
               		  
               			<a href='Vupdate.php?update=<?php echo $row['id'] ?>' title='update' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
           
               			<a href="Vconfig.php?delete=<?php echo $row['id'] ?>" title='delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>

               		</td>
               	</tr>
               <?php endwhile ?>
               </tbody>
  			</table>
  			<?php $result->free();?>
  			<?php else: ?>
  			<p class="lead"><em>No Record found to display</em></p>
  		    <?php endif ?>
            <?php 
            }
            else
            {
            	echo "error: could not execute 	";
            }
            $mysqli->close();
            ?>
           </div>
          </div>
         </div>
        </div>
</body>
</html>