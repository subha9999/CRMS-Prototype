<?php
function showCustomer($id){
    include "../Configuration/database.php";
    global $customer_row,$ticketRow;
    $customer="SELECT * FROM customers WHERE customerID='$id'";
    $customerInfo=mysqli_query($link,$customer);
    $customer_row=mysqli_fetch_array($customerInfo);
    $ticket="SELECT COUNT(ticketID) AS noOfTickets FROM tickets WHERE customerID='$id'";
    $ticketInfo=mysqli_query($link,$ticket);
    $ticketRow=mysqli_fetch_array($ticketInfo,MYSQLI_ASSOC);
}
function getCustomers(){
  include "../Configuration/database.php";
  global $res,$customerRow;
  $sql="SELECT * FROM customers";
  $res=mysqli_query($link,$sql);
}
function checkCustomer($customer_fname,$customer_lname,$email,$contact,$division,$district,$address){
  include "../Configuration/database.php";
  $valid=false;
  $sql="SELECT * FROM customers WHERE customer_fname='$customer_fname' AND customer_lname='$customer_lname' AND 
  email='$email' AND contact='$contact' AND address='$address'";
  $info=mysqli_query($link,$sql);
  if(mysqli_num_rows($info) > 0){
    $row=mysqli_fetch_array($info,MYSQLI_ASSOC);
    $customerID=$row['customerID'];
  }
  else{
    $add="INSERT INTO customers(customer_fname,customer_lname,email,contact,division,district,address)
    VALUES ('$customer_fname','$customer_lname','$email','$contact','$division','$district','$address')";
    $res=mysqli_query($link,$add);
    if($res){
      $customerID=mysqli_insert_id($link);
    }
    else{
      echo '<script>alert("Failed to add a new customer")</script>';
    }
  }

  return $customerID;
}
function deleteCustomer($customerID){
  include "../Configuration/database.php";
  $sql="DELETE FROM customers WHERE customers.customerID='$customerID'";
  $res=mysqli_query($link,$sql);
  if($res){
  echo '<script>alert("Customer Deleted")</script>';
  header("Refresh:0.2,URL=../View/dashboard.php");
  }
  else {
  echo '<script>alert("Customer not Deleted")</script>';
  }
}
function showCustomersToClient($id){
  include "../Configuration/database.php";
  global $res;
  $sql="SELECT DISTINCT customers.* FROM customers JOIN tickets 
  on tickets.customerID=customers.customerID
  WHERE tickets.clientID='$id'
  GROUP BY customers.customerID;";
  $res=mysqli_query($link,$sql);
}
?>