<form action="../Controller/leadController.php" method="POST">
<div class="row pt-3">
  <div class="col-3">
  <label for="Firstname" class="form-label">Lead First Name</label>
</div>
<div class="col-4">
    <input type="text" class="form-control" placeholder="First name" id="Firstname" name="firstName">
</div>
</div>
<div class="row pt-3">
  <div class="col-3">
  <label for="Lastname" class="form-label">Lead Last Name</label>
</div>
  <div class="col-4">
<input type="text" class="form-control" placeholder="Last name" id="Lastname" name="lastName">
</div>
</div>
<div class="row pt-3">
  <div class="col-3">
  <label for="Email" class="form-label">Lead Email</label>
</div>
<div class="col-4">
<input type="text" class="form-control" placeholder="Email" id="Email" name="email">
</div>
</div>
<div class="row pt-3">
  <div class="col-3">
  <label for="number" class="form-label">Lead Contact Number</label>
</div>
<div class="col-4">
<input type="text" class="form-control" placeholder="Contact Number" id="number" name="number">
</div>
</div>
<div class="row pt-3 ">
    <div class="col-3">
<label for="leadName" class="form-label">Assign Client</label>
</div>
<div class="col-6">
    <select class="prioritybutton px-4 py-2 rounded-2" id="leadName" name="clientID">
    <option>Select</option>
<?php
include ("../Controller/leadController.php");
while($clientRow=mysqli_fetch_assoc($clientResult)){
    echo '<option value='.$clientRow['clientID'].'>'. $clientRow["clientCompany"].'</option>';
    };
?>
</select>
</div>
</div>
<div class="row pt-3">
  <div class="col-3">
  <label for="password" class="form-label">Password</label>
</div>
<div class="col-4">
<input type="password" class="form-control" placeholder="Password" id="password" name="password">
</div>
</div>
<div class="row pt-3 pb-4">
  <div class="col-3">
  <label for="re-password" class="form-label">Retype Password</label>
</div>
<div class="col-4">
<input type="password" class="form-control" placeholder="Retype Password" id="re-password" name="re-password">
</div>
</div>
<!--4th row-->
<div class="row px-2 py-3">
    <div class="col-4">
    <input type="submit" value="Add User"class="btn btn-info" >
    </div>
</div>
</form>