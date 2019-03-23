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
  <form method="post" style="width:30%" style="margin-left:70px">
    <div class="form-group row">
      <label for="txtname" class="col-sm-2 form-control-label" style="margin-left:10px">UserName</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txtname" placeholder="User name">
      </div>
    </div>
    <div class="form-group row">
      <label for="txtpassword" class="col-sm-2 form-control-label" style="margin-left:10px">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="txtpassword" placeholder="Password">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="btn-signup" value="Sign Up">
      </div>
    </div>
  </form>