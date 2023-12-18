<?php
include_once ("../Model/leadModel.php");
include_once('../Model/AgentModel.php');
include_once ("../Model/clientModel.php");
assignClient();
showLeadToAdmin();
if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['firstName'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    $clientID=$_POST['clientID'];
    addNewLead($firstName,$lastName,$email,$number,$password,$re_password,$clientID);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['leadID'])){
    $leadID=$_GET['leadID'];
    getLeadDetails($leadID);
    include_once('../View/viewLead.php');
}
else if($_SERVER['REQUEST_METHOD']== 'GET'&& !empty($_GET['oldLeadID'])){
    $oldLeadID=$_GET['oldLeadID'];
    $newLeadID=$_GET['newLeadID'];
    updateAgentLead($oldLeadID,$newLeadID);
}
else if($_SERVER['REQUEST_METHOD']== 'POST'&& !empty($_POST['leadID'])){
    $leadID=$_POST['leadID'];
    deleteLead($leadID);
}

?>