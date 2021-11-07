<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medicine</title>
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
#search {
  margin-left: 120px;
}
.button{
  margin-left: 10px;
}
</style>
<script type="text/javascript">
	$(document).ready(function()
	{
     $('[data-toggle="tooltip"]').tooltip();
	});
</script>
</head>
<?php
      require_once "Mconfig.php";
      $sql="select * from medicine";
?>
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
  				<h2 class="pull-left"><strong>MEDICINES</strong></h2>
          <a href="main_menu.php" class="btn btn-success pull-left button"><i class="fa fa-reply" aria-hidden="true"></i> 
          Back</a>
          <a href="Msearch.php" class="btn btn-success pull-right " id="search">Search</a>
  				<a href="Mupdate.php" class="btn btn-success pull-right">Update </a> 
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
               	  	<th>Mg</th>
               	  	<th>Retail_Price</th>
                    <th>Used_for</th>
					<th>Side_effects</th>
					<th>ACTION</th>
               	  </tr>
               </thead>
               <tbody>

               <?php while($row=$result->fetch_array()) :?>              	
               	<tr>
               		<td> <?php echo $row['id'] ?></td>
               		<td> <?php echo $row['Name'] ?></td>
               		<td> <?php echo $row['Mg'] ?></td>
                    <td> <?php echo $row['Retail_Price'] ?></td>
                    <td> <?php echo $row['Used_for'] ?></td>
					<td> <?php echo $row['Side_Effects'] ?></td>
					<td>
						 <a href="Mconfig.php?delete=<?php echo $row['id'] ?>" title='delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
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