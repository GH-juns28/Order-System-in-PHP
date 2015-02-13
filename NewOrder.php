<?php

/*
    Project By: Alvin 
    Tutor: Rex Adrivan    
*/

include_once('class/class.SessionCheck.php');
include_once('class/class.Products.php');
$sessionCheck = new SessionCheck();
$sessionCheck->checkSession($_SESSION);
$ShowProduct = new Products();
$ShowProduct = $ShowProduct->ViewProducts(10,1);

?>
<!DOCTYPE html>
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
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="https://graph.facebook.com/radrivan/picture" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Rex Adrivan</strong>
                             </span> <span class="text-muted text-xs block">Software Engineer <b class="caret"></b></span> </span> </a>
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
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="ManageProducts.php">Manage Products</a></li>
                        <li><a href="AddProducts.php">Add Products</a></li>
                    </ul>
                </li>
              
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Order</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="NewOrder.php">New Order</a></li>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to Alvin Thesis.</span>
                </li>
                
                


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>


        <div  class="wrapper wrapper-content">
            <div id="ProductContent" page="1" class="row">
                <?php
                    $count = count($ShowProduct);
                
                    
                    //var_dump($ShowProduct);

                    $ProductId = $ShowProduct[0]['Product_Id'];
                    $ProductName = $ShowProduct[0]['Product_Name'];
                    $Product_Description = $ShowProduct[0]['Product_Description'];
                    $Price = $ShowProduct[0]['Price'];

                    for ($i = 0; $i < $count; $i++) {
                    $ProductId = $ShowProduct[$i]['Product_Id'];
                    $ProductName = $ShowProduct[$i]['Product_Name'];
                    $Product_Description = $ShowProduct[$i]['Product_Description'];
                    $ProductPrice = $ShowProduct[$i]['Price'];
                           ?>

                            <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $ProductName; ?></h5>
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
                            <div class="carousel slide" id="carousel<?php echo $i;?>">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="image" class="img-responsive" src="img/p_big3.jpg">
                                    </div>
                                    <div class="item">
                                        <img alt="image" class="img-responsive" src="img/p_big1.jpg">
                                    </div>
                                    <div class="item ">
                                        <img alt="image" class="img-responsive" src="img/p_big2.jpg">
                                    </div>

                                </div>
                                <a data-slide="prev" href="#carousel<?php echo $i;?>" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel<?php echo $i;?>" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                            <div>
                                <div class="ibox-content profile-content">
                                <h4><strong>Product Description</strong></h4>
                              
                                <p>
                                    <?php echo $Product_Description; ?>
                                </p>
                                <p>
                                   <strong>Price:</strong> <?php echo $ProductPrice; ?>
                                </p>
                                
                                <form class="NewOrder">
                                    <input type="hidden" name="ProductTitle" value="<?php echo $ProductName;?>">
                                    <input type="hidden" name="ProductDescription" value="<?php echo $Product_Description;?>">
                                    <input type="hidden" name="ProductId" value="<?php echo $ProductId;?>">
                                    <input type="hidden" name="ProductPrice" value="<?php echo $ProductPrice;?>">
                                    <input type="quantity" name="ProductQuantity" placeholder="Quantity" class="form-control">
                                    <button type="button submit" class="btn btn-primary btn-sm btn-block">Buy Item</button>
                                   
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                           <?php

                        }
                ?>
                
                
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

    <script src="JSfiles/scrollend.js"></script>
    <script src="JSfiles/OrderProduct.js"></script>

        
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


    <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;"><div class="modal-backdrop fade in"></div>
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Product Successfully Ordered</strong> .</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

</body>

</html>
