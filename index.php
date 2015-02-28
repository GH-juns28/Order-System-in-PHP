<?php


include_once('class/class.SessionCheck.php');
$sessionCheck = new SessionCheck();
$sessionCheck->checkSession($_SESSION);
include_once('class/class.ManageUser.php');
$CheckUserInfo = new ManageUsers();
$CheckUserInfo = $CheckUserInfo->CheckUserInfo($_SESSION['email'],$_SESSION['password']);
$CheckUserType = new ManageUsers();
$CheckUserType = $CheckUserType->CheckUserType($_SESSION['User_Id']);


?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Commonwealth Foods Inc.</title>

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
                    <div class="dropdown profile-element"> <span>
                            
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $CheckUserInfo[0]['Username'];?></strong>
                             
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <span></span></a>
                </li>
                
                
                
                <?php
                    if($CheckUserType[0][0] == 2){
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
                        <li><a href="NewOrder.php">Order</a></li>
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
          
                           <div class="form-group">
                    
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
           <center><img src="Comfoods.jpg"></center>
       <center> <h2> COMMONWEALTH FOODS, INC.</h2> </center>
       <h3>Company History:</h3>
           <h4> COMMONWEALTH FOODS, INC. (Comfoods Inc.), a Filipino firm, is a conglomeration of three pioneering food-manufacturing companies, which were merged on September 30, 1968. The three corporations were: Commonwealth Foods, Inc., Philippine Food Industries, Inc., and the Filipinas Biscuit Corporation. With the merger, the three entities were reorganized into the Cofi Division (for Roasted and Instant Coffee products), Philfood Division (for Cocoa and Chocolate products), and Fibisco Division (for Biscuit products) of COMFOODS.</h4>
        <img src="images.jpg"> <img src="hiro.jpg"> <img src="crunchies.jpg"><img src="chips.jpg">



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
