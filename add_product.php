<?php
	require_once('entities/product.class.php');
	if(isset($_POST['btnsubmit']))
	{
		$name 	= $_POST['name'];
		$catid 	= $_POST['catid'];
		$price  = $_POST['price'];
		$qty 	= $_POST['qty'];
		$dest 	= $_POST['dest'];
		$pic 	= $_FILES['pic'];
		//khoi tao doi tuong product
		$newPro = new Product($name, $catid, $price, $qty, $dest, $pic);

		$result = $newPro->insert();

		if(!$result) {
			 header("Location: add_product.php?failure");
		} else {
			header("Location: add_product.php?inserted");
		}
	}
?>



<?php
	if(isset($_GET['inserted'])) {
		 echo "<script type='text/javascript'>";
		 echo "alert('Thêm sản phẩm thành công')";
		 echo "</script>";
	} else if(isset($_GET['failure'])) {
		 echo "<script type='text/javascript'>";
		 echo "alert('Thêm sản phẩm thất bại')";
		 echo "</script>";
	}
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
			<input class="form-control" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
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
				<option value="<?php echo $row['cateId']; ?>" <?php if(isset($_POST['catid']) && $_POST['catid'] == $row['cateId']) echo 'selected'; ?>><?php echo $row['categoryName']; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Giá</label></div>
		<div class="lblinput">
			<input class="form-control" type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Số lượng</label></div>
		<div class="lblinput">
			<input class="form-control" type="number" name="qty" value="<?php echo isset($_POST['qty']) ? $_POST['qty'] : ''; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Mô tả sản phẩm</label></div>
		<div class="lblinput">
			<input class="form-control" type="text" name="dest" value="<?php echo isset($_POST['dest']) ? $_POST['dest'] : ''; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Ảnh sản phẩm</label></div>
		<div class="lblinput">
			<input class="form-control" type="file" id="pic" name="pic" accept=".PNG,.GIF,.JPG">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"></div>
		<div class="lblinput">
			<input class="form-control" type="submit" class="btn" value="Thêm sản phẩm" name="btnsubmit">
		</div>
	</div>

</form>

<?php include_once('intc/footer.php'); ?>
