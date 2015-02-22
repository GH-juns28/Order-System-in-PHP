<?php

$limit = 10;
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = new mysqli($servername, $username, $password, "alvin");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con,$limit);
}
function showData($data,$con,$limit){
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  
  $sql = "select * from product order by Product_Id desc limit $start,$limit";
  $str='';
  $data = $con->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.='
      
       <tr>
                                <td>'.$row['Product_Id'].'</td>
                                <td>'.$row['Product_Name'].'</td>
                                <td>'.$row['Product_Description'].'</td>
                                <td>'.$row['Price'].'</td>
                                <td>1</td>
                                <td></td>
                                <td>
                                <form class="testing">
                                <input type="hidden" name="Product_Id" value="'.$row['Product_Id'].'">
                                <i class="fa fa-close text-navy"></i>
                                </form></td>
                            </tr>
                            ';
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><p>Finished</p>";
   }
  
   
echo $str; 

}

?>