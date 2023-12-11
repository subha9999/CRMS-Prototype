<?php
include ("../Controller/adminController.php");
?>
<!--1st row -->
<div class="row px-2 ">
    <div class="col">
    <button type="button" class="btn btn-info" onclick="showAddUserForm()">Add a new User</button>
    </div>
</div>
<!-- 2nd row-->
    <div class="row px-2 py-2">
    <div class="col ">
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
    </div>
    <div class="col">
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
    </div>
    <div class="col">
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
    </div>
    </div>
    <!--3rd row -->
    <div class="row px-2 py-2">
    <div class="col ">
    <div class="card" style="width: 21rem;height:10rem;background-color:rgb(221,38,38)">
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
</div>
    </div>
    <div class="col">
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
    </div>
    <div class="col">
    <div class="card" style="width: 21rem;height:10rem;background-color:rgb(26,154,26)">
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
</div>
    </div>
    </div>
<!--4th row-->
    <div class="row px-2 py-2">
<div class="col">
<canvas id="clientTicketChart" style="max-width:40rem;max-height:20rem"></canvas>
</div>
    </div>

<script>
var yValues=ticketArray;
var xValues=clientArray;
const barColors=["#2eade2","#F16725","#e2136e","#16C1F3"," #21AA47"];
new Chart("clientTicketChart",{
        type:"bar",
        data :{
            labels :xValues,
            datasets: [{
                backgroundColor:barColors,
                data: yValues,
                label:'Tickets distribution by Client'
            }]
        },
});
</script>