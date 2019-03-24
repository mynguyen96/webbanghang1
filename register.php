<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link href="/webbanghang1/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/webbanghang1/bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet" media="screen">
</head>
<body>

  <?php
    if(isset($_SESSION['user'])!=""){
      header("Location:index.php");
    }
    require_once("entities/user.class.php");
    if(isset($_POST['btn-signup']))
    {
      $u_name=$_POST['txtname'];
      $u_email=$_POST['txtemail'];
      $u_pass=$_POST['txtpassword'];
      $account= new User($u_name,$u_email,$u_pass);
      $result=$account->save();
      if(!$result)
      {
        ?>
        <script>
          alter('Có lỗi xảy ra, vui lòng kiểm tra dữ liệu!');
        </script>
        <?php
      }
      else{
        $_SESSION['user']=$u_name;
        header("Location: index.php");
      }
    }
    ?>

</body>
<h2 class="form-signin-heading" style="padding-top:50px">Đăng Kí Tài Khoản</h2>
<div class="container">
  <div class="">
    <form method="post" style="width:30%; margin:auto;">
      <div class="form-group">
        <div class="col-sm-12">
          <input class="form-control" placeholder="Tên Đăng Nhập" required="txtname" name="txtname" autofocus="" style="margin:0 0 10px 0">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <input class="form-control" placeholder="Email" required="txtemail" name="txtemail" autofocus="" style="margin:0 0 10px 0">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" class="form-control" placeholder="Mật Khẩu" name="txtpassword" required="txtpassword" autofocus="" style="margin:0 0 10px 0">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <button class="btn btn-lg btn-primary btn-block" name="btn-signup" type="submit">Đăng Kí</button>
        </div>
      </div>
    </form>
  </div>
</div>
