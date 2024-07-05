<?php
session_start();
    require 'connection.php';
    if(isset($_POST['clogin'])){
    $cemail=$_POST['cemail'];
    $cpassword=$_POST['cpassword'];
    $sql="select * from customers where cemail='$cemail' and cpassword='$cpassword'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        $error= "Wrong email or password. Please try again.";
        header( "location:../login.php?error=".$error);
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['cemail']=$row['cemail'];
        $_SESSION['cname']=$row['cname'];
        $_SESSION['cid']=$row['id'];
        $msg= $_SESSION['cname'].' have logged in.';
        header( "location:../Userpage.html?msg=".$msg);
    } 
  }
?>