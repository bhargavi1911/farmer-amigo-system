<?php
if(isset($_POST['cregister'])){
	require 'connection.php';
	$cname=$_POST['cname'];
	$cemail=$_POST['cemail'];
	$cpassword=$_POST['cpassword'];
	$cphone=$_POST['cphone'];
	$ccity=$_POST['ccity'];
	$cbg=$_POST['cbg'];
	$check_email = mysqli_query($conn, "SELECT cemail FROM customers where cemail = '$cemail' ");
	if(mysqli_num_rows($check_email) > 0){
    $error= 'Email Already exists. Please try another Email.';
    header( "location:../register.php?error=".$error );
}else{
	$sql = "INSERT INTO customers (cname, cemail, cpassword, cphone, ccity, cbg)
	VALUES ('$cname','$cemail', '$cpassword', '$cphone', '$ccity', '$cbg')";
	if ($conn->query($sql) === TRUE) {
		$msg = "You have successfully registered. Please, login to continue.";
		header( "location:../login.php?msg=".$msg);
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../register.php?error=".$error );
	}
	$conn->close();
}
}
?>