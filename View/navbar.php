<?php 
include("../Controller/session.php");
?>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-light" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand px-3" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <img src="../Images/Genex-Logo.png" width=150px></a>
    <ul class="nav justify-content-end">
  <li class="nav-item">
  <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#alertModal">
  <span class="material-symbols-outlined">
notifications
</span>
</button>
  </li>
  <li class="nav-item px-2">
  <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#profileModal">
    <span class="material-symbols-outlined">
account_circle
</span><h7 style="color:#48CCCD"><?php echo $role; ?><h7></button>
  </li>
</ul>
  </div>
</nav>

<!--Profile Modal-->
<div class="modal fade" id="profileModal"  aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul class="nav flex-column">
        <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
account_box
</span><?php echo $name;?></a>
  </li> 
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href=""><span class="material-symbols-outlined">
contact_page</span>
<i>Contact Number:</i><?php echo " " .$userContact;?></a>
  </li> 
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
contact_mail</span>
<i>Email:</i><?php echo " ".$userEmail;?></a>
  </li> 
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:#48CCCD">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Alert Modal-->
<div class="modal fade" id="alertModal"  aria-labelledby="alertModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertModalLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="notification">
<?php 
include ("../Controller/notificationsController.php");

?>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:#48CCCD">Close</button>
      </div>
    </div>
  </div>
</div>
</div>