<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="description" content=""/>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/reset.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/main.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/style.css">

	<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/main.js"></script>
</head>
<body>
	<header class="trasparent_nav" style="background: #c6e2ff">
		<div class="wrapper" style="    
				display: flex;
			    justify-content: space-around;
			    height: 100%;
			    align-items: center;">

			<div class="logo" style="margin: 0px;">
				<a href="/admin/index.php"><img src="img/logo_small.png" alt="Fertile"></a>
			</div>
			<div class="title" style="display: inline-block;">
				<h2 >Đây là trang admin</h2>
				<a href="list_product.php">Danh sách sản phẩm</a>
				<a href="add_product.php">Thêm sản phẩm</a>
			</div>
			<div class="action">
				<h2>Xin chào <?php echo $_SESSION['admin_username']; ?></h2>
				<a href="/webbanghang1/admin/logout.php">Logout</a>
				<a href='/webbanghang1/admin/doimatkhau.php'>Đổi Mật Khẩu</a>
			</div>
			
			
		</div>
	</header>
