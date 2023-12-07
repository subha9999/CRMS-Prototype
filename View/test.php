<div id="showData">
   <?php include "../Configuration/database.php";
   $q=$_GET['q'];
   $sql="SELECT * FROM tickets WHERE ticketID='$q'";
   $result=mysqli_query($link,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row){?>
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
    </tr>
  </thead>
  <tbody style="background-color:ghostwhite">
  <tr>
      <th scope="row"><?php echo $row['ticketID'];?></th>
      <td><?php echo $row['subject'];?></td>
      <td><?php echo $row['description'];?></td>
      <td><?php echo $row['status'];?></td>
      <td><?php echo $row['priority'];?></td>
      <td><?php echo $row['created_at'];?></td>
      <td><?php echo $row['updated_at'];?></td>
    </tr>
    <?php } ?>
</div>
