<?php
include ("../Controller/AgentController.php");
?>
<!-- 1st row-->
<div class="row px-2 py-1">
    <div class="col-4">
    <button type="button" class="btn btn-info"  onclick="goBackToAgent()">Go back</button>
    </div>
</div>
<!--2nd row-->
<div class="row px-3 py-1">
    <div class="container bg-light">
        <!--Ticket form-->
        <form action="../Controller/ticketController.php" method="POST">
        <div class="row g-3 px-3 py-3">
  <div class="col">
  <div class="row  g-3 px-3 py-2">
    <div class="col-4">
        <label for="customerFirstName" class="form-label">Customer's First Name</label><br>
        <input type="text" class="form-control" id="customerFirstName" name="customer_fname" required>
    </div>
    <div class="col-4">
        <label for="customerLastName" class="form-label">Customer's Last Name</label><br>
        <input type="text" class="form-control" id="customerLastName" name="customer_lname" required>
    </div>
</div>
<div class="row g-3 px-3 py-2">
<div class="col-4 ">
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" id="email" required name="email" >
</div>
<div class="col-4 ">
<label for="contact" class="form-label">Contact Number</label>
<input type="number" class="form-control" id="contact" required name="contact" >
</div>
  </div>
<div class="row  g-3 px-3 py-2">
  <div class="col-4">
    <label for="division" class="form-label" >Select Division</label><br>
    <select class="prioritybutton px-4 py-2 rounded-2" id="division" onchange="updateDistricts()" name="division">
     <option>Select</option>
      <option value="Dhaka">Dhaka</option>
      <option value="Chittagong">Chittagong</option>
      <option value="Khulna">Khulna</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Mymensingh">Mymensingh</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Sylhet">Sylhet</option>
      <option value="Barisal">Barisal</option>
    </select>
  </div>
  <div class="col-4">
  <label class="pb-2" for="district">Select District</label><br>
        <select id="district" class="prioritybutton px-4 py-2 rounded-2" name="district">
          <option>Select</option>
        </select>
  </div>
  <div class="col-4">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" required>
  </div>
</div>
</div>
</div>
<div class="row px-3 py-2">
  <div class="col-4">
  <label for="subject" class="form-label">Subject</label><br>
  <input type="text" class="form-control" id="subject" name="subject" required>
  </div>
  <div class="col-4">
<label for="creationDate" class="form-label">Ticket created at</label>
<input type="datetime-local" class="form-control" id="creationDate" required name="creationDate" >
</div>
<div class="col-4">
<div class="dropdown">
<label for="priority" class="form-label">Select Priority</label><br>
    <select  class="prioritybutton px-4 py-2 rounded-2" name="priority" type="button">
       <option>Select</option>
       <option value="high">High</option>
       <option value="medium">Medium</option>
       <option value="low">Low</option>
</select>
</div>
</div>
</div>
<div class="row  px-3 py-2">
  <div class="col-8">
  <label for="description" class="form-label">Enter Ticket Description</label><br>
    <textarea id="description" required name="ticketDescription" placeholder="Description" style="width:45vw;height:20vh;"></textarea>
  </div>
  <div class="col-4">
    <br><br><br><br><br>
<input type="submit" value="Submit Ticket"class="btn" style="background-color:#48CCCD ;">
</div>
</div>

        </form>
    </div>
</div>