<?php
include ("session.php");
$_POST['id']=$_SESSION['id'];
$id=$_POST['id'];
include ('../Model/AgentModel.php');
showTeamLead($id);
showClientName($id);
showCustomerNames($id);
?>