<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Mai">
	<title>Quản Lý Bán Hàng</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="/lab03/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/lab03/bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet" media="screen">
</head>
<body>
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
			
