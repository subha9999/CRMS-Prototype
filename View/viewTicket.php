<?php 
include "../View/header.php";
include "../View/navbar.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3">
    <a type="button" class="btn btn-info m-2" href="../View/allTickets.php">Go Back</a>
    <div class="container bg-light mt-3 py-5 px-3" id="target">
    <h3 class="px-3 py-3">Ticket#<b><?php echo " ".$ticket_details_row['ticketID'];?></b></h3>
    <div class="row">
    <div class="col-10">
    <div class="row px-3 py-2">
        <div class="col-2"><h4><b>Subject:</b></h4></div>
        <div class="col-2"><h4><?php echo " ".$ticket_details_row['subject'];?></h4></div>
    </div>
    <div class="row px-3 py-2">
        <div class="col-2"><h4><b>Description:</b></h4></div>
        <div class="col-2"><h4><?php echo " ".$ticket_details_row['description'];?></h4></div>
    </div>
    <div class="row px-3 py-2">
        <div class="col-2"><h4><b>Client:</b></h4></div>
        <div class="col-2"><h4><?php echo " ".$clientRow['client'];?></h4></div>
    </div>
    <div class="row px-3 py-2">
    <div class="col-2"><h4><b>Customer:</b></h4></div>
    <div class="col-2"><h4><?php echo " ".$customerRow['customerFirstName']." ".$customerRow['customerLastName'];?></h4></div>
    </div>
    <div class="row px-3 py-2">
    <div class="col-2"><h4><b>Agent:</b></h4></div>
    <div class="col-2"><h4><?php echo " ".$agentRow['agentFirstName']." ".$agentRow['agentLastName'];?></h4></div>
    </div>
    <div class="row px-3 py-2">
    <div class="col-2"><h4><b>Created at:</b></h4></div>
    <div class="col-4"><h4><?php echo " ".$ticket_details_row['created_at'];?></h4></div>
    </div>
    <div class="row px-3 py-2">
    <div class="col-2"><h4><b>Updated at:</b></h4></div>
    <div class="col-4"><h4><?php echo " ".$ticket_details_row['updated_at'];?></h4></div>
    </div>
    </div>
    <div class="col-2">
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Status
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../Controller/ticketController.php" method="POST">
      <div class="dropdown">
<label for="status" class="form-label">Select Status</label><br>
<select  class="prioritybutton px-4 py-2 rounded-2" name="status" type="button">
    <option><?php echo $ticket_details_row['status'];?></option>
    <option value="Open">Open</option>
    <option value="Close">Close</option>
</select>
<label for="updateDate" class="form-label">Ticket updated at</label>
<input type="datetime-local" class="form-control" id="updateDate" required name="updateDate">
<input type="hidden" name="hiddenTicketID" value=<?php echo $ticket_details_row['ticketID'];?>>
</div><br>
<input type="submit" value="Change Status"class="btn" style="background-color:darkcyan;">
</form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Priority
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="../Controller/ticketController.php" method="POST">
      <div class="dropdown">
<label for="priority" class="form-label">Select Priority</label><br>
<select  class="prioritybutton px-4 py-2 rounded-2" name="priority" type="button">
    <option><?php echo $ticket_details_row['priority'];?></option>
    <option value="high">High</option>
    <option value="medium">Medium</option>
    <option value="low">Low</option>
</select>
<label for="updateDate" class="form-label">Ticket updated at</label>
<input type="datetime-local" class="form-control" id="updateDate" required name="updateDate">
<input type="hidden" name="hiddenTicketID" value=<?php echo $ticket_details_row['ticketID'];?>>
</div><br>
<input type="submit" value="Change Priority"class="btn" style="background-color:darkcyan;">
</form>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="row px-3 pt-3">
        <form action="../Controller/ticketController.php" method="POST">
        <input type="hidden" name="hiddenTicketID" value=<?php echo $ticket_details_row['ticketID'];?>>
        <input type="submit" value="Delete Ticket" class="btn" style="background-color:darkcyan;" onclick="confirmBeforeDelete()">
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
