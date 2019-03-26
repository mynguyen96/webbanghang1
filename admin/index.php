 <?php 
	session_start();
	if(!isset($_SESSION['admin_username']))
	{
		header('location:dangnhap.php');
	}
?>
<?php require_once('header.php'); ?>
	
<?php require_once('footer.php'); ?>