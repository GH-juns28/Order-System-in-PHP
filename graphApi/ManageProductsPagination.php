<?php
include_once('../class/class.Pagination.php');
include_once('../class/class.Products.php');

$page = $_GET['page'];
$itemPerPage = 10;
$ShowProduct = new Products();
$ShowProduct = $ShowProduct->ViewProducts($itemPerPage,$page);
if($ShowProduct){
	
foreach ($ShowProduct as $array) {
		//	var_dump($array);
		?>
			<tr>
                                <td><?php echo $array['Product_Id'];?></td>
                                <td><?php echo $array['Product_Name'];?></td>
                                <td><?php echo $array['Product_Description'];?></td>
                                <td>20</td>
                                <td>1</td>
                                <td>20</td>
                                <td><a href="http://a.localhost/ManageProducts.php#"><i class="fa fa-close text-navy"></i></a></td>
                            </tr>
		<?php
	}
}
?>