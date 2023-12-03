<?php
include("../Controller/session.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    $leadID=$_POST['leadID'];
    include ("../Model/AgentModel.php");
    addNewAgent($firstName,$lastName,$email,$number,$password,$re_password,$leadID);
}
$_POST['id']=$ID;
$id=$_POST['id'];
include ('../Model/clientModel.php');
showClientName($id);
include ('../Model/leadModel.php');
showTeamLead($id);
assignLead();
include ("../Model/customerModel.php");
showCustomerNames($id);
?>