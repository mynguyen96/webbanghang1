<?php
   include("config/db.class.php");
session_start();        
    Db::connect();
    if(isset($_SESSION['admin_username']))
    {
        header('location:index.php');
    }

    if(isset($_POST['btn-signup'])){
        $username = $_POST['txtname'];
        $password = $_POST['txtpassword'];
    if($username == "" || $password ==""){
      echo "username hoặc password không được để trống!";
    }else{
      $sql = "select * from admin where username = '$username' AND password ='$password' " ;
      $query = mysqli_query(Db::$conn,$sql);
      $num = mysqli_num_rows($query);
      if($num <= 0){
         echo "Tên đăng nhập hoặc mật khẩu không đúng!";
      }else{
        $_SESSION['admin_username']=$username;
        $_SESSION['password']=$password;

        header('location:index.php');
          
      }
   }
}
 ?>
  <form method="post" action="#" style="width:30%" style="margin-left:70px">
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

  
  