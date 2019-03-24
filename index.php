<?php
	require_once('entities/product.class.php');
?>
<?php

	
		$prod = Product::list_product();

?>
<?php include_once("header.php") ?>

	<!-- <header class="fixed_nav">
		<div class="wrapper">
			<div class="logo">
				<a href="#"><img src="img/logo_small.png" alt="Fertile"></a>
			</div>

			<nav>
				<ul>
					<li><a href="/webbanghang1/index.php">Trang Chủ</a></li>
					<li><a href="/webbanghang1/list_product.php">Sản Phẩm</a></li>
					<?php 
					session_start();
					if(isset($_SESSION['user'])!="")
					{
						echo "<h2>Xin chào:".$_SESSION['user']."<a href='/lab03/logout.php'>Logout</a></h2>";

					}
					else{
						echo "<li><a href='/webbanghang1/login.php'>Đăng Nhập</a></li>
					<li><a href='/webbanghang1/register.php'>Đăng Kí</a></li>";
					}
					?>
					
				</ul>
			</nav>
		</div>
	</header> --><!-- End fixed_nav -->

	<section class="billboard">
		<img src="img/wp2004258.jpg" alt="" title=""/>
	</section><!-- End billboard -->

	<section class="services wrapper">
		<h3 style="text-align: center; padding-bottom: 1em"> Sản phẩm của cửa hàng</h3>  
		<div class="container text-center">
			<div class="col-sm-12 nhieusp">
				<div class="list-product">
					<?php foreach ($prod as $item) { ?>
						<div class="col-sm-3 motsp">
							<div class="img-wrapper">
								<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"];?>"><img src="<?php echo $item['picture'];?>" class="img-responsive" style="width:100%" alt="Image"></a>
							</div>
							<p class="text-danger"><?php echo $item['productName']; ?></p>
							<p class="text-info"><?php echo $item['price']; ?>đ</p>
							<p>
								<button type="button" class="btn btn-primary">Mua hàng</button>
							</p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section><!-- End services -->


	


	<!-- <section class="clients">
		<div class="wrapper">
			<ul>
				<li><a href=""><img src="img/client_logo.png" alt="" title="Client Logo"/></a></li>
				<li><a href=""><img src="img/client_logo.png" alt="" title="Client Logo"/></a></li>
				<li><a href=""><img src="img/client_logo.png" alt="" title="Client Logo"/></a></li>
				<li><a href=""><img src="img/client_logo.png" alt="" title="Client Logo"/></a></li>
				<li><a href=""><img src="img/client_logo.png" alt="" title="Client Logo"/></a></li>
				<li><a href=""><img src="img/client_logo.png" alt="" title="Client Logo"/></a></li>
			</ul>
		</div>
	</section>-->
<!-- 	<footer>
		<div class="wrapper">
			<section class="cta cta_footer">
				<p>Have a project in mind?  We would love to hear from you!</p>
				<a href="#">Get in touch with us</a>
			</section>

			<div class="footer_widget">
					<div class="f_cols">
						<h3>Location</h3>
						<p>3301 New Mexico Avenue Washington, DC 20016 <span class="phone">(202) 537-0787</span></p> 	
						<ul class="sm">
							<li><a class="fb" href="#"></a></li>
							<li><a class="twitter" href="#"></a></li>
							<li><a class="dribbble" href="#"></a></li>
						</ul>
					</div>	

					<div class="f_cols">
						<h3>Company</h3>
						<ul>
							<li><a href="#">Our Story</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Journal</a></li>
							<li><a href="#">Careers</a></li>
						</ul>	
					</div>	

					<div class="f_cols">
						<h3>Support</h3>
						<ul>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Policies</a></li>
						</ul>	
					</div>	

					<div class="f_cols">
						<h3>Fertile</h3>
						<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia est eserunt mollit anim laborum.</p>
					</div>
			</div>

			<p class="rights">© 2014 Fertile  -  All Rights Reserved  -  Find more free Templates at <a href="http://pixelhint.com">Pixelhint.com</a></p>	

		</div>
	</footer> -->
	</body>
</html>