 <?php
// Include config file
require_once "Econfig.php";

//Define variables and initialize with empty values
$name = $gender = $dob = $address = $cnic = $phone = $qualification = $doj = $salary = "";
$name_err = $gender_err = $dob_err = $address_err = $cnic_err = $phone_err = $qualification_err = $doj_err = $salary_err = "";
 
//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //name
    $input_name =trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    //gender
    $input_gender =trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Enter Your gender.";
    } elseif(!($input_gender=='male' || $input_gender=='female' || $input_gender=='other' || $input_gender=='Male' || $input_gender=='OTHER' || $input_gender=='FEMALE' )){
        $gender_err = "Please enter male ,Female or Other";
    } else{
        $gender = $input_gender;
    } 
     //DateOfBirth
    $input_dob =trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Emter Date of birth.";
    } else{
        $dob = $input_dob;
    }
    //address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    //cnic
    $input_cnic = trim($_POST["cnic"]);
    if(empty($input_cnic)){
        $cnic_err = "Please enter cnic number.";     
    }else{
        $cnic = $input_cnic;
    }
    //phone number
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter phone number.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter correct phone number.";
    } else{
        $phone = $input_phone;
    }
    //qualification
    $input_qualification = trim($_POST["qualification"]);
    if(empty($input_qualification)){
        $qualification_err = "Please enter qualification.";     
    } else{
        $qualification = $input_qualification;
    }
    //date of joining
    $input_doj =trim($_POST["doj"]);
    if(empty($input_doj)){
        $doj_err = "Emter Date of joining.";
    } else{
        $doj = $input_doj;
    }
    //salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($gender_err) && empty($dob_err) && empty($address_err) && empty($cnic_err) && empty($phone_err) && empty($qualification_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employee (name, gender, dob, address,cnic, phone, qualification, doj, salary) VALUES (?,?,?,?,?,?,?,?,?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $param_name, $param_gender,$param_dob, $param_address, $param_cnic,$param_phone, $param_qualification,$param_doj,
             $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_gender = $gender;
            $param_dob = $dob;
            $param_address = $address;
            $param_cnic= $cnic;
            $param_phone=$phone;
            $param_qualification=$qualification;
            $param_doj=$doj;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: Eindex.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();
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
<body id="grad">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>">
                            <span class="help-block"><?php echo $gender_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
                            <span class="help-block"><?php echo $dob_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cnic_err)) ? 'has-error' : ''; ?>">
                            <label>CNIC</label>
                            <input type="text" name="cnic" class="form-control" value="<?php echo $cnic; ?>">
                            <span class="help-block"><?php echo $cnic_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone number</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($qualification_err)) ? 'has-error' : ''; ?>">
                            <label>Qualification</label>
                            <textarea name="qualification" class="form-control"><?php echo $qualification; ?></textarea>
                            <span class="help-block"><?php echo $qualification_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($doj_err)) ? 'has-error' : ''; ?>">
                            <label>Date of joining</label>
                            <input type="date" name="doj" class="form-control" value="<?php echo $doj; ?>">
                            <span class="help-block"><?php echo $doj_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Eindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>