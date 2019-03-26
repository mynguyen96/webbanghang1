<?php
	require_once('entities/product.class.php');
?>
<?php
	$prod = Product::list_product();
	// echo '<pre>';
 	// print_r($prod);
 	// echo '</pre>';
    if(isset($_POST['btn-delete'])){
      	$idSP 	= $_POST['idSPDelete'];
      	$delete  = Product::delete_product($idSP);
      	if($delete == 204) {
      		header("Refresh:0");
      	}
    }
?>
<?php include_once("header.php") ?>

<div class="container" style="padding-top: 100px">
	<div class="row">
		<a href="add_product.php">Thêm Sản Phẩm</a>
	</div>
  	<h2>Danh sách sản phẩm</h2>                                                                                      
  	<div class="table-responsive">          
  	<table class="table">
	    <thead>
	      	<tr>
	      		<!-- Tổng 100% -->
		        <th width="5%">ID</th>
		        <th width="20%">Tên sản phẩm</th>
		        <th width="5%">Danh mục</th>
		        <th width="20%">Giá</th>
		        <th width="10%">Số lượng</th>
		        <th width="20%">Ảnh</th>
		        <th width="20%">Chỉnh sửa</th>
		     </tr>
	    </thead>
	    <tbody>
	    	<?php foreach ($prod as $item) { ?>
	      	<tr>
		        <td><?php echo $item['productId']; ?></td>
		        <td><?php echo $item['productName']; ?></td>
		        <td><?php echo $item['catId']; ?></td>
		        <td><?php echo number_format($item['price'],0,',','.'); ?> VNĐ</td>
		        <td><?php echo $item['quantity']; ?></td>
		        <td><img src="<?php echo $item['picture'];?>" class="img-responsive" style="width:30% ;" alt="Image"></td>
		        <td>
		        	<div class="btn-group" role="group" aria-label="Basic example">
		        		<form action="" method="post">
		        			<input type="hidden" name="idSPDelete" value="<?php echo $item['productId']?>" />
					  		<button type="submit" class="btn btn-secondary" name="btn-delete">Xóa</button>
		        		</form>
		        		
					  	<a href="edit_product.php?id=<?php echo $item['productId']?>" class="btn btn-secondary" style="
																    height: 38px;
																    margin: 15px 0px 0px 5px;
																    border-radius: 5px;">
																Sửa</a>
					</div>
				</td> 
	      	</tr>
	      	<?php } ?>
	      	<!-- Hi hữu vcl, quên bà nó xóa =))) -->
	    </tbody>
  	</table>
  	</div>
</div>
