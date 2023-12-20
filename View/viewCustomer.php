<?php 
include "header.php";
include "navbar.php";
include "session.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php
    if($_SESSION['role']=='Agent'){
      include '../View/agent_sidebar.php';
    }
    else if($_SESSION['role']=='Admin'){
     include"../View/admin_sidebar.php"; 
    }
    else if($_SESSION['role']=='Team Lead'){
      include "../View/lead_sidebar.php";
    }
    else{
      include "../View/client_sidebar.php";
    }
     ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3">
      <!--1st row-->
<div class="container py-2 px-3">
<a type="button" class="btn btn-info m-3" onclick="goBackToPrev()">Go Back</a>
<div class="container bg-light"> 
<div class="row px-3 py-5">
    <div class="col-5">
      <h4 class="pb-3">Customer No:</h4>
      <h4 class="pb-3">Customer Name:</h4>
      <h4 class="pb-3">Customer Contact Number:</h4>
      <h4 class="pb-3">Customer Email:</h4>
      <h4 class="pb-3">Customer Address:</h4>
      <h4 class="pb-3">Total Number of Tickets of this Customer:</h4>
    </div>
    <div class="col-7">
    <h4 class="pb-3"><?php echo $customer_row['customerID'];?></h4>
      <h4 class="pb-3"><?php echo $customer_row['customer_fname']." ".$customer_row['customer_lname'];?></h4>
      <h4 class="pb-3"><?php echo $customer_row['contact'];?></h4>
      <h4 class="pb-3"><?php echo $customer_row['email'];?></h4>
      <h4 class="pb-3"><?php echo $customer_row['address'].",".$customer_row['district'].",".$customer_row['division'];?></h4>
      <h4 class="pb-3"><?php echo $ticketRow['noOfTickets'];?></h4>
    </div>
</div>
<div class="pb-4">
  <?php if($_SESSION['role']=='Admin'){?>
<form action="../Controller/customerController.php" method="GET">
    <input type="hidden" name="customerID" value="<?php echo $customer_row['customerID'];?>">
    <button type="submit" class="btn" style="background-color:cornflowerblue">Delete Customer</button>
</form>
<?php  } ?>
</div>
</div>
</div>
  </div>
  </div>
  </div>

 