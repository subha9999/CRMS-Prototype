<?php 
include ("../Model/AgentModel.php");
include ("../Model/leadModel.php");
include ("../Model/reportModel.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $downloadType=$_POST['downloadType'];
    $ticketType=$_POST['ticketType'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    if($downloadType=='ticketCSV'){
            ticketDetailsCSV($to,$from,$ticketType);
    }
    else if($downloadType=='ticketXLSX'){
            ticketDetailsXLSX($to,$from,$ticketType);
    }
}

?>
<script>
    var leadArray=<?php echo json_encode(getLeadAgents());?>;
    var agentArray=<?php echo json_encode(getAgentCount());?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>