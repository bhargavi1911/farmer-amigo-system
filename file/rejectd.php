<?php
include "connection.php";
    $donoid=$_GET['donoid'];
	$status = "Rejected";
	$sql = "UPDATE jobrequest SET status = '$status' WHERE donoid = '$donoid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have Rejected the request.";
	header("location:../jobrequest.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../jobrequest.php?error=".$error );
    }
    mysqli_close($conn);
?>