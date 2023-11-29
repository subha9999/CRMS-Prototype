<?php
include ("../Model/TicketModel.php");
showTicketsToAdmin();
include ("../Model/adminModel.php");
getClientCompany();
getTicketDistribution();
?>
<script>
    var clientArray=<?php echo json_encode(getClientCompany());?>;
    var ticketArray=<?php echo json_encode(getTicketDistribution());?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>