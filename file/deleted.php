<?php
include "connection.php";
    $bdid=$_GET['bdid'];
	$sql = "delete from jobinfo where bdid='$bdid'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have deleted one record.";
	header("location:../jobinfo.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:../jobinfo.php?error=".$error );
    }
    mysqli_close($conn);
?>