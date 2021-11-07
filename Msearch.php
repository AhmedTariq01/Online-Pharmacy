<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
	    	    body{
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
.button{
 margin-right: 10px;
}
    </style>
</head>
<?php
     require_once "Mconfig.php";
     if (isset($_POST['search'])) 
     	$id=$_POST['id'];
     	$sql="select * from medicine where id=$id";
?>
</html>
<body id="grad">
       <div class="wrapper">
       	<div class="container-fluidd">
       		<div class="row">
       			<div class="col-md-12">
       				<form action="Msearch.php" method="post">
       					<div class="page-header clearfix">
       					<input type="text" name="id" placeholder="Search Medicine" class="form-container pull-left">
       					<input type="submit" name="search" class="btn btn-success button pull-right">
                <a href="Mview.php" class="btn btn-success pull-right button "> Back </a> 
       			    	</div>
       				  <table class="table table-bordered table-striped">
       				  	<thead>
       				  	<tr>
       				  		<th>ID</th>
       				  		<th>Name</th>
       				  		<th>Mg</th>
       				  		<th>Retail_Price</th>
       				  		<th>Used_for</th>
                            <th>Side_Effects</th>
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
               	        	<td> <?php echo $row['Name'] ?></td>
               		        <td> <?php echo $row['Mg'] ?></td>
                            <td> <?php echo $row['Retail_Price'] ?></td>
                            <td> <?php echo $row ['Used_for']?> </td>
                            <td> <?php echo $row ['Side_Effects']?></td>
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