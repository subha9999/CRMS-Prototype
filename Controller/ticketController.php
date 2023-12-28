<?php
include ("session.php");
include ('../Model/TicketModel.php');
include ('../Model/customerModel.php');
$_POST['id']=$_SESSION['id'];
$id=$_POST['id'];
if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['ticketID'])){
    $ticketID=$_GET['ticketID'];
    getTicketDetails($ticketID);  
    include "../View/viewTicket.php";  
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['customer_fname'])){
    $customer_fname=$_POST['customer_fname'];
    $customer_lname=$_POST['customer_lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $division=$_POST['division'];
    $district=$_POST['district'];
    $address=$_POST['address'];
    $customer_id=checkCustomer($customer_fname,$customer_lname,$email,$contact,$division,$district,$address);
    $priority=$_POST['priority'];
    $subject=$_POST['subject'];
    $creationDateAndTime=$_POST['creationDate'];
    $ticketDesc=$_POST['ticketDescription'];
submitTicket($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject);
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty( $_POST["status"])){
    $newStatus=$_POST['status'];
    $id=$_POST['id'];
    $ticketID=$_POST['hiddenTicketID'];
    $updateDateandTime=$_POST['updateDate'];
    $remarks=$_POST['remarks'];
    changeStatus($id,$ticketID,$newStatus,$updateDateandTime,$remarks);
}

else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty( $_POST["hiddenTicketID"])){
    $deleteTicketID=$_POST["hiddenTicketID"];
    $id=$_POST['id'];
    deleteTicket($id,$deleteTicketID);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty( $_GET["oldAgentID"] ) ){
    $oldAgentID=$_GET["oldAgentID"];
    $newAgentID=$_GET["newAgentID"];
    updateTicketAgent($oldAgentID,$newAgentID);
}
if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['ticketID'])){
    $ticketID=$_POST['ticketID'];
    getTicketDetails($ticketID);  
    include "../View/agentViewTicket.php";  
}
?>
