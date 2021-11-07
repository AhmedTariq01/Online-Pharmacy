<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
	    	#grad {
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
.button{
  margin-left: 16px;
}
    </style>
</head>
<?php
     require_once "Vconfig.php";
     if (isset($_POST['search'])) 
     	$id=$_POST['name'];
     	$sql="select * from vendor where name like '%{$id}%'";
?>
</html>
<body id="grad">
       <div class="wrapper">
       	<div class="container-fluidd">
       		<div class="row">
       			<div class="col-md-12">
       				<form action="Vsearch.php" method="post">
       					<div class="page-header clearfix">
       					<input type="text" name="name" placeholder="Search Vendor" class="form-container">
                <a href="Vindex.php" class="btn btn-success pull-right " ><i class="fa fa-reply" aria-hidden="true"></i>  Back </a>
       					<input type="submit" name="search"  value="Search" class="btn btn-success button ">
                
       			    	</div>
       				  <table class="table table-bordered table-striped">
       				  	<thead>
       				  	<tr>
       				  		<th>ID</th>
       				  		<th>Name</th>
       				  		<th>Phone</th>
       				  		<th>Address</th>
       				  		<th>Action</th>
       				  	</tr>
       				  </thead>
       				  <tbody>
       				  	<?php
                      if($result=$mysqli->query($sql))
                       {
                     if($result->num_rows>0): 
                       ?>
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

       				</form>	

       			</div>
       		</div>
       	</div>
       </div>

</html>