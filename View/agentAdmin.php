<?php 
include "header.php";
include "navbar.php";
include "../Controller/adminController.php";
?>
<div class="container-fluid">
  <!--Main row -->
  <div class="row">
    <!--1st column for sidebar -->
    <div class="col-2 fixed-sidebar"><?php include"admin_sidebar.php"; ?></div>
    <!--2nd column for the main content-->
    <div class="col-10 px-5 py-3" id="adminTicket">
      <!--1st row-->
<div class="container py-2 px-3">
<div class="container pt-2 bg-light">
<table class="table border-dark px-2 py-2" id="agentTable">
  <thead style="background-color:darkturquoise">
    <tr>
      <th scope="col">Agent ID</th>
      <th scope="col">Agent Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody style="background-color:ghostwhite">
  <?php while($agentRow=mysqli_fetch_assoc($agentInfo)){ ?>
    <tr>
      <th scope="row"><?php echo $agentRow["agentID"];?></th>
      <td><?php echo $agentRow["agent_fname"]." ".$agentRow["agent_lname"]; ?></td>
      <td><?php echo $agentRow["email"];?></td>
      <td><?php echo $agentRow["contact"]; ?></td>
      <td>
        <div class="d-flex justify-content-between">

            <form action="../Controller/AgentController.php" method="GET">
                <input type="hidden" name="agentID" value="<?php echo $agentRow["agentID"]; ?>">
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
  </div>
  <!--Script-->
  <script>$('#agentTable').DataTable({
    pagingType:'full',
    lengthMenu: [
        [7,10, 25, 50, -1],
        [7,10, 25, 50, 'All']
    ]
  });
</script>