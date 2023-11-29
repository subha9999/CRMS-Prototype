<?php
include("../Controller/session.php");
$_POST['id']=$ID;
$id=$_POST['id'];
include ('../Model/AgentModel.php');
showTeamLead($id);
showClientName($id);
include ('../Model/TicketModel.php');
showTicketsToAgents($id);
include ("../Model/customerModel.php");
showCustomerNames($id);
?>