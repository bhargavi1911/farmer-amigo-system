<?php 
session_start();
if (isset($_SESSION['fid'])) {
  header("location:bloodrequest.php");
}elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
body{
    background: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/backgroundimgage.jpg)no-repeat center;
    background-size: cover;
    min-height: 0;
    height: 530px;
  }
.login-form{
    width: calc(100% - 20px);
    max-height: 650px;
    max-width: 450px;
    background-color: white;
}
</style>
</head>
<?php $title="Agro Farm | Register"; ?>
<?php require 'head.php'; ?>
<body>
  <?php include 'header.php'; ?>

    <div class="container cont">

    <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light" style="padding: 20px">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#hospitals">Farmer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#customers">User/Worker</a>
              </li>
            </ul>

    <div class="tab-content">

       <div class="tab-pane container active" id="farmer">

        <form action="file/hospitalReg.php" method="post" enctype="multipart/form-data">
          <input type="text" name="fname" placeholder="Name" class="form-control mb-3" required>
          <input type="text" name="fcity" placeholder="City" class="form-control mb-3" required>
          <input type="tel" name="fphone" placeholder="Phone Number" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Password must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
          <input type="email" name="femail" placeholder="Email" class="form-control mb-3" required>
          <input type="password" name="fpassword" placeholder="Password" class="form-control mb-3" required minlength="6">
          <input type="submit" name="fregister" value="Register" class="btn btn-primary btn-block mb-4">
        </form>

       </div>


       <div class="tab-pane container fade" id="customers">

         <form action="file/receiverReg.php" method="post" enctype="multipart/form-data">
          <input type="text" name="cname" placeholder="User Name" class="form-control mb-3" required>
          <select name="rbg" class="form-control mb-3" required>
                <option disabled="" selected="">Job Type</option>
                <option value="Watering">Watering</option>
                <option value="Sowing">Sowing</option>
                <option value="Cleaning">Cleaning</option>
                <option value="Soewing">Soewing</option>
                <option value="Harvesting">Harvesting</option>
                <option value="Ploughing">Ploughing</option>
          </select>
          <input type="text" name="ccity" placeholder="User City" class="form-control mb-3" required>
          <input type="tel" name="cphone" placeholder="User Phone Number" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Password must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
          <input type="email" name="cemail" placeholder="User Email" class="form-control mb-3" required>
          <input type="password" name="cpassword" placeholder="User Password" class="form-control mb-3" required minlength="6">
          <input type="submit" name="cregister" value="Register" class="btn btn-primary btn-block mb-4">
        </form>

       </div>
    </div>
    <a href="login.php" class="text-center mb-4" title="Click here">Already have account?</a>
</div>
</div>
</div>
</div>
<?php require 'footer.php' ?>
</body>
</html>
<?php } ?>