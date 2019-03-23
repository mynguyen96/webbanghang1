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

<?php include_once('intc/header.php'); ?>

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

<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="lbltitle"><label for="">Tên sản phẩm</label></div>
		<div class="lblinput">
			<input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
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
			<input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Số lượng</label></div>
		<div class="lblinput">
			<input type="number" name="qty" value="<?php echo isset($_POST['qty']) ? $_POST['qty'] : ''; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Mô tả sản phẩm</label></div>
		<div class="lblinput">
			<input type="text" name="dest" value="<?php echo isset($_POST['dest']) ? $_POST['dest'] : ''; ?>">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"><label for="">Ảnh sản phẩm</label></div>
		<div class="lblinput">
			<input type="file" id="pic" name="pic" accept=".PNG,.GIF,.JPG">
		</div>
	</div>
	<div class="row">
		<div class="lbltitle"></div>
		<div class="lblinput">
			<input type="submit" class="btn" value="Thêm sản phẩm" name="btnsubmit">
		</div>
	</div>

</form>

<?php include_once('intc/footer.php'); ?>
