<?php
include("../Controller/AgentController.php");
?>
<form action="../Controller/TicketController.php" method="POST">
        <div class="row g-3 px-3 py-3">
  <div class="col-4">
  <label for="customerName" class="form-label">Select Customer</label><br>
    <select class="prioritybutton px-4 py-2 rounded-2" name="customer">
    <option>Select</option>
<?php
while($customer_row=mysqli_fetch_assoc($customerInfo)){
    $customer_Id=$customer_row['customerID'];
    echo '<option value='.$customer_Id.'>'.$customer_row['customer_fname']." ". $customer_row["customer_lname"].'</option>';
    };
?>
</select>
</div>
<div class="col-4">
  <label for="subject" class="form-label">Subject</label><br>
  <input type="text" class="form-control" id="subject" name="subject" required>
</div>
</div>
<div class="row  px-3 py-2">
  <div class="col">
  <label for="description" class="form-label">Enter Ticket Description</label><br>
    <textarea id="description" required name="ticketDescription" placeholder="Description" style="width:50vw;height:25vh;"></textarea>
  </div>
</div>
<div class="row px-3 py-2">
  <div class="col">
    <label for="clientName" class="form-label">
        Client: <?php echo $client_name;?> </label>
  </div>
</div>
<div class="row px-3 py-2">
<div class="col-4">
<div class="dropdown">
<label for="priority" class="form-label">Select Priority</label><br>
    <select  class="prioritybutton px-4 py-2 rounded-2" name="priority" type="button">
       <option>Select</option>
       <option value="highPriority">High</option>
       <option value="mediumPriority">Medium</option>
       <option value="lowPriority">Low</option>
</select>
</div>
</div>
<div class="col-4">
<label for="creationDate" class="form-label">Ticket created at</label>
<input type="datetime-local" class="form-control" id="creationDate" required name="creationDate" >
</div>
</div>
<div class="row g-3 px-3 py-2">
    <div class="col-4">
<input type="submit" value="Submit Ticket"class="btn" style="background-color:#48CCCD ;">
</div>
</div>
        </form>