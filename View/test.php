<form action="../Controller/AgentController.php" method="POST">
<div class="row pt-3">
  <div class="col-2">
  <label for="Firstname" class="form-label">Agent First Name</label>
</div>
<div class="col-4">
    <input type="text" class="form-control" name="firstName" placeholder="First name" id="Firstname">
</div>
</div>
<div class="row pt-4">
  <div class="col-2">
  <label for="Lastname" class="form-label">Agent Last Name</label>
</div>
  <div class="col-4">
<input type="text" class="form-control" name="lastName" placeholder="Last name" id="Lastname">
</div>
</div>
<div class="row pt-4">
  <div class="col-2">
  <label for="Email" class="form-label">Agent Email</label>
</div>
<div class="col-4">
<input type="text" class="form-control" name="email" placeholder="Email" id="Email">
</div>
</div>
<div class="row pt-4">
  <div class="col-2">
  <label for="number" class="form-label">Agent Contact Number</label>
</div>
<div class="col-4">
<input type="text" class="form-control" name="number" placeholder="Contact Number" id="number">
</div>
</div>
<div class="row pt-4">
  <div class="col-2">
  <label for="password" class="form-label">Password</label>
</div>
<div class="col-4">
<input type="password" class="form-control" name="password" placeholder="Password" id="password">
</div>
</div>
<div class="row pt-4 pb-4">
  <div class="col-2">
  <label for="re-password" class="form-label">Retype Password</label>
</div>
<div class="col-4">
<input type="password" class="form-control" name="re-password" placeholder="Retype Password" id="re-password">
</div>
</div>
<!--4th row-->
<div class="row px-2 py-3">
    <div class="col-4">
    <input type="submit" value="Add User"class="btn btn-info" >
    </div>
</div>
</form>