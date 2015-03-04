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
  
  $sql = "select * from company_division order by Company_Division_Id desc limit $start,$limit";
  $str='';
  $data = $con->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.='<div class="col-lg-3">
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>'.$row['Division_Name'].'</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link" href="">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link" href="">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="carousel slide" id="carousel'.$row['Company_Division_Id'].'">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="image" class="img-responsive" src="http://a.localhost/img/p_big3.jpg">
                                    </div>
                                    <div class="item">
                                        <img alt="image" class="img-responsive" src="http://a.localhost/img/p_big1.jpg">
                                    </div>
                                    <div class="item ">
                                        <img alt="image" class="img-responsive" src="http://a.localhost/img/p_big2.jpg">
                                    </div>

                                </div>
                                <a data-slide="prev" href="#carousel'.$row['Company_Division_Id'].'" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel'.$row['Company_Division_Id'].'" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                            <div>
                                <div class="ibox-content profile-content">
                                <h4><strong>Company Description</strong></h4>
                              
                                <p>
                                    '.$row['Division_Description'].'                           </p>
                                    
                                
                                <form action="NewOrder.php" class="NewOrder">
                                    <input type="hidden" name="CompanyDivision" value="'.$row['Company_Division_Id'].'">
                                    <input type="hidden" name="ProductTitle" value="'.$row['Division_Description'].'">
                                    <button type="button submit" class="btn btn-primary btn-sm btn-block">SELECT</button>
                                   
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>';
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><p>Finished</p>";
   }
  
   
echo $str; 

}

?>