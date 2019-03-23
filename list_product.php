<?php
	require_once('entities/product.class.php');
?>
<?php

	include_once('intc/header.php');
	if(!isset($_GET["cateId"])){
		$prod = Product::list_product();

	}
		else{
		$cateId = $_GET["cateId"];
		$prod = Product::list_product_by_cateid($cateId);
		//echo print_r($prod);
	}


?>
<div class="container text-center">
	<div class="col-sm-12 nhieusp">
		<h3> Sản phẩm của cửa hàng</h3></br>
		<div class="row">
			<div class="list-product">
				<?php
			foreach ($prod as $item) {
		?>

			<div class="col-sm-3 motsp">
				<div class="img-wrapper">
					<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"];?>"><img src="upload/<?php echo $item['picture'];?>" class="img-responsive" style="width:100%" alt="Image"></a>
				</div>
				<p class="text-danger"><?php echo $item['productName']; ?></p>
				<p class="text-info"><?php echo $item['price']; ?>đ</p>
				<p>
					<button type="button" class="btn btn-primary">Mua hàng</button>
				</p>
			</div>
		<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php include_once('intc/footer.php'); ?>
