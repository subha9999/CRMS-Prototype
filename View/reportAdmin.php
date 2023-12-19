<?php 
include "header.php";
include "navbar.php";
include "../Controller/reportController.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" >
      <!--1st row-->
      <div class="row" style="background-color:white">
<div class="container py-2 px-3">
<canvas id="myChart" style="max-width:70vw;max-height:50vh;"></canvas>
</div>
</div>
<div class="row px-3 py-3" style="background-color:white">
  <h4 class="py-3"><b> Select the date range to download tickets</b></h4>
  <!--form-->
  <form action="../Controller/reportController.php" method="POST">
    <label class="py-2 px-3" for="dateRange">From</label>
    <input class="py-2 px-3" type="date" id="dateRange" name="from" required>
    <label class="py-2 px-3" for="dateRange">To</label>
    <input class="py-2 px-3" type="date" id="dateRange" name="to" required>
    <label class="py-2 px-3" for="ticketType">Select the type of ticket</label>
    <select role="button" class="btn btn-info px-3 " name="ticketType" required>
  <option >Select</option>
   <option value="all">All type</option>
    <option value="open">Open</option>
    <option value="close">Close</option>
  </select>
  <select role="button" class="btn btn-info mx-3" name="downloadType" required>
  <option >Select</option>
    <option value="ticketCSV">Download a CSV file</option>
    <option value="ticketXLSX">Download a XLSX file</option>
  </select>
  <br><br>
  <input type="submit" role="button" class="btn btn-info">
  </form>
</div> 
  </div>
  </div>
  </div>
<script>
var y_values=agentArray;
var x_values=leadArray;
new Chart("myChart",{
        type:"bar",
        data :{
            labels :x_values,
            datasets: [{
                backgroundColor:"#008B8B",
                data: y_values,
                label:'No. of Agents per Lead'
            }]
        },
});
</script>

 