<?php include "header.php";
include "navbar.php"; ?>
<div class="container-fluid">
   <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"agent_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    
    <div class="col-10 px-5 py-3" id="showForm">
<?php include("../Controller/AgentController.php");?>
 <!--1st row-->
 <div class="row px-2 py-3">
    <div class="col">
 <a type="button" class="btn btn-info"  href="../View/agentDashboard.php">Go back</a>
</div>
 </div>
  <!--2nd row-->
 <div class="row px-3 py-4 bg-light">
    <div class="col">
    <div class="container-fluid px-3 py-5">
        <ul class="nav flex-column">
            <div class="row px-5 m-2">
        <h2 class="teamLead">Team Lead </h2>

</div>
        <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
    <span class="material-symbols-outlined">
badge
</span>
</span> Name: <?php echo $lead_F_Name." ".$lead_L_Name ;?></a>
  </li> 
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href=""><span class="material-symbols-outlined">
contact_page</span>
<i>Contact Number:</i><?php echo " " .$lead_contact;?></a>
  </li> 
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
contact_mail</span>
<i>Email:</i><?php echo " ".$lead_email;?></a>
  </li>
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
partner_exchange
</span>
<i>Client:</i><?php echo " ".$client_name;?></a>
  </li> 
        </ul>
</div>
</div>
</div>
</div>
</div>
