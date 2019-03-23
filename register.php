<?php include_once("intc/header.php"); ?>
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

  <form method="post" style="width:30%; margin:auto;">
    <div class="form-group row">
      <label for="txtname" class="col-sm-2 form-control-label" style="margin-left:10px">UserName</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txtname" placeholder="User name">
      </div>
    </div>

    <div class="form-group row">
      <label for="txtemail" class="col-sm-2 form-control-label" style="margin-left:10px">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="txtemail" placeholder="Email">
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
