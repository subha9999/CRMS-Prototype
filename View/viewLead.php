<?php 
include "header.php";
include "navbar.php";
include "../Controller/leadController.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" id="adminTicket">
      <!--1st row-->
<div class="container py-2 px-3">
<a type="button" class="btn btn-info m-2" href="../View/leadAdmin.php">Go Back</a>
<div class="container pt-2 bg-light">
<div class="row  px-3 py-3">
    <div class="col-5">
      <h4 class="pb-3">Lead No:</h4>
      <h4 class="pb-3">Lead Name:</h4>
      <h4 class="pb-3">Lead Contact Number:</h4>
      <h4 class="pb-3">Lead Email:</h4>
      <h4 class="pb-3">Client Company:</h4>
      <h4 class="pb-3">Total Number of Agents under this Lead:</h4>
      <h4 class="pb-3">Total Number of Tickets handled by this Lead's Agents:</h4>
      <h4 class="pb-3">Assign this Lead's Agents to other Team Lead?</h4>
    </div>
    <div class="col-7">
        <h4 class="pb-3"><b><?php echo $ID=$leadRow['leadID'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $leadRow['lead_fname']." ".$leadRow['lead_lname'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $leadRow['contact']?></b></h4>
        <h4 class="pb-3"><b><?php echo $leadRow['email']?></b></h4>
        <h4 class="pb-3"><b><?php echo $clientRow['client'];?></b></h4>
        <h4 class="pb-3"><b><?php echo $totalAgentRow['totalAgents'];?></b></h4>
        <h4 class="pb-5"><b><?php echo $totalTicketRow['totalTicketsHandled'];?></b></h4>
        <form action="../Controller/leadController.php" method="GET">
            <div class="col-3">
            <input type="hidden" name="oldLeadID" value="<?php echo $leadRow['leadID'];?>">
            <select class="prioritybutton px-4 py-2 rounded-2" name="newLeadID">
    <option>Select</option>
    <?php
    while($leadRow=mysqli_fetch_assoc($leadInfo)){
    echo '<option value='.$leadRow['leadID'].'>'.$leadRow['lead_fname']." ". $leadRow["lead_lname"].'</option>';
    };
    ?>
</select>
</div>
<div class="col-4 pt-2">
<button type="submit" class="btn" style="background-color:cornflowerblue">Assign</button>
</div>
        </form>
    </div>
</div>
<div class="row pb-3">
<form action="../Controller/leadController.php" method="POST">
    <input type="hidden" name="leadID" value="<?php echo $ID; ?>">
    <button type="submit" class="btn" style="background-color:cornflowerblue">Delete Lead</button>
</form>
</div>
  </div>
  </div>
  </div>
  </div>
  </div>