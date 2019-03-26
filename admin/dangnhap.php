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
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="description" content=""/>
  <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/reset.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/main.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/style.css">

  <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/main.js"></script>
</head>
<div class="row" style="text-align: center;">
  <form method="post" action="#" style="width:30% ">
    
      <h1 class="header">ĐĂNG NHẬP ADMIN</h1>
      <div class="col-sm-10" style="padding-bottom: 10px">
        <input type="text" class="form-control" name="txtname" placeholder="User name">
      </div>
    
      
    
    
      
      <div class="col-sm-10" style="padding-bottom: 20px">
        <input type="password" class="form-control" name="txtpassword" placeholder="Password">
      </div>
    

    
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="btn-signup" value="Sign Up" class="btn btn-primary">
      </div>
    
  </form>
</div>
  

  
  