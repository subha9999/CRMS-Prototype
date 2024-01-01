<?php
include('../Model/updateUser.php');
if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['email'])){
    $email=$_POST['email'];
    $verificationCode=random_int(1,100);
    $expirationTime=strtotime('+15 minutes');
    sendEmail($id,$email,$verificationCode,$expirationTime);
 }
 else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['code'])){
    $code=$_GET['code'];
    checkCode($code);
 }
 else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['password'])){
    $id=$_POST['userID'];
    $password=$_POST['password'];
    $cPassword=$_POST['confirmpassword'];
    resetPassword($password,$cPassword,$id);
 }
?>