<?php 
session_start();
if (isset($_SESSION['fid'])) {
  header("location:bloodrequest.php");
}elseif (isset($_SESSION['cid'])) {
  header("location:sentrequest.php");
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body{
    background: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/backgroundimgage.jpg) no-repeat center;
    background-size: cover;
    min-height: 0;
    height: 650px;
  }
.login-form{
    width: calc(100% - 20px);
    max-height: 650px;
    max-width: 450px;
    background-color: white;
}
</style>
</head>
<?php $title="Agro Farm | Login"; ?>
<?php require 'head.php'; ?>
<body>
  <?php require 'header.php'; ?>

    <div class="container cont">
      
      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">

          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light" style="padding: 20px;">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#farmer">Farmer</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#customers">User/Worker</a>
     </li>
    </ul>

    <div class="tab-content">
       <div class="tab-pane container active" id="farmer">
        <form action="file/hospitalLogin.php" class="login-form" method="post">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Email</label>
          <input type="email" name="femail" placeholder="Email" class="form-control mb-4">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Password</label>
          <input type="password" name="fpassword" placeholder="Password" class="form-control mb-4">
          <input type="submit" name="flogin" value="Login" class="btn btn-primary btn-block mb-4">
        </form>
       </div>


      <div class="tab-pane container fade" id="customers">
         <form action="file/receiverLogin.php" class="login-form" method="post">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Email</label>
          <input type="email" name="cemail" placeholder="Email" class="form-control mb-4">
          <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Password</label>
          <input type="password" name="cpassword" placeholder="Password" class="form-control mb-4">
          <input type="submit" name="clogin" value="Login" class="btn btn-primary btn-block mb-4">
        </form>
      </div>

    </div>
    <a href="register.php" class="text-center mb-4" title="Click here">Don't have account?</a>
</div>
</div>
</div>
</div>
<?php require 'footer.php' ?>
</body>
</html>
<?php } ?>