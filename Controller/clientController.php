<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $companyName=$_POST['companyName'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    include("../Model/clientModel.php");
    addNewClient($firstName,$lastName,$email,$number,$companyName,$password,$re_password);
}
?>