<?php 
include "header.php";
include "navbar.php";
include "../Controller/adminController.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" id="adminTicket">
      <!-- 1st row-->
<div class="row px-2 py-1" id="target">
    <div class="col-2">
    <button type="button" class="btn btn-info" onclick="showAdminTicketForm()">Add a new Ticket</button>
    </div>
</div>
<!--2nd Row-->
<div class="container my-3 bg-light" >
  <div class="row py-5">
    <div class="col-6">
    <figure class="figure px-5 py-5">
<canvas id="priorityTicketChart" style="max-width:40rem;max-height:20rem"></canvas>
<figcaption class="figure-caption py-2 text-center">Tickets Distribution by Priority</figcaption>
</figure>
</div>
<div class="col-6">
<div class="card" style="width: 25rem;background-color:darkcyan">
  <div class="card-body rounded-5">
    <h5 class="card-title ">Ticket Information</h5>
    <hr>
<div class="py-2">
    <button type="button" class="btn btn-dark"  onclick="showAllTickets()">View All Tickets</button>
</div>
<div class="py-2">
    <button type="button" class="btn btn-dark" onclick="">View High Priority Tickets</button>
</div>
<div class="py-2">
    <button type="button" class="btn btn-dark"  onclick="">View Medium Priority Tickets</button>
</div>
<div class="py-2">
    <button type="button" class="btn btn-dark"  onclick="">View Low Priority Tickets</button>
</div>
<div class="py-2">
    <button type="button" class="btn btn-dark" onclick="">View Open Tickets</button>
</div>
<div class="py-2">
    <button type="button" class="btn btn-dark"  onclick="">View Tickets In Progress</button>
</div>
<div class="py-2">
    <button type="button" class="btn btn-dark" onclick="">View Closed Tickets</button>
</div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
var yValues=priorityTicketArray;
var xValues=['High','Medium','Low'];
const barColors=["rgb(221,38,38)","rgb(218,165,32)","rgb(26,154,26)"];
new Chart("priorityTicketChart",{
        type:"pie",
        data :{
            labels :xValues,
            datasets: [{
                backgroundColor:barColors,
                data: yValues,
            }]
        }
});
</script>