<!doctype html>
<html lang="en">

<head>
    <title>PHP CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style type="text/css">
  #grad{
     background-image: linear-gradient(-90deg, brown,orange,pink); 
    
  }
  .tr{
      color: #000000;
     }
  .tr2
  {
    color: #8B008B;
  }
  .pink{
    background:  #000000;
    color: #fff;
  }
  .outputC{
      color: #8B008B;
      font-size: 30px;
  }
</style>
<body id="grad">
 
 <a name="top"><div></div></a>

<header>
    <nav class="pink">
        <a href="reports/main_report.php" class="navbar-brand">
            <h2 class="px-5">
                <i class="fa fa-reply" aria-hidden="true"></i>Back
            </h2>
        </a>
        <a href="#vendor" class="navbar-brand">
            <h4 class="px-5">
            Vendor Report
            </h4>
        </a>
        <a href="#employee" class="navbar-brand">
            <h4 class="px-5">
            Employee Report
            </h4>
        </a>
         <a href="#customer" class="navbar-brand">
            <h4 class="px-5">
            Customer Report
            </h4>

        </a>
        <a href="#Total" class="navbar-brand">
            <h4 class="px-5">
             Total
            </h4>

        </a>
    </nav>
</header>


    <div class="container">
      
        <?php
         require_once "Vconfig.php";
         $vsql="select * from Vendor";
        $result = $mysqli->query("Select * from medicine") or die($mysqli->error);
         $esql="select * from employee";
          $csql="select * from customer";
          $employeeC=0;
          $medicineC=0;
          $vendorC=0;
          $customerC=0;
        //pre_r($result);
        //    pre_r($result->fetch_assoc());

        ?>

        <div class="row justify-content-center">
        <form class="text-white mt-3 font-weight-bold" action="processProject.php" method="POST">
        <div class="row justify-content-center">
          <div>
            <h1 class="tr">Medicine Report</h1>
          </div>
            <table class="table text-white mt-5">
                <thead>
                    <tr class="tr"> 
                        <th>Name</th>
                        <th>Retail Price</th>
                        <th>No of Mg's</th>
                        <th>Used_for</th>
                        <th>Side_Effects</th>
                    </tr>
                </thead>

                <?php
                while ($row = $result->fetch_assoc()) :  
                    $medicineC++;
                  ?>
                    <tr class="tr2">
                        <td> <?php echo $row['Name']; ?></td>
                        <td> <?php echo $row['Retail_Price']; ?></td>
                        <td> <?php echo $row['Mg']; ?></td>
                        <td> <?php echo $row['Used_for']; ?></td>
                        <td> <?php echo $row['Side_Effects']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </table>
                   <div><a name="vendor"></a><h1 class="tr">Vendor Report</h1></a></div>
                  <table class="table text-white mt-5">
                <thead>
                    <tr class="tr"> 
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                    
                    </tr>
                </thead>
            <?php
           if($vresult=$mysqli->query($vsql))
             ?>
            <?php
               while($vrow=$vresult->fetch_array()):
                $vendorC++;
             ?>  
                    <tr class="tr2">
                        <td> <?php echo $vrow['name']; ?></td>
                        <td> <?php echo $vrow['phone']; ?></td>
                        <td> <?php echo $vrow['address']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </table>
                 <div>
                   <a name="employee"><h1 class="tr">Employee Reports</h1></a>
                    <a href="javascript:Ecount" title='update' data-toggle='tooltip'>
                                <span class='glyphicon glyphicon-plus'></span></a>
                   <div id="#E1"></div>
                 </div>
                <table class="table text-white mt-5">
                <thead>
                    <tr class="tr"> 
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>CNIC</th>
                        <th>Phone</th>
                        <th>Qualification</th>
                        <th>Date of Joining</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                 <?php
           if($eresult=$mysqli->query($esql))
             ?>
                <?php
                while ($erow = $eresult->fetch_assoc()) : 
                  $employeeC++;
                  ?>
                    <tr class="tr2">
                        <td> <?php echo $erow['name']; ?></td>
                        <td> <?php echo $erow['gender']; ?></td>
                        <td> <?php echo $erow['dob']; ?></td>
                        <td> <?php echo $erow['address']; ?></td>
                        <td> <?php echo $erow['cnic']; ?></td>
                        <td> <?php echo $erow['phone']; ?></td>
                        <td> <?php echo $erow['qualification']; ?></td>
                        <td> <?php echo $erow['doj']; ?></td>
                        <td> <?php echo $erow['salary']; ?></td>

                    </tr>
                <?php
                 endwhile; 
                 ?>
                </table>
                <div>
                 <a name="customer"> <h1 class="tr">
                    Customer Report
                  </h1>
                </a>
                </div>
                 <table class="table text-white mt-5">
                <thead>
                    <tr class="tr"> 
                        <th>Name</th>
                        <th>Address</th>
                        <th>city</th>
                    
                    </tr>
                </thead>

                
            <?php
           if($cresult=$mysqli->query($csql))
             ?>
            <?php
               while($crow=$cresult->fetch_array()):
                $customerC++;
             ?>  
                    <tr class="tr2">
                        <td> <?php echo $crow['name']; ?></td>
                        <td> <?php echo $crow['address']; ?></td>
                        <td> <?php echo $crow['city']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </table>
              </div>
              </from>
            </div>
            <hr>
            <div class="container">
              <div class="row">
                  <div>
                 <a name="Total"><h1>Total Number of Records</h1></a>
                  <hr>
              
                  <output class="outputC">Toatal Number of Vendors="<?php echo $vendorC; ?>"</output>
                  <hr>
                  <output class="outputC">Medicine in Stock="<?php echo $medicineC; ?>"</output>
                  <hr>
                   <output class="outputC">Total Number of Employees="<?php echo $employeeC; ?>"</output>
                   <hr>
                   <output class="outputC">Total Number of Customer="<?php echo $customerC; ?>"</output>
                   <hr>
              </div>
              </div>
            </div>
</body>
</html>









