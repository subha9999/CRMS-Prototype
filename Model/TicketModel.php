<?php
function submitTicket($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject){
    include "../Configuration/database.php";
    global $client_id;
    $adminsql="SELECT * FROM admin WHERE adminID='$id';";
    $agentsql="SELECT * FROM agent WHERE agentID='$id';";
    $adminresult=mysqli_query($link,$adminsql);
    $adminrow=mysqli_fetch_array($adminresult,MYSQLI_ASSOC);
    $adminid=$adminrow['adminID'];

    $agentresult=mysqli_query($link,$agentsql);
    $agentrow=mysqli_fetch_array($agentresult,MYSQLI_ASSOC);
    $agentid=$agentrow['agentID'];

    $client="SELECT client.clientID  FROM agent
     JOIN team_lead ON agent.teamleadID = team_lead.leadID 
     JOIN client ON team_lead.client_id = client.clientID
      WHERE agent.agentID = '$id';";
    $clientInfo=mysqli_query($link,$client);
    $clientrow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
    $client_id=$clientrow["clientID"];
    $ticket="INSERT INTO tickets (status,priority,created_at,subject,description,clientID,agentID,customerID)
    VALUES ('Open','$priority','$creationDateAndTime','$subject','$ticketDesc','$client_id','$id','$customer_id')";
    $ticketInfo=mysqli_query($link,$ticket);
    if($id==$agentid){
        header ('Refresh: 1; URL =../View/agentDashboard.php');
    }
    else if($id==$adminid){
        header ('Refresh: 1; URL =../View/adminDashboard.php');
    }
}
?>