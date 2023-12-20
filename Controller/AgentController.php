<?php
include("../Controller/session.php");
include ("../Model/adminModel.php");
include_once ('../Model/clientModel.php');
include_once ('../Model/leadModel.php');
include_once ("../Model/customerModel.php");
include_once ("../Model/TicketModel.php");
include_once ("../Model/AgentModel.php");
$_POST['id']=$ID;
$id=$_POST['id'];
if(($_SERVER["REQUEST_METHOD"]=="POST") && !empty($_POST['firstName'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    $leadID=$_POST['leadID'];
    addNewAgent($firstName,$lastName,$email,$number,$password,$re_password,$leadID);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['agentID'])){
    $agentID=$_GET['agentID'];
    getAgentDetails($agentID);
    include_once('../View/viewAgents.php');
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['agentID'])){
    $agentID=$_POST['agentID'];
    deleteAgent($agentID);
}
else{
showClientName($id);
showTeamLead($id);
showAgentToAdmin();
showTicketsToAgents($id);
getAgentTickets($id);
}
?>
<script>
    var totalTicket=<?php echo json_encode(totalTicket());?>;
    var total_agent_ticket=<?php echo json_encode(all_ticket($ID));?>;
    var agent_ticket=<?php echo $ticketJson;?>
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>