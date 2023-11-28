<?php
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
function showClientName($id){
    include "../Configuration/database.php";
    global $client_name;
    $client="SELECT client.clientCompany  FROM agent
     JOIN team_lead ON agent.teamleadID = team_lead.leadID 
     JOIN client ON team_lead.client_id = client.clientID
      WHERE agent.agentID = '$id';";
    $clientInfo=mysqli_query($link,$client);
    $clientrow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
    $client_name=$clientrow["clientCompany"];
}
function showCustomerNames($id){
    include "../Configuration/database.php";
    global $client_id,$customer_row,$customerInfo;
    $client="SELECT client.clientID  FROM agent
     JOIN team_lead ON agent.teamleadID = team_lead.leadID 
     JOIN client ON team_lead.client_id = client.clientID
      WHERE agent.agentID = '$id';";
    $clientInfo=mysqli_query($link,$client);
    $clientrow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
    $client_id=$clientrow["clientID"];
    $customer="SELECT * FROM customers WHERE clientID='$client_id'";
    $customerInfo=mysqli_query($link,$customer);
}
?>