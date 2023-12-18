<?php 
include "header.php";
include "navbar.php";
include"../Controller/leadController.php";
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

<div class="px-5" style="background-color:ghostwhite">
    <div class="row">
        <div class="col py-4" >
        <table class="table border-dark px-2 py-2" id="leadTable">
  <thead style="background-color:darkturquoise">
    <tr>
      <th scope="col">Lead ID</th>
      <th scope="col">Lead Name</th>
      <th scope="col">Lead Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody style="background-color:ghostwhite">
  <?php while($leadRow=mysqli_fetch_assoc($leadInfo)){ ?>
    <tr>
      <th scope="row"><?php echo $leadRow['leadID']; ?></th>
      <td><?php echo $leadRow['lead_fname']." ".$leadRow['lead_lname'];?></td>
      <td><?php echo $leadRow['email'];?></td>
      <td>
        <div class="d-flex justify-content-between">
            <form action="../Controller/leadController.php" method="GET">
                <input type="hidden" name="leadID" value="<?php  echo $leadRow['leadID'];?>">
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
  </div>
  </div>
  </div>
  <!--Script--->
  <script>$('#leadTable').DataTable({
    pagingType:'full',
    lengthMenu: [
        [7,10, 25, 50, -1],
        [7,10, 25, 50, 'All']
    ]
  });
  </script>