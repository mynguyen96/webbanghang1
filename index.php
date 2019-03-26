<?php
	require_once('entities/product.class.php');
?>
<?php
		$prod = Product::list_product();

?>
<?php include_once("header.php") ;
	?>

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
								<a href="/webbanghang1/product_detail.php?productId=<?php echo $item["productId"];?>" class="btn btn-primary">Xem chi tiết</a>
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