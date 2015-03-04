<?php

/*
    Project By: Alvin 
    Tutor: Rex Adrivan    
*/

include_once('class/class.SessionCheck.php');
$sessionCheck = new SessionCheck();
$sessionCheck->checkSession($_SESSION);

include_once('class/class.ProductDivision.php');
include_once('class/class.ManageUser.php');
$ProductDivision = new ProductDivision();
$ManageUser = new ManageUsers();
$SalesMan = $ManageUser->CheckUserType($_SESSION['User_Id']);
//$CheckIfSalesman = $ManageUser->CheckIfSalesman($SalesMan[0][0]);
$CheckUserInfo = new ManageUsers();
$CheckUserInfo = $CheckUserInfo->CheckUserInfo($_SESSION['email'],$_SESSION['password']);

$CheckUserType = new ManageUsers();
$CheckUserType = $CheckUserType->CheckUserType($_SESSION['User_Id']);
$CheckIfSalesman = new ManageUsers();
$CheckIfSalesman->CheckIfSalesman($CheckUserType[0][0]);
?>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alvin Thesis | Dashboard v.4</title>

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
                             </span> </span> </a>
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
                <li>
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <span></span></a>
                </li>
                
                
                
                
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Salesman</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="ManageProducts.php">Manage Products</a></li>
                        <li><a href="AddProducts.php">Add Products</a></li>
                        <li><a href="SalesmanManageOrder.php">Manage Orders</a></li>
                    </ul>
                </li>
              
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Customer</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="order.php">Order</a></li>
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
                            <h5>Add Products <small>on your system!</small></h5>
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
                            <form method="get" name="AddProduct" class="AddProduct form-horizontal">
                            
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Company Division</label>
                                         <?php

                                        $ProductDivision = $ProductDivision->GetallCompany();
                                        $i = count($ProductDivision);


                                        ?>
                                    <div class="col-sm-10"><select class="form-control m-b" name="CompanyDivision">
                                            <?php
                                                for ($x = 0; $x < $i; $x++) {

                                                    ;?>
                                                        <option value="<?php echo $ProductDivision[$x]['Company_Division_Id'];?>"><?php echo $ProductDivision[$x]['Division_Name'];?></option>
                                                       
                                                    <?php
                                                } 
                                            ?>

                                            
                                    </select></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Product Name</label>

                                    <div class="col-sm-10"><input type="text" name="ProductName" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Product Description</label>

                                    <div class="col-sm-10"><input type="text" name="ProductDescription" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Product Quantity</label>

                                    <div class="col-sm-10"><input type="text" name="Quantity" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Price</label>

                                    <div class="col-sm-10"><input type="text" name="ProductPrice" class="form-control"></div>
                                </div>
                                

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        


        </div>


        <div class="footer">
            
            <div>
                <strong>Copyright</strong> Alvin Company &copy; 2014-2015
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


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
    <script src="JSfiles/AddProduct.js"></script>

    <div class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;"><div class="modal-backdrop fade in"></div>
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Product Successfully Added</strong> .</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

</body>

</html>
