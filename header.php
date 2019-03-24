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
<body>
<<<<<<< HEAD
	<header class="trasparent_nav" style="background: #c6e2ff">
		<div class="wrapper">
			<div class="logo">
				<a href="index.php"><img src="img/logo_small.png" alt="Fertile"></a>
			</div>

			<nav>
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
			</nav>
		</div>
	</header>
=======
	<div id="wrapper">
		
		<?php
			session_start();
			if(isset($_SESSION['user'])!="")
			{
				echo "<h2>Xin chào:".$_SESSION['user']."</h2>";
				//echo "<h2>Xin chào:".$_SESSION['user']."<a href='/webbanhang1/doimatkhau.php'>test</a></h2>";
				
			}
			else{
				echo "<h2> Bạn chưa đăng nhập <a href='/lab03/login.php'>Login</a> -<a href='/webbanhang1/register.php'>Register</a></h2>";


			}
		 ?>
	
		<div class="navbar navbar-default navbar-static-top" role="navigation">
			
>>>>>>> 675cf5557ea20d29eaabdb3f5628f97dce34b86f
