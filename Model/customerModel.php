<?php
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