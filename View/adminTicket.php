<?php 
include "header.php";
include "navbar.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" id="adminTicket">
      <!-- 1st row-->
<div class="row px-2 py-1">
    <div class="col-4">
    <button type="button" class="btn btn-info" onclick="showAdminTicketForm()">Add a new Ticket</button>
    </div>
</div>
<!--2nd Row-->
<div class="container bg-light">
<canvas id="ticketPriorityChart" style="max-width:40rem;max-height:20rem"></canvas>
</div>
    </div>
    </div>
    </div>
