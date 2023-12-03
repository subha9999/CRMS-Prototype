<?php include "../Controller/session.php" ?>
<!-- 1st row-->
<div class="row px-2 py-1">
    <div class="col-4">
    <button type="button" class="btn btn-info"  onclick="goBack(<?php echo $ID;?>)">Go back</button>
    </div>
</div>
<!--2nd row-->
<div class="row px-3 py-3">
    <div class="container bg-light h-100">
        <!--Add User form-->
        <div class="row g-3 px-3 py-3">
        <h3>Select User Type</h3> 
        <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    User Type
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="showAgentForm()">Agent</a></li>
    <li><a class="dropdown-item" onclick="showLeadForm()">Team Lead</a></li>
    <li><a class="dropdown-item" onclick="showClientForm()">Client</a></li>
  </ul>
</div>
</div>
<!--3rd row -->
<div class="row px-3" id="showSpecificForm">
<div class="row pt-4">
  <label for="formGroupExampleInput" class="form-label ">First Name</label>
  <div class="col-6">
    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
</div>
</div>
<div class="row pt-5">
<label for="formGroupExampleInput" class="form-label ">Last Name</label>
  <div class="col-6">
<input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
</div>
</div>
<div class="row pt-5">
<label for="formGroupExampleInput" class="form-label ">Email</label>
  <div class="col-6">
<input type="text" class="form-control" placeholder="Email" aria-label="Email">
</div>
</div>
<div class="row pt-5 pb-5">
<label for="formGroupExampleInput" class="form-label ">Contact Number</label>
  <div class="col-6">
<input type="text" class="form-control" placeholder="Contact Number" aria-label="Contact Number">
</div>
</div>
</div>
<!---->
</div>
</div>
