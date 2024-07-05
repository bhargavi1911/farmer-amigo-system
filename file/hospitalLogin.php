<?php
session_start();
    require 'connection.php';
    if(isset($_POST['flogin'])){
    $femail=$_POST['femail'];
    $fpassword=$_POST['fpassword'];
    $sql="select * from farmer where femail='$femail' and fpassword='$fpassword'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        $error= "Wrong email or password. Please try again.";
        header( "location:../login.php?error=".$error);
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['femail']=$row['femail'];
        $_SESSION['fname']=$row['fname'];
        $_SESSION['fid']=$row['id'];
        $msg= $_SESSION['fname'].' have logged in.';
        header( "location:../hospitalpage.html?msg=".$msg);
    } 
  }
?>