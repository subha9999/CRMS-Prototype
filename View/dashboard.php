<?php include "header.php"; 
include "navbar.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar">
    <?php
    if($_SESSION['role']=='Agent'){
      include '../View/agent_sidebar.php';
    }
    else if($_SESSION['role']=='Admin'){
     include"../View/admin_sidebar.php"; 
    }
    else if($_SESSION['role']=='Team Lead'){
      include "../View/lead_sidebar.php";
    }
    else{
      include "../View/client_sidebar.php";
    }
     ?>
     </div>
    <!--2nd column for the main content-->
    
   <?php 
   if($_SESSION['role']=='Agent'){
    echo '<div class="col-10 px-5 py-2" id="showForm">';
    include "agentDashMain.php"; 
    echo '</div>';
  }
  else if($_SESSION['role']=='Admin'){
    echo '<div class="col-10 px-5 py-3" id="showForm">';
    include "../View/adminDashMain.php"; 
    echo '</div>'; 
  }
  else if($_SESSION['role']=='Team Lead'){
    include "../View/leadDashMain.php";
  }
  else{
    include('../View/clientDashMain.php');
  }
    ?>
    </div>
    </div>
    </div>
