<?php
include ("session.php");
$_POST['id']=$_SESSION['id'];
$id=$_POST['id'];
$customer_id=$_POST['customer'];
$priority=$_POST['priority'];
$subject=$_POST['subject'];
$creationDateAndTime=$_POST['creationDate'];
$ticketDesc=$_POST['ticketDescription'];
include ('../Model/TicketModel.php');
submitTicket($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject);
?>