<?php 
include ("../Controller/adminController.php");?>
<div class="container bg-light py-3 px-3" id="target">
<button type="button" class="btn btn-info m-2" onclick="goBackToadminTicket()">Go Back</button>
<table class="table border-dark px-2 py-2" >
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
  <?php while($allTicketsRow=mysqli_fetch_assoc($allTicketsInfo)){ ?>
    <tr>
      <th scope="row"><?php echo $allTicketsRow['ticketID'];?></th>
      <td><?php echo $allTicketsRow['subject'];?></td>
      <td><?php echo $allTicketsRow['description'];?></td>
      <td><?php echo $allTicketsRow['status'];?></td>
      <td><?php echo $allTicketsRow['priority'];?></td>
      <td><?php echo $allTicketsRow['created_at'];?></td>
      <td><?php echo $allTicketsRow['updated_at'];?></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ticketModal">
  View Ticket
</button></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </div>
  <script>$('.table').DataTable({
    ordering: false,
    lengthMenu: [
        [5,10, 25, 50, -1],
        [5,10, 25, 50, 'All']
    ]
  });</script>



  <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ticketModalLabel">Ticket #</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">Save changes</button>
      </div>
    </div>
  </div>
</div>