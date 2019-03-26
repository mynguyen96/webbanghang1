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
    <link rel="stylesheet" href="source/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/css/jquery-ui.min.css">
    <link rel="stylesheet" href="source/css/all.min.css">
    <link rel="stylesheet" href="source/css/flexslider.css">
    <link rel="stylesheet" href="source/css/owl.theme.css">
    <link rel="stylesheet" href="source/css/owl.carousel.css">
    <link rel="stylesheet" href="source/css/style.css">
</head>
<body>
	<header class="trasparent_nav" style="background: #c6e2ff">
		<div class="wrapper">
			<div class="logo">
				<a href="index.php"><img src="img/logo_small.png" alt="Fertile"></a>
			</div>
			
			<nav style="
    				display: flex;
    				width: 70%;
					justify-content: space-around;"	>
				<ul>
					<li><a href="/webbanghang1/index.php">Trang Chủ</a></li>
					<li><a href="/webbanghang1/list_product.php">Sản Phẩm</a></li>
					<?php 
					session_start();
					if(isset($_SESSION['user'])!="")
					{
						echo "<li>Xin chào : ".$_SESSION['user']." <a href='/webbanghang1/logout.php' style='color:red'>Đăng Xuất</a></li>";
						echo "<li><a href='/webbanghang1/doimatkhau.php' style='color:red'>Đổi Mật Khẩu</a></li>";
					}
					else{
						echo "<li><a href='/webbanghang1/login.php'>Đăng Nhập</a></li>
					<li><a href='/webbanghang1/register.php'>Đăng Kí</a></li>";
					}
					?>

				</ul>
					<div class="box-info-cart" onClick="window.location='checkout.php'">
                <i class="fa fa-shopping-cart"></i>
                <?php  $countCart = 0; 
                    if(isset($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $key => $value) {
                        $countCart += $value['qty'];
                    }
                } ?>
                <span class="count-cart"><?= $countCart; ?></span>
            </div>
			</nav>
			
		</div>
	</header>
