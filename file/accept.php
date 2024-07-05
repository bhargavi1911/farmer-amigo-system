<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$status = "Accepted";
	$sql = "update itemrequest SET status = '$status' where reqid = '$reqid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have accepted the request.";
	header("location:../itemrequest.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../itemrequest.php?error=".$error );
    }
    mysqli_close($conn);
?>