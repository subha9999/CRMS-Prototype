<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
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
global $ID;
$ID=$_SESSION['id'];
$role=$_SESSION['role'];
$name=$_SESSION['Fname']." ".$_SESSION['Lname'];
$userContact=$_SESSION['contact'];
$userEmail=$_SESSION['email'];
$pass=$_SESSION['password'];

?>