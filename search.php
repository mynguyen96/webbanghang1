<?php
	require_once('entities/product.class.php');
?>
<?php
						
 	if(isset($_POST['btnsearch'])){
 		$keyword = $_POST['keyword'];
 		$sql = mysqli_query(Db::$conn, "SELECT * FROM products WHERE productName LIKE '%{$keyword}%' ");
		$result = Product::list_product_search($keyword);
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
							<button type="button" class="btn btn-primary">Mua hàng</button>
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

