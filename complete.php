<?php require_once("header.php"); ?>
<?php 
	if(isset($_SESSION['cart'])) { 
		unset($_SESSION['cart']);
	}
 ?>
<div class="container text-center" style="margin-top: 150px;">
	<h1>Đặt hàng thành công</h1>
</div>


<?php require_once("intc/footer.php"); ?>