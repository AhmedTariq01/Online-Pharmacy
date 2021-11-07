<?php
   require_once "Vconfig.php";
   $pdate=$_GET['d'];
   $pamount=$_GET['t'];
   $pquantity=$_GET['q'];
   $mid=$_GET['id'];
   $sql="select * from purchaseorder where po_date='$pdate' AND toat_amount='$pamount' AND quantity='$pquantity'";
        if($result=$mysqli->query($sql))
        {
            while($row=$result->fetch_array()){
                $id=$row['pid'];
            }
        }
   $psql="INSERT INTO po_details (mid,pid) VALUES ('$mid','$id')";
   $mysqli->query($psql) or die ($mysqli->error);
   header("location: Mindex.php");
?>