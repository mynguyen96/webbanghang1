<?php
	require_once('entities/product.class.php');
	require_once("entities/category.class.php");

?>
<?php
		$prod = Product::list_product();
		$cates =Category::list_category();

?>
<?php include_once("header.php") ;
	?>

	<section class="billboard">
		<img src="img/wp2004258.jpg" alt="" title=""/>
	</section><!-- End billboard -->

	<section class="services wrapper">
		<div class="row">
			<div class="col-sm-3" >
			
				<h3 style="text-align: center; padding-bottom: 1em">Danh mục</h3>
					<?php foreach ($cates as $item) {
						echo "<li class='list-group-item' style='text-align:center'><a href=list_product.php?cateId=".$item["cateId"].">".$item["categoryName"]."</a></li>";
					} ?>
			</div>
			<div class="col-sm-9">
				<h3 style="text-align: center; padding-bottom: 1em"> Sản phẩm của cửa hàng</h3>
				<div class="container text-center">
					<div class="col-sm-12 nhieusp">
						<div class="list-product">
							<?php foreach ($prod as $item) { ?>
								<div class="col-sm-3 motsp">
									<div class="img-wrapper">
										<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"];?>"><img src="<?php echo $item['picture'];?>" class="img-responsive" style="width:100%" alt="Image"></a>
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
		</div>
		
		
	</section>
	</body>
</html>