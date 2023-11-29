<?php 
include "header.php";
include "navbar.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" id="showForm">
      <?php include "../View/adminDashMain.php"; ?>
    </div>
    </div>
    </div>
