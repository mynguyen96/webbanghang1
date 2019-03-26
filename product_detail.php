
<?php include_once("header.php") ?><?php
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
<?php 
	if(isset($_POST['add-to-cart'])) {
        $id = $_POST['id'];
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(!isset($_SESSION['cart'][$id]))
        {
            // tao moi gio hang
            $_SESSION['cart'][$id]['name'] = $prod['productName'];
            $_SESSION['cart'][$id]['image'] = $prod['picture'];
            $_SESSION['cart'][$id]['price'] = $prod['price'];
            $_SESSION['cart'][$id]['qty'] = (int)$_POST['qty'];
            header('location: '.$link);
            
        }
        else if (isset($_SESSION['cart'][$id]))
        {
            // cap nhat gio hang
            $_SESSION['cart'][$id]['qty'] += 1;
            header('location: '.$link);
        } 
    }

 ?>


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
		<form action="" method="post" style="border: none;">
			<input type="hidden" name="id" value="<?= $prod['productId']; ?>"/>
            <input type="hidden" name="price" value="<?= $prod["price"]; ?>"/>
			<div class="row" style="border: none;">
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
						<input type="number" value="1" min="1" name="qty" id="qty " class="form-control" style="width: 60px!important; margin: auto;" />
						<p style="font-style: italic;">
							Mô tả: <?php echo $prod["description"]; ?>
						</p>
						<p>
							<button type="submit" name="add-to-cart" class="btn btn-danger">Mua hàng</button>
						</p>
					</div>
				</div>
			</div>
		</form>
		
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
					<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"]; ?>" class="btn btn-primary">Xem chi tiết</a>
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
