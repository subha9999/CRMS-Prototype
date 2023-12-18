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
        <div class="col-6">
<div class="container py-2 px-3">
<canvas id="myChart" style="max-width:50rem;max-height:30rem;"></canvas>
</div>
</div>
<div class="col-4">
<div class="dropdown py-3">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
     Download Agent's Details
    </button>
    <ul class="dropdown-menu">
      
      <li> <a class="dropdown-item" href="../Controller/reportController.php?downloadType=agentCSV" role="button">Download CSV file</a></li>
      <li><a class="dropdown-item" href="../Controller/reportController.php?downloadType=agentXLSX" role="button">Download XLSX file</a></li>
    </ul>
  </div>
  <div class="dropdown pb-3">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
     Download Lead's Details
    </button>
    <ul class="dropdown-menu">
      
      <li> <a class="dropdown-item" href="../Controller/reportController.php?downloadType=leadCSV" role="button">Download CSV file</a></li>
      <li><a class="dropdown-item" href="../Controller/reportController.php?downloadType=leadXLSX" role="button">Download XLSX file</a></li>
    </ul>
  </div>
</div>
</div>
<div class="row py-3">
<div class="card">
  <div class="card-body"> 
  <div class="dropdown pb-3">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
     Download Client's Details
    </button>
    <ul class="dropdown-menu">
      
      <li> <a class="dropdown-item" href="../Controller/reportController.php?downloadType=clientCSV" role="button">Download CSV file</a></li>
      <li><a class="dropdown-item" href="../Controller/reportController.php?downloadType=clientXLSX" role="button">Download XLSX file</a></li>
    </ul>
  </div>
  <div class="dropdown pb-3">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
     Download Customer's Details
    </button>
    <ul class="dropdown-menu">
      
      <li> <a class="dropdown-item" href="../Controller/reportController.php?downloadType=customerCSV" role="button">Download CSV file</a></li>
      <li><a class="dropdown-item" href="../Controller/reportController.php?downloadType=customerXLSX" role="button">Download XLSX file</a></li>
    </ul>
  </div>
  <div class="dropdown pb-3">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
     Download Tickets Details
    </button>
    <ul class="dropdown-menu">
      
      <li> <a class="dropdown-item" href="../Controller/reportController.php?downloadType=ticketCSV" role="button">Download CSV file</a></li>
      <li><a class="dropdown-item" href="../Controller/reportController.php?downloadType=ticketXLSX" role="button">Download XLSX file</a></li>
    </ul>
  </div>
</div>
</div>
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

 