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
<a type="button" class="btn btn-info m-2" href="../View/clientAdmin.php">Go Back</a>
<div class="container pt-2 bg-light">
<div class="row  px-3 py-3">
    <div class="col-5">
      <h4 class="pb-3">Client ID:</h4>
      <h4 class="pb-3">Client Company:</h4>
      <h4 class="pb-3">Client Representative Name:</h4>
      <h4 class="pb-3">Client Representative Contact Number:</h4>
      <h4 class="pb-3">Client Representative Email:</h4>
      <h4 class="pb-3">Total Number of Agents:</h4>
      <h4 class="pb-3">Total Number of Team Leads:</h4>
    </div>
    <div class="col-7">
        <h4 class="pb-3"><b><?php echo $clientID=$clientRow['clientID']?></b></h4>
        <h4 class="pb-3"><b><?php echo $clientRow['clientCompany']?></b></h4>
        <h4 class="pb-3"><b><?php echo $clientRow['representative_fname']." ".$clientRow['representative_lname']?></b></h4>
        <h4 class="pb-3"><b><?php echo $clientRow['contact']?></b></h4>
        <h4 class="pb-3"><b><?php echo $clientRow['email']?></b></h4>
        <h4 class="pb-3"><b><?php echo $totalAgentsRow['totalAgents']?></b></h4>
        <h4 class="pb-3"><b><?php echo $totalLeadRow['totalLeads']?></b></h4>
    </div>
</div>
<div class="row pb-5">
</div>
  </div>
  </div>
  </div>
  </div>
  </div>