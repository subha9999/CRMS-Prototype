<?php 
include "header.php";
include "navbar.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"lead_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-5">
      <!--1st row -->
    <div class="row px-2 py-2">
    <div class="col ">
    <div class="card" style="width: 50rem;height:20rem">
  <div class="card-body py-4">
    <div class="row">
      <div class="col">
      <br>
  <span class="material-symbols-outlined" id="admin">
shield_person
</span>
</div>
<div class="col">
  <br><br><br>
    <h5 class="card-title px-4"><?php echo $name;?></h5>
    <h6 class="card-subtitle mb-2 text-muted px-4"><?php echo $role;?></h6>
    <h6 class="px-4"> <b>Contact Number:</b><?php echo " ".$userContact;?></h6>
    <h6 class="px-4"> <b>Email:</b><?php echo " ".$userEmail;?></h6><br>
</div>
  </div>
  </div>
</div>
    </div>
    </div>
    <!--2nd row -->
<div class="row px-2 py-2">
    <div class="col">
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Edit Name
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <form action="../Controller/update.php" method="POST">
      <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="firstName" placeholder=<?php echo $_SESSION["Fname"];?>>
  </div>
  <div class="col">
    <input type="text" class="form-control" name="lastName" placeholder=<?php echo $_SESSION["Lname"];?>>
  </div>
  <div class="col">
  <input type="submit" value="Update Name"class="btn" style="background-color:#48CCCD ;">
</div>
</div>
</form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Edit Contact Details
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <form action="../Controller/update.php" method="POST">
         <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="contact" placeholder=<?php echo $userContact;?>>
  </div>
  <div class="col">
    <input type="text" class="form-control" name="email" placeholder=<?php echo $userEmail;?>>
  </div>
  <div class="col">
  <input type="submit" value="Update Details"class="btn" style="background-color:#48CCCD ;">
</div>
</div>
</form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--3rd row-->
<div class="row px-2 py-2">
    <div class="col">
    <form action="../Controller/update.php" method="POST">
    <div class="row">
      <div class="col">
    <input type="password" class="form-control" name="password" placeholder="Current Password" >
</div>
    <div class="col">
  <input type="password" class="form-control" name="newpassword" placeholder="New Password">
</div>
  <div class="col">
  <input type="password" class="form-control" name="confirmpassword" placeholder="Retype New Password">
</div>
  </div>
  <br>
  <input type="submit" value="Update Password"class="btn" style="background-color:#48CCCD ;">
</form>
  </div>
  </div>
    </div>
    </div>
    </div>
