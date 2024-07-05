<?php
require 'file/connection.php';
session_start();
if(!isset($_SESSION['fid']))
{
  header('location:login.php');
}
else {
	if(isset($_SESSION['fid'])){
		$id=$_SESSION['fid'];
		$sql = "SELECT * FROM farmer WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<html>
<?php $title="Agro Farm | My Profile"; ?>
<?php require 'head.php';?>
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
<body>
	<?php require 'header1.php'; ?>

	<div class="container cont">

		<?php require 'message.php'; ?>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-4 col-sm-6 mb-5">
				<div class="card">
					
					<div class="card-body">
					   <form action="file/updateprofile.php" method="post">
					   	<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Name</label>
						<input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold">Email</label>
						<input type="email" name="femail" value="<?php echo $row['femail']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold">Password</label>
						<input type="text" name="fpassword" value="<?php echo $row['fpassword']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold">Phone Number</label>
						<input type="text" name="fphone" value="<?php echo $row['fphone']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold">City</label>
						<input type="text" name="fcity" value="<?php echo $row['fcity']; ?>" class="form-control mb-3">
						<input type="submit" name="update" class="btn btn-block btn-primary" value="Update">
					   </form>
					</div>
					<a href="hospitalpage.html" class="text-center">Cancel</a><br>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>