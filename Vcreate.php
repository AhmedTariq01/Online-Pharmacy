 <?php          
 require_once "Vconfig.php";               
//Define variables and initialize with empty values
   $mid=$quantity=$amount=$date=$name = $address = $phone = "";
$quantity_err=$amount_err=$date_err=$name_err = $address_err = $phone_err = "";
 
//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    $input_name =trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    // Validate salary
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter phone Number.";    
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter in this format 03*********.";
    } else{
        $phone = $input_phone;
    }
   
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";    
    } else{
        $address = $input_address;
    }
   
   // validate Amount
   $input_amount = trim($_POST["Tamount"]);
   $input_a=(int)$input_amount;
    if($input_a!=0 && $input_a<0)
    {
        $amount_err = "Please enter correct amount";    
    } else{
        $input_amount=(string)$input_a;
        $amount = $input_amount;
    }

    //validate quantity
     $input_quantity = trim($_POST["quantity"]);
   $input_q=(int)$input_quantity;
    if($input_q!=0 && $input_q<0)
    {
        $quantity_err = "Please enter correct amount";    
    } else{
        $input_quantity=(string)$input_q;
        $quantity = $input_quantity;
    }

    //Validate Date 
    $input_date =trim($_POST["Date"]);
    if(empty($input_date)){
        $date_err = "Enter Date ";
    } else{
        $date = $input_date;
    }

    //Validate Id 
    $input_id =trim($_POST["Mid"]);
    if(!empty($input_id)){
       $mid=$input_id;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($phone_err) && empty($date_err) && empty($amount_err) && empty($quantity_err)){
        // Prepare an insert statement
        $vsql = "INSERT INTO `vendor`( `name`, `phone`, `address`,`mid`) VALUES ('$name','$phone','$address','$mid')";
        $psql = "INSERT INTO purchaseorder (po_date, toat_amount, quantity,mid) VALUES ('$date', '$amount', '$quantity','$mid')";
         $result1 = $mysqli -> query($vsql);
         $result2 = $mysqli -> query($psql);

    if($result1 && $result2 ){
        header("Location: purchasedetails.php?d=$date&t=$amount&q=$quantity&id=$mid");
    }
    else{
        
        echo " not workking: ". $mysqli->error;
    }
    }  
    // Close connection
    $mysqli->close();
}
?>
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
$Ename=$_GET['name'];
$Emg=$_GET['mg'];
$sql="select * from medicine where Name='$Ename' AND Mg='$Emg'";
        if($result=$mysqli->query($sql))
        {
            while($row=$result->fetch_array()){
                $id=$row['id'];
            }
        }
?>
<body id="grad">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add Vendor details</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">

                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                    
                        <h2>Add purcahse order details</h2>
                            <label class="form-group">Medicine ID</label>  
                            <input type="text" name="Mid" class="form-control" value="<?php   echo $id; ?>">
                          <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="Date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                            <label>Total Amount</label>
                            <input type="text" name="Tamount" class="form-control" value="<?php echo $amount; ?>">
                            <span class="help-block"><?php echo $amount_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Quantity</label>
                            <input type="text" name="quantity" class="form-control" value="<?php echo $quantity; ?>">
                            <span class="help-block"><?php echo $quantity_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-success" value="Submit">
                        <a href="main_menu.php" class="btn btn-default">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
