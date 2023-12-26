<?php include "../Controller/leadController.php"; ?>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-5">
      <!--1st row -->
    <div class="row px-2 py-2">
    <div class="col-5 ">
      <div class="row px-2 py-5">
    <div class="card" style="width: 30vw;height:28vh">
  <div class="card-body">
  <div class="row">
        <div class="col-5">
            <br>
        <img id="clientIcon" src="../Images/agent..png" alt="agent_png">
</div>
<div class="col-7 py-5">
    <br>
<h5 class="card-title">Total Number of Agents: <?php echo $agentCount;?></h5>
</div>
  </div>
  </div>
</div>
</div>
<div class="row px-2 py-5">
    <div class="card" style="width: 30vw;height:28vh">
  <div class="card-body">
  <div class="row">
        <div class="col-5">
            <br>
        <img id="clientIcon" src="../Images/admit-one-ticket-icon.jpg" alt="ticket_png">
</div>
<div class="col-7 py-5">
    <br>
<h5 class="card-title">Total Number of Tickets: <?php echo $ticketCount;?></h5>
</div>
  </div>
  </div>
</div>
</div>
    </div>
  <div class="col-7">
    <div class="row">
  <canvas id="myChart" style="width:50vw;height:80vh;"></canvas>
</div>
  </div>
</div>
<!--3rd row-->
    <div class="row">
    </div>
    </div>
<script>
  var y_values=resolvingTime;
var x_values=agentsID_array;
new Chart("myChart",{
        type:"bar",
        data :{
            labels :x_values,
            datasets: [{
                backgroundColor:"#D61F4E",
                data: y_values,
                label:'Average resolution time of each agent in minutes'
            }]
        }
});
</script>