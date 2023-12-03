<form action="../Controller/clientController.php" method="POST"> 
<div class="row pt-3">
  <div class="col-4">
  <label for="Firstname" class="form-label">Client Representative First Name</label>
</div>
<div class="col-4">
    <input type="text" class="form-control" placeholder="First name" name="firstName" id="Firstname">
</div>
</div>
<div class="row pt-4">
  <div class="col-4">
  <label for="Lastname" class="form-label">Client Representative Last Name</label>
</div>
  <div class="col-4">
<input type="text" class="form-control" placeholder="Last name" name="lastName" id="Lastname">
</div>
</div>
<div class="row pt-4">
  <div class="col-4">
  <label for="Email" class="form-label">Client Representative Email</label>
</div>
<div class="col-4">
<input type="text" class="form-control" placeholder="Email" name="email" id="Email">
</div>
</div>
<div class="row pt-4 ">
  <div class="col-4">
  <label for="number" class="form-label">Client Representtive Contact Number</label>
</div>
<div class="col-4">
<input type="text" class="form-control" placeholder="Contact Number" name="number" id="number">
</div>
</div>
<div class="row pt-4 ">
  <div class="col-4">
  <label for="companyName" class="form-label">Client Company</label>
</div>
<div class="col-4">
<input type="text" class="form-control" placeholder="Company Name" name="companyName" id="companyName">
</div>
</div>
<div class="row pt-4  ">
  <div class="col-4">
  <label for="password" class="form-label">Password</label>
</div>
<div class="col-4">
<input type="password" class="form-control" placeholder="Password" name="password" id="password">
</div>
</div>
<div class="row pt-4 pb-3 ">
  <div class="col-4">
  <label for="re-password" class="form-label">Retype Password</label>
</div>
<div class="col-4">
<input type="password" class="form-control" placeholder="Retype Password" name="re-password" id="re-password">
</div>
</div>
<!--4th row-->
<div class="row px-2 py-3">
    <div class="col-4">
    <input type="submit" value="Add User"class="btn btn-info" >
    </div>
</div>
</form>