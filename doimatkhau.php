<?php require_once('header.php'); ?>
<div class="row">
  <?php 
     include("config/db.class.php");
     Db::connect();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $matkhaucu = $_POST['matkhaucu'];
      $matkhaumoi = $_POST['matkhaumoi'];
      $xacnhanmatkhaumoi = $_POST['xacnhanmatkhaumoi'];
      if($matkhaumoi == $xacnhanmatkhaumoi){
        $sql = "select * from users where username = '" . $_SESSION['user'] .  "'";
          $query = mysqli_query(Db::$conn,$sql);
          $result = mysqli_fetch_assoc($query);
          if($result['password'] === $matkhaucu){
            $sql = "Update `users` SET password= '" . $matkhaumoi .  "' WHERE userName = '" . $_SESSION['user'] .  "'";
            if($query = mysqli_query(Db::$conn,$sql)){
                header("Location: index.php");
            } 
          }else{
            echo 'mật khẩu cũ không chính xác';
          }
         }else{
          echo 'mật khẩu mới không trùng khớp';
         }
      
    }

  ?>
</div>
  <form method="post" name="frmdoimatkhau">
    <div class="form-group row">
      <label for="txtname" class="col-sm-2 form-control-label" style="margin-left:10px">Tài khoản</label>
      <div class="col-sm-10">
        <input type="text" name="taikhoan" value="<?php echo $_SESSION['user']; ?>" class="form-control" disabled="true">
      </div>
    </div>
    <div class="form-group row">
      <label for="txtpassword" class="col-sm-2 form-control-label" style="margin-left:10px">Mật khẩu cũ</label>
      <div class="col-sm-10">
        <input type="password" name="matkhaucu" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="txtpassword" class="col-sm-2 form-control-label" style="margin-left:10px">Mật khẩu mới</label>
      <div class="col-sm-10">
        <input type="password" name="matkhaumoi" value="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="txtpassword" class="col-sm-2 form-control-label" style="margin-left:10px">Xác nhận lại mật khẩu mới</label>
      <div class="col-sm-10">
        <input type="password" name="xacnhanmatkhaumoi" value="" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" value="Đổi mật khẩu" class="btn btn-primary">
         <a href='/webbanghang1/index.php'>Hủy</a>
      </div>
    </div>
  </form>
<?php require_once('footer.php'); ?>