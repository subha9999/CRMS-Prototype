<?php include("../Controller/AgentController.php");?>
 <!--1st row-->
 <div class="row px-2 py-3">
    <div class="col">
 <button type="button" class="btn btn-info"  onclick="goBack(<?php echo $id;?>)">Go back</button>
</div>
 </div>
  <!--2nd row-->
 <div class="row px-3 py-4 bg-light">
    <div class="col">
    <div class="container-fluid px-3 py-5">
        <ul class="nav flex-column">
            <div class="row px-5 m-2">
        <h2 class="teamLead">Team Lead </h2>

</div>
        <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
    <span class="material-symbols-outlined">
badge
</span>
</span> Name: <?php echo $lead_F_Name." ".$lead_L_Name ;?></a>
  </li> 
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href=""><span class="material-symbols-outlined">
contact_page</span>
<i>Contact Number:</i><?php echo " " .$lead_contact;?></a>
  </li> 
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
contact_mail</span>
<i>Email:</i><?php echo " ".$lead_email;?></a>
  </li>
  <li class="nav-item py-3 ps-5">
    <a class="nav-link text-dark" href="">
    <span class="material-symbols-outlined">
partner_exchange
</span>
<i>Client:</i><?php echo " ".$client_name;?></a>
  </li> 
        </ul>
</div>
</div>
</div>
     