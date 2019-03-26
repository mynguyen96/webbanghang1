<?php require_once("header.php"); ?>


<?php if(!isset($_SESSION['cart'])) { ?>
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" ?>">Trang chủ</a></li>
            <li><span>Giỏ hàng</span></li>
        </ul>
    </div>
</div> <!-- end breadcrumb -->

<div class="container" style="height: 340px;">
<?php if(isset($_SESSION['success'])) :?>
    <h2 style="text-align: center; color: #5fba7d;"><?= $_SESSION['success']; unset($_SESSION['success']); ?></h2>
<?php else: ?>
    <h2 style="text-align: center;">Giỏ hàng của bạn không có gì hết :( </h2>
    <h3 style="text-align: center;">Tìm và mua sản phẩm ngay nào <a href="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/webbanghang1" ?>">Trang chủ</a></h3>
<?php endif; ?>
<?php } else { ?>

<div class="container" style="padding: 10px 0px">
        <form action="complete.php" method="post" id="formdathang" name="formdathang">
        <?php if(isset($_SESSION['rm_sucess'])): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Thành công!</strong> <span style="font-weight: 400"><?= $_SESSION['rm_sucess']; ?></span>
            </div>
        <?php endif; unset($_SESSION['rm_sucess']); ?>

            <div id="summary-checkout">
                
                <div class="payment-confirm">
                    <h3>Xác nhận đơn hàng</h3>
                    <div class="cart-bg">
                    <?php
                        $num = 0; $total =0;
                        if(isset($_SESSION['cart'])):
                        foreach($_SESSION['cart'] as $key => $value):
                            
                    ?>
                        <div class="r-row">
                            <div class="clearcart"><a href="source/process.php?rmcart=<?= $key; ?>" title="Xóa">x</a></div>
                            <div class="tt-pro">
                                <a href="detail.php?alias=<?= $value['alias']; ?>&id=<?= $key; ?>" target="_blank"><?= $value['name']; ?></a>
                            </div>
                            <div class="image-co">
                                <a target="_blank" href="detail.php?alias=<?= $value['alias']; ?>&id=<?= $key; ?>">
                                    <img width="90" height="90" src="<?= $value['image']; ?>">
                                </a>
                            </div>
                            <div id="62263" class="txt-info">
                                <p class="number">Số lượng:
                                    <input type="number" name="quanty[0]" class="inputnumber cartquantity" value="<?= $value['qty']; ?>" min="1" max="10">
                                </p>
                            </div>
                        </div>


                    <?php 
                        $total += $value['qty'];
                        $num += $value['price'] * $value['qty'];
                        $_SESSION['totalPrice'] = $num;
                        endforeach; endif; ?>
                    </div>
                    <div id="totalfeebox" style="clear: both; overflow:hidden" class="r-row"><br>
                        <h4 style="float: left;">THÀNH TIỀN:</h4>
                        <span style="float: right;" id="totalfee" class="red"><?= $num; ?> đ</span>
                    </div>
                    <div class="lofd-payment" style="overflow:hidden;">
                        <div style="clear: both;" id="shippingfeebox" class="r-row">
                            <h4 style="float: left;">PHÍ VẬN CHUYỂN:</h4>
                            <span style="float: right;" id="shippingfee" class="red">0đ</span>
                        </div>
                        <div class="lofd-payment r-row ">
                            <h4 style="float: left;">Tổng cộng:</h4>
                            <span id="totalfinalfees" style="float: right;" class="red1"><?= $num; ?> đ</span>
                        </div>
                    </div>
                    <?php if(!isset($_SESSION['user'])): ?>
                    <input type="submit" value="Đặt mua" class="btn-pay submitform" id="btncheckout" name="btncheckout" disabled style='background: gray;' >
                    <div><span style="color: red"><b>Bạn cần đăng nhập để đặt hàng !</b></span></div>
                    <?php else: ?>
                    <input type="submit" value="Đặt mua" class="btn-pay submitform" id="btncheckout" name="btncheckout" >
                    <div class="cont-shopping"><a href="/">Thêm sản phẩm khác</a></div>
                    <?php endif; ?>
                    
                    <input type="hidden" name="total" id="totlacart" class="totlacart" value="<?= $num; ?>">
                </div>
            </div>
        </form>
<?php } ?>
    </div>


<?php require_once("intc/footer.php"); ?>