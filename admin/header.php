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
		<div class="wrapper">

			<div class="logo">
				<a href="/admin/index.php"><img src="img/logo_small.png" alt="Fertile"></a>
			</div>

			<nav >
				<ul>
					<?php
						echo "<h2>Xin chào:".$_SESSION['user']."<a href='/webbanghang1/admin/logout.php'>Logout</a></h2>";
						echo "<a href='/webbanghang1/admin/doimatkhau.php'>Đổi Mật Khẩu</a></h2>";
						
		 			?>

					<h2 >Đây là trang admin</h2>
					<li><a href="list_product.php">Danh sách sản phẩm</a></li>
					<li><a href="add_product.php">Thêm sản phẩm</a></li>
					<!-- <li><a href="/webbanghang1/index.php">Trang Chủ</a></li>
					<li><a href="/webbanghang1/list_product.php">Sản Phẩm</a></li> -->
					
				</ul>
			</nav>
			
		</div>
	</header>
