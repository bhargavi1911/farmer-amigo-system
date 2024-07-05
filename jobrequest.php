<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['fid']))
  {
  header('location:login.php');
  }
  else {
    $fid = $_SESSION['fid'];
    $sql = "SELECT jobrequest.*, customers.* from jobrequest, customers where fid='$fid' && jobrequest.cid=customers.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
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
.footer {​​
position: fixed;
left: 0;
bottom: 0;
width: 100%;
background-color: white;
color: black;
text-align: center;
}​​
</style>
<?php $title="Agro Farm |"; ?>
<?php require 'head.php'; ?>
<body>
	<?php require 'header1.php'; ?>
	<div class="container cont">

		<?php require 'message.php'; ?>

	<table class="table table-responsive table-striped rounded mb-5" style="color:white">
		<tr><th colspan="9" class="title">Work Requests</th></tr>
		<tr>
			<th># </th>
			<th>Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Phone</th>
			<th>Type of work</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">No one has requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		<tr style="color:white">
			<td><?php echo ++$counter;?></td>
			<td><?php echo $row['cname'];?></td>
			<td><?php echo $row['cemail'];?></td>
			<td><?php echo $row['ccity'];?></td>
			<td><?php echo $row['cphone'];?></td>
			<td><?php echo $row['bg'];?></td>
<td><?php echo 'You have '.$row['status'];?></td>
			<td><?php if($row['status'] == 'Accepted'){ ?> <a href="" class="btn btn-success disabled">Accepted</a> <?php }
			else{ ?>
				<a href="file/acceptd.php?donoid=<?php echo $row['donoid'];?>" class="btn btn-success">Accept</a>
			<?php } ?>
			</td>
			<td><?php if($row['status'] == 'Rejected'){ ?> <a href="" class="btn btn-danger disabled">Rejected</a> <?php }
			else{ ?>
				<a href="file/rejectd.php?donoid=<?php echo $row['donoid'];?>" class="btn btn-danger">Reject</a>
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