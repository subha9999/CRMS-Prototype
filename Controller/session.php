<?php
session_start();
$id=$_SESSION['id'];
$role=$_SESSION['role'];
$name=$_SESSION['Fname']." ".$_SESSION['Lname'];
$userContact=$_SESSION['contact'];
$userEmail=$_SESSION['email'];
$pass=$_SESSION['password'];
if(empty($_SESSION['role']) && empty($_SESSION['Fname']))
{
    $userID=$_SESSION["id"];
$password=$_SESSION["password"];
if(empty($userID) && empty($password))
{
    echo "Please login again";

    header('Refresh:1 URL=../index.php');
}
}
?>