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
getTickets();
include ("../Model/adminModel.php");
getClientCompany();
getTicketDistribution();
getTicketPriority();
include ("../Model/leadModel.php");
showLeadToAdmin();
include ("../Model/AgentModel.php");
showAgentToAdmin();
include ("../Model/clientModel.php");
showClientToAdmin();
?>
<script>
    var priorityTicketArray=<?php echo json_encode(getTicketPriority());?>;
    var statusTicketArray=<?php echo json_encode(getTicketStatus());?>;
    var usersArray=<?php echo json_encode(getUserDistribution());?>;
  var date=<?php echo json_encode(getCreationDate());?>;
  var t_ticket=<?php echo json_encode(allTicket());?>;
  var o_ticket=<?php echo json_encode(openTicket());?>;
  var c_ticket=<?php echo json_encode(closeTicket());?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>