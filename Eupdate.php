<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
                #grad {
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
    </style>
</head>
 <?php
// Include config file
require_once "Econfig.php";
     $id=$_GET['id'];
$showQuery="SELECT * FROM employee
WHERE id='$id'";
 
//Processing form data when form is submitted

    if(isset($_POST['update']))
    {
      $id=$_POST['id'];
      $name=$_POST['name'];
      $gender=$_POST['gender'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
      $salary=$_POST['salary'];
      $qualification=$_POST['qualification'];
      $cnic=$_POST['cnic'];
      $dob=$_POST['dob'];
      $doj=$_POST['doj'];
       $mysqli->query("UPDATE employee SET name='$name', gender='$gender',dob='$dob' ,address='$address', cnic='$cnic', phone='$phone', qualification='$qualification', doj='$doj', salary='$salary' where id=$id") or die($mysqli->error());
    
       header("location: Eindex.php");

    }
?>
<body id="grad">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="Eupdate.php" method="POST">
                         <?php
                            if($update=$mysqli->query($showQuery)){   
                                if($update->num_rows>0):?>
                                   <?php 
                            while($row=$update->fetch_array()): 

                         ?>
                         <input type="hidden" name="id" value="<?php echo $row['id'] ; ?>">
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ; ?>">
                            
                        </div>
                        <div class="form-group ">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" value="<?php echo $row['gender']; ?>">
                           
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $row['address']; ?></textarea>
                          
                        </div>
                        <div class="form-group">
                            <label>CNIC</label>
                            <input type="text" name="cnic" class="form-control" value="<?php echo $row['cnic']; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Phone number</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
                        </div>
                        <div class="form-group ">
                            <label>Qualification</label>
                            <textarea name="qualification" class="form-control"><?php echo $row['qualification']; ?></textarea>
                           
                        </div>
                        <div class="form-group ">
                            <label>Date of joining</label>
                            <input type="date" name="doj" class="form-control" value="<?php echo $row['doj']; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $row['salary']; ?>">
                            
                        </div>
                        <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        <a href="Eindex.php" class="btn btn-default">Cancel</a>
                        <?php
                          endwhile
                       ?>
                       <?php
                        $update->free();
                       ?>
                       <?php
                          else:
                       ?>
                       <p class="lead" > 
                         <em> 
                             no record found to display 
                         </em>  
                       </p>
                       <?php
                        endif
                       ?>
                      <?php
                        }
                        else{

                            echo "error";
                        } 
                        $mysqli->close();
                      ?>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html> 