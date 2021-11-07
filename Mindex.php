<?php
require_once "Mconfig.php";
if(isset($_POST['Submit'])){
    $Name = $_POST['Name'];
    $Mg  = $_POST['Mg'];
    $Retail_Price = $_POST['Retail_Price'];
    $Used_for = $_POST['Used_for'];
    $Side_Effects = $_POST['Side_Effects'];
    // echo $Retail_Price;
   

  $sql = "INSERT INTO `medicine`(`Name`, `Mg`, `Retail_Price`, `Used_for`, `Side_Effects`) VALUES ('$Name', '$Mg', '$Retail_Price', '$Used_for', '$Side_Effects')";
    $result = $mysqli -> query($sql);

    if($result){
        header("Location: Vcreate.php?name=$Name&mg=$Mg");
        exit();
    }
    else{
        
        echo " not workking: ". $mysqli->error;
    }
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add_Medicine</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <style type="text/css">
    body{
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
form
{
  background-image: linear-gradient(-90deg, brown,orange,pink);
}
    </style>
</head>

<body>
    <div class="row register-form">
        <div class="col-md-8 offset-md-2" id="Page">
        <!-- <?php
            if (isset($_GET['DataInserted'])){
                echo "<h1>HelloUmer</h1>";
            }
        ?> -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="custom-form" id="form">
                <h1>Add Medicine</h1>
                <div class="form-row form-group">

                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Name </label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" name="Name" type="text">
                    </div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Mg</label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" name="Mg" type="text">
                    </div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Retail_Price</label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" name="Retail_Price" type="text">
                    </div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Used_for</label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" name="Used_for" type="text">
                    </div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Side_Effects</label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" name="Side_Effects" type="text">
                    </div>
                </div><button class="btn btn-light submit-button" name="Submit" value="Add" type="submit">Submit&nbsp;</button>
                <a href="main_menu.php" class="btn btn-success" id="search"><i class="fa fa-reply" aria-hidden="true"></i>Back&nbsp;</a>
                </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>