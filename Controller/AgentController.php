<?php
include("../Controller/session.php");
include_once ('../Model/clientModel.php');
include_once ('../Model/leadModel.php');
include_once ("../Model/customerModel.php");
include_once ("../Model/TicketModel.php");
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
showClientName($id);
showTeamLead($id);
assignLead();
showCustomerNames($id);
showTicketsToAgents($id);
?>