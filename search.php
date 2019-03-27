<?php
	require_once('entities/product.class.php');
?>
<?php
						
 	if(isset($_POST['btnsearch'])){
 		$keyword = $_POST['keyword'];
		$result = Product::list_product_search($keyword);
	}
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
<?php include_once("header.php") ?>
<div class="container text-center" style="margin-top: 150px;">
	<div class="col-sm-12 nhieusp">
		<?php if(!empty($result)): ?>
		<h3> Tìm thấy <?php echo count($result); ?> sản phẩm  </h3></br>
		<div class="row">
			<div class="list-product">
				<?php foreach ($result as $item) { ?>
					<div class="col-sm-3 motsp">
						<div class="img-wrapper">
							<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"];?>"><img src="<?php echo $item['picture'];?>" class="img-responsive" style="width:100% ;" alt="Image"></a>
						</div>
						<p class="text-danger"><?php echo $item['productName']; ?></p>
						<p class="text-info"><?php echo $item['price']; ?>đ</p>
						<p>
							<button type="submit" name="add-to-cart" class="btn btn-danger">Mua hàng</button>
						</p>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php else: ?>
		<?php echo "<h3>Không tìm thấy sản phẩm nào có từ khóa <b style='color: red;'>{$keyword}</b> </h3>"; ?>
		<?php endif; ?>
	</div>
</div>
<div class="container">
	<div class="row">
		<a href="add_product.php">Thêm Sản Phẩm</button>
	</div>
</div>

