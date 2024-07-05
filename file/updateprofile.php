<?php 
session_start();
require 'connection.php';
if (isset($_SESSION['cid'])) {
if(isset($_POST['update'])){
    $id=$_SESSION['cid'];
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cphone = $_POST['cphone'];
    $bg = $_POST['bg'];
    $ccity = $_POST['ccity'];
    $cpassword = $_POST['cpassword'];
    $update = "UPDATE customers SET cname='$cname', cemail='$cemail', cpassword='$cpassword', cphone='$cphone', cbg='$bg',ccity='$ccity' WHERE id='$id'";
    if ($conn->query($update) === TRUE) {
        $msg = "Your profile is updated successfully.";
        header( "location:../rprofile.php?msg=".$msg);
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../rprofile.php?error=".$error );
    }
    $conn->close();
}


}elseif (isset($_SESSION['fid'])) {
    if(isset($_POST['update'])){
        $id=$_SESSION['fid'];
    $fname = $_POST['fname'];
    $femail = $_POST['femail'];
    $fphone = $_POST['fphone'];
    $fcity = $_POST['fcity'];
    $fpassword = $_POST['fpassword'];
    $update = "UPDATE farmer SET fname='$fname', femail='$femail', fpassword='$fpassword', fphone='$fphone', fcity='$fcity' WHERE id='$id'";
    if ($conn->query($update) === TRUE) {
        $msg= "Your profile is updated successfully.";
        header( "location:../hprofile.php?msg=".$msg);
    } else {
        $error= "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../hprofile.php?error=".$error);
    }
    $conn->close();
}
}else{
    header("location:../login.php");
}
?>