<?php
include_once('../class/class.Pagination.php');
include_once('../class/class.Products.php');

$page = $_GET['page'];
$itemPerPage = 10;
$ShowProduct = new Products();
$ShowProduct = $ShowProduct->ViewProducts($itemPerPage,$page);
if($ShowProduct){
	
foreach ($ShowProduct as $array) {
	//var_dump($array);
  	
  	?>
  		<script src="JSfiles/OrderProduct.js"></script>
  		<div class="col-lg-3">
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $array['Product_Name'];?></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link" href="">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="http://a.localhost/NewOrder.php?ProductTitle=11&amp;ProductDescription=11&amp;ProductId=12&amp;ProductPrice=11&amp;ProductQuantity=2#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="http://a.localhost/NewOrder.php?ProductTitle=11&amp;ProductDescription=11&amp;ProductId=12&amp;ProductPrice=11&amp;ProductQuantity=2#">Config option 1</a>
                                    </li>
                                    <li><a href="http://a.localhost/NewOrder.php?ProductTitle=11&amp;ProductDescription=11&amp;ProductId=12&amp;ProductPrice=11&amp;ProductQuantity=2#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link" href="">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="carousel slide" id="carousel<?php echo $array['Product_Id'];?>">
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
                                <a data-slide="prev" href="http://a.localhost/NewOrder.php?ProductTitle=11&amp;ProductDescription=11&amp;ProductId=12&amp;ProductPrice=11&amp;ProductQuantity=2#carousel0" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="http://a.localhost/NewOrder.php?ProductTitle=11&amp;ProductDescription=11&amp;ProductId=12&amp;ProductPrice=11&amp;ProductQuantity=2#carousel0" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                            <div>
                                <div class="ibox-content profile-content">
                                <h4><strong>Product Description</strong></h4>
                              
                                <p>
                                    <?php echo $array['Product_Description'];?>                               </p>
                                <p>
                                   <strong>Price:</strong> <?php echo $array['Price'];?>                                </p>
                                
                                <form class="NewOrder">
                                    <input type="hidden" name="ProductTitle" value="<?php echo $array['Product_Name'];?>">
                                    <input type="hidden" name="ProductDescription" value="<?php echo $array['Product_Description'];?>">
                                    <input type="hidden" name="ProductId" value="<?php echo $array['Product_Id'];?>">
                                    <input type="hidden" name="ProductPrice" value="<?php echo $array['Price'];?>">
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
}
?>