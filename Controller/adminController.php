<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $customer_id=$_POST['customer'];
    $id=$_POST['agent'];
    $priority=$_POST['priority'];
    $subject=$_POST['subject'];
    $creationDateAndTime=$_POST['creationDate'];
    $ticketDesc=$_POST['ticketDescription'];
    include ('../Model/TicketModel.php');
    submitTicketFromAdmin($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject);
}
include ("../Model/TicketModel.php");
showTicketsToAdmin();
include ("../Model/adminModel.php");
getClientCompany();
getTicketDistribution();
getTicketPriority();
include ("../Model/customerModel.php");
showCustomerNamesToAdmin();
include ("../Model/leadModel.php");
showLeadToAdmin();
include ("../Model/AgentModel.php");
showAgentToAdmin();
include ("../Model/clientModel.php");
showClientToAdmin();
?>
<script>
    var clientArray=<?php echo json_encode(getClientCompany());?>;
    var ticketArray=<?php echo json_encode(getTicketDistribution());?>;
    var priorityTicketArray=<?php echo json_encode(getTicketPriority());?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>