 <?php 
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:dangnhap.php');
	}
	
?>
<?php require_once('header.php'); ?>

<?php require_once('footer.php'); ?>