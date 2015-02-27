<?php
session_start();
$limit = 10;
$servername = "localhost";
$username = "root";
$password = "";
include_once('../../class/class.ManageProducts.php');


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
  
  $sql = "select * from `users` left join customer_product ON customer_product.User_Id=users.User_Id where customer_product.User_Id IS NOT NULL ORDER BY customer_product.Customer_Product_Id DESC LIMIT $start,$limit";
  $str='';
  $data = $con->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      //var_dump($row);
      $showProductInfo = new ManageProducts();
      $showProduct = $showProductInfo->ShowProductInfo($row['Product_Id']);
      $products = array();
      for ($i=0; $i < count($showProduct) ; $i++) { 
        array_push($products, $showProduct);
      }
      
      $str.='
      
       <tr>
                                <td>'.$row['Customer_Product_Id'].'</td>
                                <td>'.$row['Username'].'</td>
                                <td>'.$row['Customer_Order_Date'].'</td>
                                <td>'.$row['Quantity'].'</td>
                                <td>'.$products[0][0]['Price'].'</td>
                                <td>'.$products[0][0]['Price']*$row['Quantity'].'</td>
                                <td>confirmed</td>
                                <td>
                                <form class="testing">
                                <input type="hidden" name="Product_Id" value="'.$row['Product_Id'].'">
                                <div class="text-right">
                                
                                <button class="makePayment btn btn-primary"> View</button>
                                <button class="btn btn-primary">Confirm</button>
                                

                            </div>
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