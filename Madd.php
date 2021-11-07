<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0.minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Search</title>

  <!--Fontawesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <!--Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>

    <!--Copy 
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      -->
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
        #grad 
   {
          background-color: #D9CEB2;
  }
 

    </style>
</head>
<?php

//start session
session_start();

if(isset($_POST['addbtn']))
{
  $Pid=$_POST['product_id'];
  print_r($Pid);
 if(isset($_SESSION['cart']))
 {
  print_r($_SESSION['cart']);
 }else
 {
  $productid_Array = array(
    'item_id' => $Pid
   );

  $_SESSION['cart'][0]=$productid_Array;
  print_r($_SESSION['cart']);
 }
}
?>
</html>
<body id="grad">
       <div class="wrapper">
        <div class="container-fluidd">
          <div class="row">
            <div class="col-md-12">
              
              
                <div class="page-header clearfix ">
                <h1><strong>Search Medicine</strong></h1>
                  </div>
                  
                  <input type="text" id="searchMed" class="form-control" placeholder="Enter Med Name">
                  <div id="searchResult">
                    
                 </div>
                 <div id="outputdiv">
                   
                 </div>
 
            </div>
          </div>
        </div>
       </div>

  
     </body>

     <script>
          window.onload = loadAll;

      function loadAll(){
          $.ajax({
                url: "functions/searchMed.php",
                method: "post",
                data: {name:''},
                dataType: "text",
                success:function(data){
                  $("#searchResult").html(data);
                }
          });

      }

        $(document).ready(function(){
          $("#searchMed").keyup(function(){
            var text = $(this).val();
            //alert(text)
            if (text != ''){
              $.ajax({
                url: "functions/searchMed.php",
                method: "post",
                data: {name:text},
                dataType: "text",
                success:function(data){
                  $("#searchResult").html(data);
                }
              });
            }
            else{
              loadAll();
            }
          });
        });
     </script>
</html>