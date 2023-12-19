<?php
include "../View/header.php";
include ("../Model/adminModel.php");
echo json_encode(totalTicket());
?>

<canvas id="ticketChart" style="max-width:40rem;max-height:20rem;"></canvas>

<script>
var ticketArray=<?php echo json_encode(totalTicket());?>;
console.log(ticketArray);
var xValues=ticketArray;
var yValues=['Total Tickets','Open Tickets','Closed Tickets'];
new chart("ticketChart",{
  type:bar,
  data:{
    labels:xValues,
    datasets:[{
      backgroundColor:"14466F",
      data:yValues,
      label:'Tickets Distribution'
    }]
  }
})</script>