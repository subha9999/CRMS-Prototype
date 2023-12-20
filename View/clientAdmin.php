<?php 
include "header.php";
include "navbar.php";
include "../Controller/clientController.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 " id="adminTicket">
      <!--1st row-->
<div class="container mt-3 py-2 bg-light">
        <div class="row px-4">
        <canvas id="clientTicketChart" style="max-width:40rem;max-height:18rem"></canvas>
</div>
<div class="row ">
<table class="table border-dark px-2 py-2" id="clientTable">
  <thead style="background-color:darkturquoise">
    <tr>
      <th scope="col">Client ID</th>
      <th scope="col">Client Company</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody style="background-color:ghostwhite">
  <?php while($clientRow=mysqli_fetch_assoc($clientInfo)){?>
    <tr>
      <th scope="row"><?php echo $clientRow['clientID']; ?></th>
      <td><?php echo $clientRow['clientCompany']?></td>
      <td>
        <div class="d-flex justify-content-between">
            <form action="../Controller/clientController.php" method="GET">
                <input type="hidden" name="clientID" value="<?php echo $clientRow['clientID'];?>">
                <button type="submit" class="btn" style="background-color:cornflowerblue">View Details</button>
            </form>
       </div>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
</div>
  </div>
  </div>
  </div>

<!--Script--> 
<script>
var yValues=ticketArray;
var xValues=clientArray;
const barColors=["#F16725","#e2136e","#16C1F3"," #21AA47","#2eade2","#1428A0"];
new Chart("clientTicketChart",{
        type:"bar",
        data :{
            labels :xValues,
            datasets: [{
                backgroundColor:barColors,
                data: yValues,
                label:'Tickets distribution by Client'
            }]
        },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                precision: 0,
                ticks: {
                    stepSize: 1
                }
            }
        }
      }
});
$('#clientTable').DataTable({
    pagingType:'full',
    bFilter: false,
    lengthMenu: [
        [3,10, 25, 50, -1],
        [3,10, 25, 50, 'All']
    ]
  });
</script>