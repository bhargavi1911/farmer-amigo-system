<?php
include "connection.php";
    $bid=$_GET['bid'];
	$sql = "delete from iteminfo where bid='$bid'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have deleted one record.";
	header("location:../iteminfo.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:../iteminfo.php?error=".$error );
    }
    mysqli_close($conn);
?>