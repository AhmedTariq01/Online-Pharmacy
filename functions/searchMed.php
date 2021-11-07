<?php 
require '../Mconfig.php';

$output='';


$name=$_POST['name'];
//echo $name;
$sql="select * from medicine where Name like '%{$name}%'";

$result = $mysqli -> query($sql);

$output .= '<form action="Madd.php" method="post">  
<table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mg</th>
                    <th>Price</th>
                    <th>Used_for</th>
                    <th>Side_Effects</th>
                    <th>Add</th>
                  </tr>
                </thead>
                <tbody>';

if ($result-> num_rows>0){
  while($row=$result->fetch_array()){
    $output.='<tr id="mytbody">
       <td>'. $row['id']   .' </td>
       <td> '. $row['Name']   .'  </td>
       <td> '. $row['Mg']   .'  </td>
       <td>   '. $row['Retail_Price']   .'  </td>
       <td>   '. $row['Used_for']   .'  </td> 
       <td>   '. $row['Side_Effects']   .'  </td>
      <td>  
      <button type="submit" name="addbtn" class="btn btn-success" >Add to cart</button>
       </td>
    </tr>';
  }
  
  $output.= '</tbody>
  </table>
                </form>';
  echo $output;
} 
else{
  echo '<h4 class="text-center text-danger">No result found!</h4>';
}