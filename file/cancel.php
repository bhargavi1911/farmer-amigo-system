<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$sql = "delete from itemrequest where reqid='$reqid'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have cancelled request";
	header("location:../sentrequest.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:../sentrequest.php?error=".$error );
    }
    mysqli_close($conn);
?>