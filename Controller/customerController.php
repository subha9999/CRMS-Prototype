<?php
include ("../Model/customerModel.php");
getCustomers();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$id=$_POST['customerID'];
showCustomer($id);
include ("../View/viewCustomer.php");
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['customer_fname'])){
    $customer_fname=$_GET['customer_fname'];
    $customer_lname=$_GET['customer_lname'];
    $email=$_GET['email'];
    $contact=$_GET['contact'];
    $division=$_GET['division'];
    $district=$_GET['district'];
    $address=$_GET['address'];
    $customer_id=checkCustomer($customer_fname,$customer_lname,$email,$contact,$division,$district,$address);
    $id=$_GET['agent'];
    $subject=$_GET['subject'];
    $creationDateAndTime=$_GET['creationDate'];
    $ticketDesc=$_GET['ticketDescription'];
    $client_id=$_GET['clientID'];
    include ('../Model/TicketModel.php');
    submitTicketFromAdmin($id,$customer_id,$creationDateAndTime,$ticketDesc,$subject,$client_id);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['customerID'])){
    $customerID=$_GET['customerID'];
    $ticketID=$_GET['ticketID'];
    deleteCustomer($customerID,$ticketID);
}
?>