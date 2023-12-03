<?php
function assignLead(){
    include ("../Configuration/database.php");
    global $leadResult,$leadRow;
    $leadSQL="SELECT leadID,lead_fname,lead_lname FROM `team_lead` ";
    $leadResult=mysqli_query($link,$leadSQL);
}
function showTeamLead($id){
    include "../Configuration/database.php";
    global $lead_F_Name,$lead_L_Name,$lead_email,$lead_contact, $client_name;
     $leadInfo="SELECT agent.agentID,team_lead.lead_fname,team_lead.lead_lname,team_lead.contact,team_lead.email
     FROM agent
     RIGHT JOIN team_lead
     ON agent.teamleadID = team_lead.leadID
     WHERE agentID='$id';";
     $leadResult=mysqli_query($link,$leadInfo);
     $leadInforow=mysqli_fetch_array($leadResult,MYSQLI_ASSOC);
     $lead_F_Name=$leadInforow["lead_fname"];
     $lead_L_Name=$leadInforow["lead_lname"];
     $lead_contact=$leadInforow["contact"];
     $lead_email=$leadInforow["email"];  
     $client="SELECT client.clientCompany  FROM agent
     JOIN team_lead ON agent.teamleadID = team_lead.leadID 
     JOIN client ON team_lead.client_id = client.clientID
      WHERE agent.agentID = '$id';";
    $clientInfo=mysqli_query($link,$client);
    $clientrow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
    $client_name=$clientrow["clientCompany"];
}
function addNewLead($firstName,$lastName,$email,$number,$password,$re_password,$clientID){
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
    $newLead="INSERT INTO team_lead(lead_fname,lead_lname,role,email,password,contact,client_id)
    VALUES ('$firstName','$lastName','Team Lead','$email','$password','$number','$clientID')";
    $newLeadResult=mysqli_query($link,$newLead);
  if($newLeadResult){
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