<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    $clientID=$_POST['clientID'];
    include ("../Model/leadModel.php");
    addNewLead($firstName,$lastName,$email,$number,$password,$re_password,$clientID);
}
include ("../Model/clientModel.php");
assignClient();
?>