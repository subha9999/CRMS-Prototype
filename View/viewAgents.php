<?php 
include "header.php";
include "navbar.php";

?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php
    if($_SESSION['role']=='Agent'){
      include '../View/agent_sidebar.php';
    }
    else if($_SESSION['role']=='Admin'){
     include"../View/admin_sidebar.php"; 
    }
    else if($_SESSION['role']=='Team Lead'){
      include "../View/lead_sidebar.php";
    }
    else{
      include "../View/client_sidebar.php";
    }
     ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" id="adminTicket">
      <!--1st row-->
<div class="container py-2 px-3">
<a type="button" class="btn btn-info m-2" onclick="goBackToPrev()">Go Back</a>
<div class="container pt-2 bg-light">
<div class="row  px-3">
    <div class="col-6">
      <h4 class="pb-3">Agent No:</h4>
      <h4 class="pb-3">Agent Name:</h4>
      <h4 class="pb-3">Agent Contact Number:</h4>
      <h4 class="pb-3">Agent Email:</h4>
      <h4 class="pb-3">Agent's Team Lead:</h4>
      <h4 class="pb-3">Total Number of Tickets handled by Agent:</h4>
      <h4 class="pb-3">Number of tickets assigned to the Agent:</h4>
      <h4 class="pb-3">Number of tickets resolved by the Agent:</h4>
      <h4 class="pb-3">Average Resolution Time:</h4>
      <?php if($_SESSION['role']=='Admin'){?>
      <h4 class="pb-3">Assign this agent's ticket to some other agent?</h4>
      <?php } ?>
    </div>
    <div class="col-6">
        <h4 class="pb-3"><b><?php echo $agentRow['agentID']; ?></b></h4>
        <h4 class="pb-3"><b><?php echo $agentRow['agent_fname']." ".$agentRow['agent_lname'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $agentRow['contact'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $agentRow['email'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $leadRow['lead_Fname']." ".$leadRow['lead_Lname'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $totalTicketRow['totalTickets'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $assignedTicketRow['assignedTickets'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $resolvedTicketRow['resolvedTickets'];?></b></h4>
        <h4 class="pb-3"><b><?php 
        if(!empty($avgResTimeRow['resolution_time_in_min'])){
          echo $avgResTimeRow['resolution_time_in_min'];
        }
        else{
          echo '0';
        };?> minutes</b></h4>
        <div class="row">
        <?php if($_SESSION['role']=='Admin'){?>
        <form action="../Controller/ticketController.php" method="GET">
            <div class="col-3">
            <input type="hidden" name="oldAgentID" value="<?php echo $agentRow["agentID"];?>">
            <select class="prioritybutton px-4 py-2 rounded-2" name="newAgentID">
    <option>Select</option>
<?php
while($allAgents=mysqli_fetch_assoc($allAgentInfo)){
    echo '<option value='.$allAgents['agentID'].'>'.$allAgents['agent_fname']." ". $allAgents["agent_lname"].'</option>';
    };
?>
</select>
</div>
<div class="col-4 pt-2">
<button type="submit" class="btn" style="background-color:cornflowerblue">Assign</button>
</div>
        </form>
        <?php } ?>
</div>
    </div>
</div>
<div class="row">
<?php if($_SESSION['role']=='Admin'){?>
<form action="../Controller/AgentController.php" method="POST">
    <input type="hidden" name="agentID" value="<?php echo $agentRow["agentID"];?>">
    <button type="submit" class="btn" style="background-color:cornflowerblue">Delete Agent</button>
</form>
<?php } ?>
</div>
  </div>
  </div>
  </div>
  </div>
  </div>