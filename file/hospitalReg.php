<?php
require 'connection.php';
if(isset($_POST['fregister'])){
	$fname=$_POST['fname'];
	$femail=$_POST['femail'];
	$fpassword=$_POST['fpassword'];
	$fphone=$_POST['fphone'];
	$fcity=$_POST['fcity'];
	$check_email = mysqli_query($conn, "SELECT femail FROM farmer where femail = '$femail' ");
	if(mysqli_num_rows($check_email) > 0){
    $error= 'Email Already exists. Please try another Email.';
    header( "location:../register.php?error=".$error );
}else{
	$sql = "INSERT INTO farmer (fname, femail, fpassword, fphone, fcity)
	VALUES ('$fname','$femail', '$fpassword', '$fphone', '$fcity')";
	if ($conn->query($sql) === TRUE) {
		$msg = 'You have successfully registered. Please, login to continue.';
		header( "location:../login.php?msg=".$msg );
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../register.php?error=".$error );
	}
	$conn->close();
}
}
?>