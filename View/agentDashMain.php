 <?php include ("../Controller/AgentController.php");?>
 <!--1st row -->
<div class="row px-2 py-2">
    <div class="col">
    <a href="../View/agentTicket.php">
    <div class="card" style="width: 19rem;height:10rem">
  <div class="card-body">
    <div class="row">
      <div class="col"> 
      <br>
         <span class="material-symbols-outlined" id="totaltickets" >confirmation_number</span>
</div>
<div class="col">
<br>
<h2 style="color:indigo;"><?php echo $totalTicket_row["total_no_of_tickets"];?></h2>
    <h5 class="card-title">Total Tickets</h5>
  </div>
</div>
    </div>
    </div>
</a>
</div>
<div class="col">
  <a href="../View/agentOpenTickets.php">
    <div class="card" style="width: 19rem;height:10rem">
  <div class="card-body">
  <div class="row">
  <div class="col">
  <br>
  <span class="material-symbols-outlined" id="opentickets" >
confirmation_number
</span>
</div>
<div class="col">
<br>
<h2 class="text-danger"><?php echo $openTicket_row["open_tickets"]; ?></h2>
    <h5 class="card-title">Open Tickets</h5>
    </div>
  </div>
</div>
</div>
</a>
    </div>
<div class="col">
  <a href="../View/agentCloseTickets.php">
    <div class="card" style="width: 19rem;height:10rem">
  <div class="card-body">
  <div class="row">
    <div class="col">
      <br>
  <span class="material-symbols-outlined" id="closedtickets" >
confirmation_number
</span>
</div>

<div class="col">
  <br>
<h2 class="text-success"><?php echo $closedTicket_row["closed_tickets"]; ?></h2>
    <h5 class="card-title">Closed Tickets</h5>
</div>
  </div>
  </div>
</div>
</a>
    </div>
    </div>
<!--3rd row-->
<div class="row px-2 py-2">
    <div class="col ">
    <div class="card" style="width: 21rem;height:10rem;background-color:rgb(221,38,38)">
  <a href="../View/agentHighPriority.php">
    <div class="card-body">
    <div class="row">
      <div class="col">
        <br>
  <span class="material-symbols-outlined" id="priority">
priority
</span>
</div>
<div class="col">
  <br>
  <h2 class="text-dark"><?php echo $highPriority_row["high_PriorityTickets"]; ?></h2>
    <h5 class="card-title">High Priority</h5>
    </div>
    </div>
  </div>
</a>
</div>
    </div>
    <div class="col">
      <a href="../View/agentMediumPriority.php">
    <div class="card" style="width: 21rem;height:10rem;background-color:rgb(218,165,32)">
  <div class="card-body">
  <div class="row">
      <div class="col">
        <br>
  <span class="material-symbols-outlined" id="priority">
priority
</span>
</div>
<div class="col">
  <br>
  <h2 class="text-dark"><?php echo  $mediumPriority_row["medium_PriorityTickets"];?></h2>
    <h5 class="card-title">Medium Priority</h5>
    </div>
    </div>
  </div>
</div>
</a>
    </div>
    <div class="col">
    <div class="card" style="width: 21rem;height:10rem;background-color:rgb(26,154,26)">
  <a href="../View/agentLowPriority.php">
    <div class="card-body">
  <div class="row">
      <div class="col">
        <br>
  <span class="material-symbols-outlined" id="priority">
priority
</span>
</div>
<div class="col">
  <br>
  <h2 class="text-dark"><?php echo $lowPriority_row["low_PriorityTickets"] ;?></h2>
    <h5 class="card-title">Low Priority</h5>
    </div>
    </div>
  </div>
</a>
</div>
    </div>
    </div>
    <!--4th row-->
    <div class="row px-2  py-4 bg-light">
<div class="col-8">
<canvas id="myTicketChart" style="width:15vw;height:13vh"></canvas>
</div>
    </div>

<script>
  var xValues=total_agent_ticket;
  var total=totalTicket;
  new Chart("myTicketChart", {
  type: "line",
   data: {
    labels: xValues,
    datasets: [
    {
      label:"Total tickets of Agent no.<?php echo $id; ?>",
      fill: false,
      backgroundColor: "#05761A",
      borderColor: "#03330C",
      data:total
    }
  ]
  },
    options: {
        scales: {
            y: {
                precision: 0 ,
                ticks:{
                  stepSize:1
            }
          }
        }
    }
  });

</script>