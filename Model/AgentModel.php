<?php
function addNewAgent($firstName,$lastName,$email,$number,$password,$re_password,$leadID){
  include ("../Configuration/database.php");
  $validforPassword=true;
  if (!preg_match('/[A-Z]/', $password)) {
      $validforPassword=false;  
  }
  
  if (!preg_match('/[a-z]/', $password)) {
      $validforPassword=false;
  }
  
  if (!preg_match('/[0-9]/', $password) ||strlen($password) < 8 ) {
      $validforPassword=false;
  }
  if($validforPassword==true && $password==$re_password)
  {
  $newAgentSQL="INSERT INTO agent (agent_fname,agent_lname,email,password,contact,role,teamleadID)
  VALUES ('$firstName','$lastName','$email','$password','$number','Agent','$leadID')";
  $newAgent=mysqli_query($link,$newAgentSQL);
  if($newAgent){
    echo "Done";
    header('Refresh:0.2, URL=../View/adminDashboard.php');
  }
  else{
    echo "Failed to add";
  }
  }
  else if($validforPassword==false){
    echo "Password should be minimum 8 characters long and should have atleast 1 capital letter.";
  }
  else {
    echo "Retype your password again";
  }
}
?>