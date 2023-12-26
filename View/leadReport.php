<?php include "header.php"; 
include "navbar.php";
include "../Controller/leadController.php";?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"lead_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-2" id="showForm">
    <a type="button" class="btn btn-info my-2"  onclick="goBackToPrev()">Go back</a>
    <div class="row px-2 py-2 bg-light">
    <div class="col-6 py-3">
    <canvas id="myChart" style="width:50vw;height:80vh;"></canvas>
<figcaption class="figure-caption text-center py-3">Tickets Distribution of <?php echo $_SESSION['role'];?>'s Agents</figcaption>
</div>
<div class="col-6">
<h4 class="py-3"><b> Select the date range to download Tickets' Information</b></h4>
  <!--form-->
  <form action="../Controller/reportController.php" method="GET">
    <label class="py-2 " for="dateRange">From</label><br>
    <input class="py-2 px-3" type="date" id="dateRange" name="from" required><br>
    <label class="py-2 " for="dateRange">To</label><br>
    <input class="py-2 px-3" type="date" id="dateRange" name="to" value="<?php echo date('Y-m-d'); ?>" required><br>
    <label class="py-2 " for="ticketType">Select the type of ticket</label><br>
    <select role="button" class="btn btn-info  " name="ticketType" required><br>
  <option >Select</option>
   <option value="all">All type</option>
    <option value="open">Open</option>
    <option value="close">Close</option>
  </select>
  <br><br>
  <input type="hidden" value="<?php echo $id;?>" name='leadID'>
  <input type="submit" role="button" class="btn btn-info" value="Download File">
  </form>
</div>
</div>
    </div>
    </div>
    </div>
    <script>
var tickets=ticketCount;
new Chart("myChart", {
  type: "polarArea",
  data:{
    labels: [
    'Total',
    'Open',
    'Close',
  ],
  datasets: [{
    label:"Ticket distribution of <?php echo $_SESSION['role'];?>'s Agents",
    data: tickets,
    backgroundColor: [
      '#08587B',
      '#087B20',
      '#7B6108',
    ]
  }]
  }
    });
    </script>