<?php
include ("../Controller/adminController.php");
?>
<!--1st row -->
<div class="row px-2 ">
    <div class="col">
    <button type="button" class="btn btn-info" onclick="showAddUserForm()">Add a new User</button>
    </div>
</div>
<!-- 2nd row-->
    <div class="row px-2 py-2">
    <div class="col ">
    <div class="card" style="width: 19rem;height:10rem">
  <div class="card-body">
    <div class="row">
      <div class="col"> 
      <br>
         <span class="material-symbols-outlined" id="totaltickets" >confirmation_number</span>
</div>
<div class="col">
<br>
<h2 style="color:indigo;"><?php echo $totalTicket_row["total_no_of_tickets"];?></h2>
    <h5 class="card-title">Total Tickets</h5>
  </div>
</div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card" style="width: 19rem;height:10rem">
  <div class="card-body">
  <div class="row">
  <div class="col">
  <br>
  <span class="material-symbols-outlined" id="opentickets" >
confirmation_number
</span>
</div>
<div class="col">
<br>
<h2 class="text-danger"><?php echo $openTicket_row["open_tickets"]; ?></h2>
    <h5 class="card-title">Open Tickets</h5>
    </div>
  </div>
</div>
</div>
    </div>
    <div class="col">
    <div class="card" style="width: 19rem;height:10rem">
  <div class="card-body">
  <div class="row">
    <div class="col">
      <br>
  <span class="material-symbols-outlined" id="closedtickets" >
confirmation_number
</span>
</div>
<div class="col">
  <br>
<h2 class="text-success"><?php echo $closedTicket_row["closed_tickets"]; ?></h2>
    <h5 class="card-title">Closed Tickets</h5>
</div>
  </div>
  </div>
</div>
    </div>
    </div>
    <!--3rd row -->
    <div class="row px-2 py-2 ">
    <div class="col ">
        <canvas id="userChart" style="max-width:40rem;max-height:20rem;"></canvas>
    </div>
    </div>
<!--4th row-->
    <div class="row px-2 py-2">
<div class="col">

</div>
    </div>
    <script>
var y_values=usersArray;
var x_values=['Agents','Team Leads','Clients'];
new Chart("userChart",{
        type:"bar",
        data :{
            labels :x_values,
            datasets: [{
                backgroundColor:"#42A5F5",
                data: y_values,
                label:'No of Users'
            }]
        }
});
</script>
