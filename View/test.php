<?php
echo $_GET['customer_fname'].
" ".$_GET['customer_lname']." ".$_GET['email']." ".$_GET['contact']." ".$_GET['division']." ".$_GET['district']." ".$_GET['address'];
$customer_fname=$_GET['customer_fname'];
$customer_lname=$_GET['customer_lname'];
$email=$_GET['email'];
$contact=$_GET['contact'];
$division=$_GET['division'];
$district=$_GET['district'];
$address=$_GET['address'];
include "../Controller/customerController.php";
$id=checkCustomer($customer_fname,$customer_lname,$email,$contact,$division,$district,$address);
echo $id;
?>