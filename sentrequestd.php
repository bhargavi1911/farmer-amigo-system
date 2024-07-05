<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['cid']))
  {
  header('location:login.php');
  }
  else {
    $cid = $_SESSION['cid'];
    $sql = "SELECT jobrequest.*, farmer.* from jobrequest, farmer where cid='$cid' && jobrequest.fid=farmer.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Agro Farm | Sent Requests"; ?>
<?php require 'head.php'; ?>
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
	<?php require 'header.php'; ?>
	<div class="container cont">

		<?php require 'message.php'; ?>

	<table class="table table-responsive table-striped rounded mb-5">
		<tr><th colspan="8" class="title" style="color:white">Sent requests</th></tr>
		<tr style="color:white">
			<th>#</th>
			<th>Farmer Name</th>
			<th>Farmer Email</th>
			<th>Farmer City</th>
			<th>Farmer Phone no</th>
			<th>Job Type</th>
			<th>Status</th>
			<th>Action</th>
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">You have not requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		<tr style="color:white">
			<td><?php echo ++$counter;?></td>
			<td><?php echo $row['fname'];?></td>
			<td><?php echo $row['femail'];?></td>
			<td><?php echo $row['fcity'];?></td>
			<td><?php echo $row['fphone'];?></td>
			<td><?php echo $row['bg'];?></td>
			<td><?php echo $row['status'];?></td>
			<td><?php if($row['status'] == 'Accepted'){ ?>
			<?php }
			else{ ?>
				<a href="file/canceld.php?donoid=<?php echo $row['donoid'];?>" class="btn btn-danger">Cancel</a>
			<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>