<?php
require 'connection.php';
session_start();
if(!isset($_SESSION['fid']))
{
	header('location:login.php');
}
else {
	if(isset($_POST['add'])){
		$fid=$_SESSION['fid'];
		$bg=$_POST['bg'];
		$check_data = mysqli_query($conn, "SELECT fid FROM iteminfo where fid='$fid' && bg='$bg'");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already added this item.';
			header( "location:../iteminfo.php?error=".$error );
}else{
		$sql = "INSERT INTO iteminfo (bg, fid) VALUES ('$bg', '$fid')";
		if ($conn->query($sql) === TRUE) {
			$msg = "You have added record successfully.";
			header( "location:../iteminfo.php?msg=".$msg );
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../iteminfo.php?error=".$error );
		}
		$conn->close();
	}
}
}
?>