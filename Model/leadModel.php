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
    $newUser="INSERT INTO users(user_F_Name,user_L_Name,email,password,contact,role)
      VALUES ('$firstName','$lastName','$email','$password','$number','Team Lead')";
      $newUserResult=mysqli_query($link,$newUser);
      if($newUserResult){
        $userID=mysqli_insert_id($link);
    $newLead="INSERT INTO team_lead(userID,lead_fname,lead_lname,role,email,password,contact,client_id)
    VALUES ('$userID','$firstName','$lastName','Team Lead','$email','$password','$number','$clientID')";
    $newLeadResult=mysqli_query($link,$newLead);
  if($newLeadResult){
    echo '<script>alert("Added a new user")</script>';
    header('Refresh:0.2, URL=../View/leadAdmin.php');
  }
}
  else{
    echo '<script>alert("Failed to add")</script>';
    header( 'Refresh:0.2, URL= ' . $_SERVER['HTTP_REFERER'] );
  }
  }
  else if($validforPassword==false){
    echo '<script>alert("Password should be minimum 8 characters long and should have atleast 1 capital letter.")</script>';
    header( 'Refresh:0.2, URL=' . $_SERVER['HTTP_REFERER'] );
  }
  else {
    echo '<script>alert("Retype your password again")</script>';
    header( 'Refresh:0.2, URL= ' . $_SERVER['HTTP_REFERER'] );
  }
}
function showLeadToAdmin(){
    include "../Configuration/database.php";
    global $leadInfo,$leadRow;
    $leadSQL="SELECT * FROM team_lead";
    $leadInfo=mysqli_query($link,$leadSQL);
}
function getLeadDetails($leadID){
  include "../Configuration/database.php";
  global $leadRow,$clientRow,$totalAgentRow,$totalTicketRow;
  $leadSql="SELECT *FROM team_lead WHERE leadID='$leadID'";
  $leadInfo=mysqli_query($link,$leadSql);
  $leadRow=mysqli_fetch_array($leadInfo);
  $clientSql="SELECT client.clientCompany AS client
  FROM team_lead JOIN client ON team_lead.client_id = client.clientID WHERE team_lead.leadID='$leadID';";
  $clientInfo=mysqli_query($link,$clientSql);
  $clientRow=mysqli_fetch_array($clientInfo);
  $totalAgents="SELECT COUNT(agent.agentID) AS totalAgents
  FROM team_lead JOIN agent ON agent.teamleadID = team_lead.leadID WHERE team_lead.leadID='$leadID';";
  $totalAgentInfo=mysqli_query($link,$totalAgents);
  $totalAgentRow=mysqli_fetch_array($totalAgentInfo,MYSQLI_ASSOC);
  $totalTicket="SELECT team_lead.leadID,COUNT(tickets.ticketID) AS totalTicketsHandled
  FROM team_lead
  JOIN agent ON team_lead.leadID = agent.teamleadID
  JOIN tickets ON agent.agentID = tickets.agentID
  WHERE team_lead.leadID = '$leadID'";
  $totalTicketInfo=mysqli_query($link,$totalTicket);
  $totalTicketRow=mysqli_fetch_array($totalTicketInfo,MYSQLI_ASSOC);

}
function deleteLead($leadID){
  include "../Configuration/database.php";
  $info="SELECT * FROM team_lead WHERE leadID='$leadID'";
  $res=mysqli_query($link,$info);
  $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
  $userID=$row["userID"];
  $sql="DELETE FROM team_lead WHERE team_lead.leadID='$leadID'";
  $sqlResult=mysqli_query($link,$sql);
  if($sqlResult){
  $del="DELETE FROM users WHERE userID='$userID'";
  $delRes=mysqli_query($link,$del);
  if($delRes){
    echo '<script>alert("Done")</script>';
    header("Refresh:0.2,URL=../View/leadAdmin.php");
  }
}
  else{
    echo "Error";
  }
}
function getLeadAgents(){
  include "../Configuration/database.php";
  $leadID=array();
  $sql="SELECT * FROM team_lead";
  $result=mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $leadID[]=$row["leadID"];
  }

  return $leadID;


}
function showLeadToClient($id){
  include "../Configuration/database.php";
  global $leadInfo,$leadRow;
  $leadSQL="SELECT * FROM team_lead WHERE client_id='$id'";
  $leadInfo=mysqli_query($link,$leadSQL);
  $leadRow=mysqli_fetch_array($leadInfo,MYSQLI_ASSOC);
}
function getAvgResTime($id){
  include "../Configuration/database.php";
  $resolvingTime=array();
  $sql="SELECT
  agent.agentID,
  AVG(TIMESTAMPDIFF(MINUTE, created_at, updated_at)) AS avg_resolution_time_in_Hrs
FROM
  agent
  JOIN team_lead ON agent.teamleadID = team_lead.leadID
  JOIN tickets ON agent.agentID = tickets.agentID
WHERE
  team_lead.leadID = '$id'
GROUP BY
  agent.agentID;";
  $result=mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
   $resolvingTime[]=$row['avg_resolution_time_in_Hrs'];
  }
  return $resolvingTime;

}
function getAgentsID($id){
  include "../Configuration/database.php";
  $agentsID=array();
  $sql="SELECT agent.agentID AS agentID
FROM agent
  JOIN team_lead ON agent.teamleadID = team_lead.leadID
  JOIN tickets ON agent.agentID = tickets.agentID
WHERE  team_lead.leadID = '211'
GROUP BY  agent.agentID;";
  $result=mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $agentsID[]=$row['agentID'];
   }
   return $agentsID;
}
function getDetailsForLead($id){
  include "../Configuration/database.php";
  global $agentCount,$ticketCount;
  $sql="SELECT COUNT(agentID) AS agentCount FROM agent WHERE teamleadID='$id';
 SELECT COUNT(tickets.ticketID) AS totalTickets FROM tickets
JOIN agent ON tickets.agentID=agent.agentID
JOIN team_lead ON team_lead.leadID=agent.teamleadID
WHERE team_lead.leadID='$id'";
  if (mysqli_multi_query($link, $sql)) {
    $queryIndex = 0; 
    do {
      if ($result = mysqli_store_result($link)) {
        $row[$queryIndex] = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        $queryIndex++;
      }
    } while (mysqli_next_result($link));
  }
  $agentCount = $row[0]["agentCount"];
  $ticketCount=$row[1]['totalTickets'];
}
function showAgentToLead($id){
  include "../Configuration/database.php";
  global $agentInfo;
  $sql="SELECT * FROM agent WHERE teamleadID='$id'";
  $agentInfo=mysqli_query($link,$sql);
}
function showTicketInfoToLead($id){
  include "../Configuration/database.php";
  global $result;
  $sql="SELECT * FROM tickets
  JOIN agent ON tickets.agentID=agent.agentID
  JOIN team_lead ON team_lead.leadID=agent.teamleadID
  WHERE team_lead.leadID='$id';";
  $result=mysqli_query($link,$sql);
}
function showClientToLead($id){
  include "../Configuration/database.php";
  global $client_row;
  $sql="SELECT client.representative_fname,client.representative_lname,client.clientCompany,client.email AS clientEmail,client.contact AS clientContact
  FROM client JOIN team_lead ON client.clientID=team_lead.client_id WHERE team_lead.leadID='$id'";
  $info=mysqli_query($link,$sql);
  $client_row=mysqli_fetch_array($info,MYSQLI_ASSOC);
}
function getTicketCountForLead($id){
  include "../Configuration/database.php";
  $ticketCount=array();
  $sql=" SELECT COUNT(tickets.ticketID) AS totalTickets FROM tickets
 JOIN agent ON tickets.agentID=agent.agentID
 JOIN team_lead ON team_lead.leadID=agent.teamleadID
 WHERE team_lead.leadID='$id'";
 $res=mysqli_query($link,$sql);
 $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
$sql_1="SELECT COUNT(tickets.ticketID) AS openTickets FROM tickets
JOIN agent ON tickets.agentID=agent.agentID
JOIN team_lead ON team_lead.leadID=agent.teamleadID
WHERE team_lead.leadID='$id' AND status='open'";
$res_1=mysqli_query($link,$sql_1);
$row_1=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
$sql_2="SELECT COUNT(tickets.ticketID) AS closeTickets FROM tickets
JOIN agent ON tickets.agentID=agent.agentID
JOIN team_lead ON team_lead.leadID=agent.teamleadID
WHERE team_lead.leadID='$id' AND status='close'";
$res_2=mysqli_query($link,$sql_2);
$row_2=mysqli_fetch_array($res_2,MYSQLI_ASSOC);
$ticketCount[0]=$row['totalTickets'];
$ticketCount[1]=$row_1['openTickets'];
$ticketCount[2]=$row_2['closeTickets'];
return $ticketCount;
}
?>