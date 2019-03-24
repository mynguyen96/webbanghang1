<?php
require_once("entities/product.class.php");
require_once("entities/category.class.php");
 ?>
 <?php

if(isset($_GET["productId"])){
	$id =$_GET["productId"];
	//lay gia tri dau tien trong mang ca doi tuong
	$prod = Product::get_product($id);
	$prod = reset($prod);

 $cates =Category::list_category();
if(isset($prod['productId'])) {
 	//ham lay cac sp lien quan
	$prods_relate =Product::list_product_relate($prod["catId"],$id);
	// echo print_r($prods_relate);
?>
<?php include_once("header.php") ?>
<div class="container text-center" style="margin-top: 150px">
	<div class="row">
		<div class="col-sm-3 panel panel-danger">
		<h3 class="panel-heading" style="margin-bottom: 20px">Danh mục</h3>
		<ul class="list-group">
			<?php
			foreach ($cates as $item) {
				# code...
				echo "<li class='list-group-item'><a href=/webbanghang1/list_product.php?cateId=".$item["cateId"].">".$item["categoryName"]."</a></li>";
			}
			 ?>
		</ul>
	</div>
	<div class="col-sm-9 panel panel-info" style="border: 1px solid #75838645 ;padding-bottom: 1em ;border-radius: 5px">
		<h3 class="panel-heading" style="margin: 20px 0 50px 0 " >Chi tiết sản phẩm</h3>
		<div class="row">
			<div class="col-sm-6">

				<img src="<?php echo "".$prod['picture'];?>"class="img-responsive" style="width:100%" alt="Image">


			</div>
			<div class="col-sm-6">
				<!--in thoong tin chi tiet sp-->
				<div style="padding-left: 10px">
					<h3 class="text-info" style="font-size: 2em;font-weight: bold;">
						<?php echo $prod["productName"]; ?>
					</h3>
					<p style="font-size: 1.75em">
						Giá: <?php echo $prod["price"]; ?>
					</p>
					<p style="font-style: italic;">
						Mô tả: <?php echo $prod["description"]; ?>
					</p>
					<p>
						<button type="button" class="btn btn-danger">Mua hàng</button>
					</p>
				</div>
			</div>
		</div>
	</div>
	<h3 class="panel-heading" style="margin: 30px 0 20px 0 ;text-align: center; width: 100%">Sản phẩm liên quan</h3>
		<div class="row">
			<?php
			foreach ($prods_relate as $item) {
				# code...
			?>
			<div class="col-sm-4">
				<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"]; ?>">
					<img src="<?php echo"".$item["picture"]; ?>" class="img-responsive" style="width: 100%" alt="Image">
				</a>
				<p class="text-danger"><?php echo $item['productName']; ?></p>
				<p class="text-info"><?php echo $item['price']; ?></p>
				<p>
					<button type="button" class="btn btn-primary">Mua hàng</button>
				</p>
			</div>
			<?php } ?>
		</div>
	</div>
	
</div>
<?php } else {
	header("Location: not_found.php");
} } else {
	header("Location: not_found.php");
} ?>
