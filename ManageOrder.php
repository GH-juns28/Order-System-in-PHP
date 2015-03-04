<?php

/*
    Project By: Alvin 
    Tutor: Rex Adrivan    
*/

include_once('class/class.ManageOrders.php');
include_once('class/class.SessionCheck.php');
$sessionCheck = new SessionCheck();
$sessionCheck->checkSession($_SESSION);
include_once('class/class.ManageUser.php');
$CheckUserInfo = new ManageUsers();
$CheckUserInfo = $CheckUserInfo->CheckUserInfo($_SESSION['email'],$_SESSION['password']);
$CheckUserType = new ManageUsers();
$CheckUserType = $CheckUserType->CheckUserType($_SESSION['User_Id']);
$CheckIfSalesman = new ManageUsers();


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $CheckUserInfo[0]['Username'];?></strong>
                             </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span></span></a>
                </li>
                
                
                
                <?php
                    if($CheckUserType[0][0] == 3){
                        ?>
                            <li>
                                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="admin.php">Manage Products</a></li>
                                </ul>
                            </li>
                        <?php
                    }
                ?>

                
                
                 <?php
                    if($CheckUserType[0][0] == 2 ||$CheckUserType[0][0] == 3){
                        ?>
                            <li>
                                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Salesman</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="ManageProducts.php">Manage Products</a></li>
                                    <li><a href="AddProducts.php">Add Products</a></li>
                                    <li><a href="SalesmanManageOrder.php">Manage Orders</a></li>
                                </ul>
                            </li>
                        <?php
                    }
                ?>
              
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Customer</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="order.php">New Order</a></li>
                        <li><a href="ManageOrder.php">Manage Order</a></li> 
                    </ul>
                </li>

               
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="http://webapplayers.com/inspinia_admin-v1.9/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome</span>
                </li>
                
                


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>


        <div class="wrapper wrapper-content">
        


        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Custom responsive table </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
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
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row ">
                
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Total Price</th>    
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="OrdersTbody">
                        <?php

                            $Order = new ManageOrders();
                            $checkOrders = $Order->CheckOrders($_SESSION['User_Id']);
                            //var_dump($checkOrders);
                            for ($i=0; $i < count($checkOrders); $i++) { 
                                
                                $ProductData = $Order->ProductData($checkOrders[$i]['Product_Id']);
                                
                                for ($b=0; $b < count($ProductData); $b++) { 
                                    $Product_Total_Price = $checkOrders[$i]['Total'];
                                    $Product_Id = $checkOrders[$i]['Product_Id'];

                                    $Product_Description = $ProductData[$b]['Product_Description'];
                                    $Product_Name = $ProductData[$b]['Product_Name'];
                                    $Product_Price = $ProductData[$b]['Price'];
                                    $Product_Quantity = $checkOrders[$i]['Quantity'];
                                        ?>
                                        <form class="ManageOrderTable">
                                        <input type="hidden" name="Product_Id" value="<?php echo $Product_Id;?>">
                                        <input type="hidden" name="Product_Name" value="<?php echo $Product_Name;?>">
                                        <input type="hidden" name="Product_Description" value="<?php echo $Product_Description;?>">
                                        <input type="hidden" name="Product_Price" value="<?php echo $Product_Price;?>">
                                        <input type="hidden" name="Product_Quantity" value="<?php echo $Product_Name;?>">
                                        <input type="hidden" name="Product_Total_Price" value="<?php echo $Product_Name;?>">

                                        <tr>
                                                
                                            <td><?php echo $Product_Name;?></td>
                                            <td><?php echo $Product_Description;?></td>
                                            <td><?php echo $Product_Price;?></td>
                                            <td><?php echo $Product_Quantity;?></span></td>
                                            <td><?php echo $Product_Total_Price;?></td>
                                            <td>Unpayed</td>
                                            <td><a href="#"><button class="btn btn-primary"><i class="fa fa-times"></i></button></i></a></td>
                                        </tr>
                                        </form>
                                        <?php



                                }
                            }
                            
                        ?>
                    
                  
                    
                    </tbody>
                </table>
            </div>
            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <?php 
                                        $order = new ManageOrders();
                                        $TotalPrice = $order->ManageOrderTotalPrice($_SESSION['User_Id']);
                                        $TotalPriceArr = array();   
                                        for ($i=0; $i < count($TotalPrice); $i++) { 
                                            array_push($TotalPriceArr,$TotalPrice[$i]['Total']);
                                        }
                                    ?>
                                    <td><?php echo array_sum($TotalPriceArr);?></td>
                                </tr>
                                </tbody>
                            </table>
                            
            <div class="text-right">
                                
                                <button class="makePayment btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                                <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                

                            </div>
        </div>
        </div>
        </div>

        </div>


        </div>


        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="JSfiles/ManageOrder.js"></script>
    <script src="JSfiles/makePayment.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

</body>

</html>
