<?php
session_start(); 
require 'connection.php';
if(!isset($_SESSION['cid']))
{
	header('location:../login.php');
}
else {
	if(isset($_POST['request'])){
		$fid = $_POST['fid'];
		$cid = $_SESSION['cid'];
		$bg = $_POST['bg'];
		$check_data = mysqli_query($conn, "SELECT reqid FROM itemrequest where fid='$fid' and cid='$cid'");
		if(mysqli_num_rows($check_data) > 0){
		$sql="INSERT INTO itemrequest (bg, fid, cid) VALUES ('$bg', '$fid', '$cid')";
		if ($conn->query($sql) === TRUE) {
			$msg = 'You have requested for'.$bg.'.For the updation of your request you can check your Status now.';
			header( "location:../abs.php?msg=".$msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../abs.php?error=".$error );
		}
        }else{
		$sql="INSERT INTO itemrequest (bg, fid, cid) VALUES ('$bg', '$fid', '$cid')";
		if ($conn->query($sql) === TRUE) {
			$msg = 'You have requested for'.$bg.'.For the updation of your request you can check your Status now.';
			header( "location:../abs.php?msg=".$msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../abs.php?error=".$error );
		}
		$conn->close();
	}
}
}
?>