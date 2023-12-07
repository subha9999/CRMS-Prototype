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
<!--1st Row-->
<div class="row">
    <div class="col pb-2">
<div class="py-3">
    <a type="button" class="btn btn-info"  href="../View/allTickets.php">View All Tickets</a>
</div>
</div>
<div class="col pb-2">
<div class="py-3">
    <button type="button" class="btn btn-info" onclick="showAdminTicketForm()">Add a new Ticket</button>
</div>
</div>
</div>
<div class="container bg-light" >
  <div class="row py-5">
    <div class="col-6">
    <figure class="figure px-5 ">
<canvas id="priorityTicketChart" style="max-width:40rem;max-height:20rem"></canvas>
<figcaption class="figure-caption py-5 text-center">Tickets Distribution by Priority</figcaption>
</figure>
</div>
<div class="col-6">
<figure class="figure px-5 ">
<canvas id="statusTicketChart" style="max-width:40rem;max-height:20rem"></canvas>
<figcaption class="figure-caption py-5 text-center">Tickets Distribution by Status</figcaption>
</figure>
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
var y_values=statusTicketArray;
var x_values=['Closed Tickets','Open Tickets']
const bar_colors=["RGB(101, 204, 50)","rgb(100, 149, 237"];
new Chart("statusTicketChart",{
        type:"doughnut",
        data :{
            labels :x_values,
            datasets: [{
                backgroundColor:bar_colors,
                data: y_values,
            }]
        }
});
</script>