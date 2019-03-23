<?php require_once('header.php'); ?>
<div class="row">
	<?php	
	   include("config/db.class.php");
	   Db::connect();
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$matkhaucu = $_POST['matkhaucu'];
			$matkhaumoi = $_POST['matkhaumoi'];
			$xacnhanmatkhaumoi = $_POST['xacnhanmatkhaumoi'];
			if($matkhaumoi == $xacnhanmatkhaumoi){
				$sql = "select * from users where username = '" . $_SESSION['user'] .  "'";
	     	 	$query = mysqli_query(Db::$conn,$sql);
	     	 	$result = mysqli_fetch_assoc($query);
	     	 	if($result['password'] === $matkhaucu){
	     	 		$sql = "Update `users` SET password= '" . $matkhaumoi .  "' WHERE userName = '" . $_SESSION['user'] .  "'";
	     	 		if($query = mysqli_query(Db::$conn,$sql)){
	      				header("Location: index.php");
	     	 		}	
	     	 	}else{
	     	 		echo 'mật khẩu cũ không chính xác';
	     	 	}
	     	 }else{
	     	 	echo 'mật khẩu mới không trùng khớp';
	     	 }
			
		}

	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<form name="frmdoimatkhau" method="POST">
			<h3>Đổi mật khẩu</h3>
			<div class="form-group">
				<label>Tài khoản</label>
				<input type="text" name="taikhoan" value="<?php echo $_SESSION['user']; ?>" class="form-control" disabled="true">
			</div>
			<div class="form-group">
				<label>Mật khẩu cũ</label>
				<input type="password" name="matkhaucu" class="form-control">
			</div>
			<div class="form-group">
				<label>Mật khẩu mới</label>
				<input type="password" name="matkhaumoi" value="" class="form-control">
			</div>
			<div class="form-group">
				<label>Xác nhận mật khẩu mới</label>
				<input type="password" name="xacnhanmatkhaumoi" value="" class="form-control">
			</div>
			<input type="submit" name="submit" value="Đổi mật khẩu" class="btn btn-primary">
		</form>
	</div>
</div>
<?php require_once('footer.php'); ?>