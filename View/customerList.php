<?php 
include "header.php";
include "navbar.php";
include "../Controller/customerController.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php
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
     ?></div>
    <!--2nd column for the main content-->
    
    <div class="col-10 px-5 py-3" id="adminTicket">
      <!--1st row-->
<div class="container py-2 px-3">
<a type="button" class="btn btn-info my-2"  onclick="goBackToPrev()">Go back</a>
<table class="table border-dark px-2 py-2" id="customerTable">
  <thead style="background-color:darkturquoise">
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody style="background-color:ghostwhite">
  <?php while($customerRow=mysqli_fetch_assoc($res)) { ?>
    <tr>
      <th scope="row"><?php echo $customerRow['customerID']; ?></th>
      <td><?php echo $customerRow['customer_fname']." ".$customerRow['customer_lname']?></td>
      <td>
        <div class="d-flex justify-content-between">
            <form action="../Controller/customerController.php" method="POST">
                <input type="hidden" name="customerID" value="<?php echo $customerRow['customerID'] ?>">
                <button type="submit" class="btn" style="background-color:cornflowerblue">View Details</button>
            </form>
       </div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
  </div>
  </div>
  </div>

  <!--Script--->
  <script>$('#customerTable').DataTable({
    pagingType:'full',
    lengthMenu: [
        [8,10, 25, 50, -1],
        [8,10, 25, 50, 'All']
    ]
  });
  </script>
 