<?php
	require_once('entities/product.class.php');
	if(!isset($_GET['id'])){
		header("Location: index.php");
	}else{
		$id = $_GET['id'];
		$product = Product::get_product($id)[0];
	}
	if(isset($_POST['btnedit']))
	{
		$name 	= $_POST['name'];
		$catid 	= $_POST['catid'];
		$price  = $_POST['price'];
		$qty 	= $_POST['qty'];
		$dest 	= $_POST['dest'];
		//khoi tao doi tuong product
		$result = Product::update($id,$name, $catid, $price, $qty, $dest);
		if($result) {
			 echo "<script type='text/javascript'>";
			 echo "alert('Sửa sản phẩm thành công')";
			 echo "</script>";
			 header("Location: list_product.php");
		} else {
			 echo "<script type='text/javascript'>";
			 echo "alert('Sửa sản phẩm thất bại')";
			 echo "</script>";
		}
	}
?>



<?php
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fertile |  Clean HTML5 Portfolio website</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content=""/>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/reset.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/main.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/style.css">

	<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/main.js"></script>
</head>
<h1 style="text-align: center; width: 100%">Thêm Sản Phẩm</h1>
<form action="" method="post" enctype="multipart/form-data" style="
    width: 40%;
    margin: auto;">
	<div class="row">
		<div class="lbltitle"><label for="">Tên sản phẩm</label></div>
		<div class="lblinput">
			<input class="form-control" type="text" name="name" value="<?php echo $product['productName']; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Danh mục sản phẩm</label></div>
		<div class="lblinput">
			<select name="catid">
				<option value="">Chọn danh mục sản phẩm</option>
				<?php
					$listCat = new Db();
					$result = $listCat->select_to_array('SELECT * FROM categories ');
					foreach($result as $row){
				?>
				<option value="<?php echo $row['cateId']; ?>"><?php echo $row['categoryName']; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Giá</label></div>
		<div class="lblinput">
			<input class="form-control" type="number" name="price" value="<?php echo $product['price']; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Số lượng</label></div>
		<div class="lblinput">
			<input class="form-control" type="number" name="qty" value="<?php echo $product['quantity']; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Mô tả sản phẩm</label></div>
		<div class="lblinput">
			<input class="form-control" type="text" name="dest" value="<?php echo $product['description']; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"></div>
		<div class="lblinput">
			<input class="form-control" type="submit" class="btn" value="Thêm sản phẩm" name="btnedit">
		</div>
	</div>

</form>

<?php include_once('footer.php'); ?>
