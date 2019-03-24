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
     session_start();
     include("config/db.class.php");
     Db::connect();
     if(isset($_POST['btn-signup'])){
     $username = $_POST['txtname'];
     $password = $_POST['txtpassword'];
     if($username == "" || $password ==""){
        echo "username hoặc password không được để trống!";
     }else{
        $sql = "select * from users where username = '$username' AND password ='$password' " ;
        $query = mysqli_query(Db::$conn,$sql);
        $num = mysqli_num_rows($query);
        if($num <= 0){
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";
        }else{
          $_SESSION['user']=$username;
          $_SESSION['password']=$password;
          header('location:index.php');
        }
     }
  }
   ?>
   <div class="container" >
     <h2 class="form-signin-heading" style="padding-top:50px">Đăng Nhập</h2>
     <div class="row">
      <div class="col-md-4">
      </div>
       <div class="col-md-4">
           <form method="post" class="form-signin" action="" >
               <input class="form-control" placeholder="Tên Đăng Nhập" name="txtname" required="txtname" autofocus="" style="margin:0 0 10px 0">
               <input type="password" class="form-control" placeholder="Mật Khẩu" name="txtpassword" required="txtpassword" autofocus="" style="margin:0 0 30px 0">
               <button class="btn btn-lg btn-primary btn-block" name="btn-signup" value="login" type="submit">Đăng Nhập</button>
           </form>
       </div>
       <div class="col-md-4">
       </div>
     </div>

   </div>

</body>
