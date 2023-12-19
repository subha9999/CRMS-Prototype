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
<div class="container py-2 px-3" id="target">
<a type="button" class="btn btn-info mb-1" onclick="goBackToPrev()">Go Back</a>
<div class="container pt-2 bg-light">
<table class="table border-dark px-2 py-2" id="closeTicketsTable">
  <thead style="background-color:darkturquoise">
    <tr>
      <th scope="col">Ticket ID</th>
      <th scope="col">Ticket Subject</th>
      <th scope="col">Ticket Description</th>
      <th scope="col">Ticket Status</th>
      <th scope="col">Ticket Priority</th>
      <th scope="col">Creation Date and Time</th>
      <th scope="col">Updated Date and Time</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody style="background-color:ghostwhite">
  <?php while($closeTicketsRow=mysqli_fetch_assoc($closeTicketInfo)){ ?>
    <tr>
      <th scope="row"><?php echo $closeTicketsRow['ticketID'];?></th>
      <td><?php echo $closeTicketsRow['subject'];?></td>
      <td><?php echo $closeTicketsRow['description'];?></td>
      <td><?php echo $closeTicketsRow['status'];?></td>
      <td><?php echo $closeTicketsRow['priority'];?></td>
      <td><?php echo $closeTicketsRow['created_at'];?></td>
      <td><?php echo $closeTicketsRow['updated_at'];?></td>
      <td>
            <form action="../Controller/ticketController.php" method="GET">
                <input type="hidden" name="ticketID" value="<?php echo $closeTicketsRow['ticketID']; ?>">
                <button type="submit" class="btn btn-success">View Ticket</button>
            </form>
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
<!--Script for datatable-->
  <script>$('#closeTicketsTable').DataTable({
    pagingType:'full',
    lengthMenu: [
        [5,10, 25, 50, -1],
        [5,10, 25, 50, 'All']
    ]
  });
</script>