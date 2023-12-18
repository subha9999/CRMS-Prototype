<?php 
include ("../Model/AgentModel.php");
include ("../Model/leadModel.php");
include ("../Model/reportModel.php");
if(isset($_GET['downloadType'])){
    $downloadType=$_GET['downloadType'];
switch($downloadType){
    case 'agentCSV':
       agentDetailsCSV();
       break;
    case 'agentXLSX':
        agentDetailsXLSX();
        break;
    case 'leadCSV':
        leadDetailsCSV();
        break;
    case 'clientCSV':
        clientDetailsCSV();
        break;
    case 'ticketCSV':
        ticketDetailsCSV();
        break;
    case 'customerCSV':
        customerDetailsCSV();
        break;
    case 'leadXLSX':
        leadDetailsXLSX();
        break;
    case 'customerXLSX':
        customerDetailsXLSX();
        break;
    case 'clientXLSX':
        clientDetailsXLSX();
        break;
    case 'ticketXLSX':
        ticketDetailsXLSX();
        break;
    default:
    echo "Invalid Download Type";
    break; 
}
}
?>
<script>
    var leadArray=<?php echo json_encode(getLeadAgents());?>;
    var agentArray=<?php echo json_encode(getAgentCount());?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>