
<div class="row">

	<?php	
	   include("config/db.class.php");
	   session_start();
	   Db::connect();
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$matkhaucu = $_POST['matkhaucu'];
			$matkhaumoi = $_POST['matkhaumoi'];
			$xacnhanmatkhaumoi = $_POST['xacnhanmatkhaumoi'];
			if($matkhaumoi == $xacnhanmatkhaumoi){
				$sql = "select * from admin where username = '" . $_SESSION['admin_username'] .  "'";
	     	 	$query = mysqli_query(Db::$conn,$sql);
	     	 	$result = mysqli_fetch_assoc($query);
	     	 	if($result['password'] === $matkhaucu){
	     	 		$sql = "Update `admin` SET password= '" . $matkhaumoi .  "' WHERE userName = '" . $_SESSION['admin_username'] .  "'";
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

<!DOCTYPE html>
<html lang="en">
<head>
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
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form name="frmdoimatkhau" method="POST">
			<h3 style="text-align: center;">Đổi Mật Khẩu</h3>
			<div class="form-group">
				<label>Tài Khoản</label>
				<input type="text" name="taikhoan" value="<?php echo $_SESSION['admin_username']; ?>" class="form-control" disabled="true">
			</div>
			<div class="form-group">
				<label>Mật Khẩu Cũ</label>
				<input type="password" name="matkhaucu" class="form-control">
			</div>
			<div class="form-group">
				<label>Mật Khẩu Mới</label>
				<input type="password" name="matkhaumoi" value="" class="form-control">
			</div>
			<div class="form-group">
				<label>Xác nhận mật khẩu mới</label>
				<input type="password" name="xacnhanmatkhaumoi" value="" class="form-control">
			</div>
			<input type="submit" name="submit" value="Đổi mật khẩu" class="btn btn-primary">
		</form>
	</div>
	<div class="col-md-4"></div>
</div>


