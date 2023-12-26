<?php 
include ("../Model/AgentModel.php");
include ("../Model/leadModel.php");
include ("../Model/reportModel.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ticketType=$_POST['ticketType'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    ticketDetailsXLSX($to,$from,$ticketType);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['agentID'])){
    $ticketType=$_GET['ticketType'];
    $id=$_GET['agentID'];
    $from=$_GET['from'];
    $to=$_GET['to'];
    agent_ticketDetailsXLSX($to,$from,$ticketType,$id);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['clientID'])){
    $ticketType=$_GET['ticketType'];
    $id=$_GET['clientID'];
    $from=$_GET['from'];
    $to=$_GET['to'];
    client_ticketDetailsXLSX($to,$from,$ticketType,$id);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['leadID'])){
    $ticketType=$_GET['ticketType'];
    $id=$_GET['leadID'];
    $from=$_GET['from'];
    $to=$_GET['to'];
   teamLead_ticketDetailsXLSX($to,$from,$ticketType,$id);
}
?>
<script>
    var leadArray=<?php echo json_encode(getLeadAgents());?>;
    var agentArray=<?php echo json_encode(getAgentCount());?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>