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
			<div class="logo" style="padding: 20px 50px">
				<a href="index.php"><img src="img/logo_small.png" alt="Fertile"></a>
			</div>
			<nav >
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
		<div>
		
		<table class="search-form" cellpadding="10">
			<tr>
					<form action="search.php" method="post">
						<input type="text" name="keyword" size="35%" value="<?php  if(isset($_POST['keyword'])) echo $_POST['keyword']; else echo "";  ?>"  placeholder="Nhập từ khóa cần tìm...">
						<input class="btn btn-primary" type="submit" name="btnsearch" value="Tìm kiếm"/><br>
					</form>
			</tr>
		</table>
		</div>
	</header>
