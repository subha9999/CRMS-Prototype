<?php 
include "../Controller/clientController.php";
?>
<div class="col-10 px-5 py-5">
     <!--1st row -->
    <div class="row px-5 py-5">
    <div class="col ">
      <a href="../View/clientAgent.php">
    <div class="card" style="width: 30vw;height:31vh">
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
</a>
    </div>
    <div class="col">
      <a href="../View/clientTeamLead.php">
    <div class="card" style="width: 30vw;height:31vh">
  <div class="card-body">
    <div class="row">
        <div class="col-5">
            <br>
        <img id="clientIcon" src="../Images/team_lead.png" alt="team_lead_png">
</div>
<div class="col-7 py-5">
    <br>
<h5 class="card-title">Total Number of Team Leads: <?php echo $leadCount;?></h5>
</div>
  </div>
  </div>
</div>
</a>
    </div>
   
 
    </div>
    <!--2nd row -->
    <div class="row px-5 py-3">
    <div class="col">
      <a href="../View/clientTicket.php">
    <div class="card" style="width: 30vw;height:31vh">
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
</a>
    </div>
    <div class="col">
    <div class="card" style="width: 30vw;height:31vh">
    <a href="../View/clientCustomer.php">
  <div class="card-body">
    <div class="row">
        <div class="col-5">
            <br>
        <img id="clientIcon" src="../Images/customer-group-customers-forum-people-users-icon-2.jpg" alt="customer_png">
</div>
<div class="col-7 py-5">
    <br>
<h5 class="card-title">Total Number of Customers who issued tickets: <?php echo $customerCount;?></h5>
</div>
  </div>
  </div>
</a>
</div>
    </div>
    </div>