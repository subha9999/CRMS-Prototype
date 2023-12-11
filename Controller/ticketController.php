<?php
include ("session.php");
include ('../Model/TicketModel.php');
$_POST['id']=$_SESSION['id'];
$id=$_POST['id'];
if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['ticketID'])){
    $ticketID=$_GET['ticketID'];
    getTicketDetails($ticketID);    
    include ('../View/viewTicket.php');
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['customer'])){
$customer_id=$_POST['customer'];
$priority=$_POST['priority'];
$subject=$_POST['subject'];
$creationDateAndTime=$_POST['creationDate'];
$ticketDesc=$_POST['ticketDescription'];
submitTicket($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject);
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty( $_POST["status"])){
    $newStatus=$_POST['status'];
    $ticketID=$_POST['hiddenTicketID'];
    $updateDateandTime=$_POST['updateDate'];
    changeStatus($ticketID,$newStatus,$updateDateandTime);
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty( $_POST["priority"])){
    $newPriority=$_POST['priority'];
    $ticketID=$_POST['hiddenTicketID'];
    $updateDateandTime=$_POST['updateDate'];
    changePriority($ticketID,$newPriority,$updateDateandTime);
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty( $_POST["hiddenTicketID"])){
    $deleteTicketID=$_POST["hiddenTicketID"];
    deleteTicket($deleteTicketID);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty( $_GET["oldAgentID"] ) ){
    $oldAgentID=$_GET["oldAgentID"];
    $newAgentID=$_GET["newAgentID"];
    updateTicketAgent($oldAgentID,$newAgentID);
}
?>