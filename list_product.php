<?php
	require_once('entities/product.class.php');
?>
<?php

	
	if(!isset($_GET["cateId"])){
		$prod = Product::list_product();

	}
		else{
		$cateId = $_GET["cateId"];
		$prod = Product::list_product_by_cateid($cateId);
		//echo print_r($prod);
	}
?>
<?php include_once("header.php") ?>
<div class="container text-center" style="margin-top: 150px;">
	<div class="col-sm-12 nhieusp">
		<h3> Sản phẩm của cửa hàng</h3></br>
		<div class="row">
			<div class="list-product">
				<?php foreach ($prod as $item) { ?>
					<div class="col-sm-3 motsp">
						<div class="img-wrapper">
							<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"];?>"><img src="<?php echo $item['picture'];?>" class="img-responsive" style="width:100% ;" alt="Image"></a>
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


