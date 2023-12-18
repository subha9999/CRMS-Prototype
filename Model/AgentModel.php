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
    $newUser="INSERT INTO users(user_F_Name,user_L_Name,email,password,contact,role)
    VALUES ('$firstName','$lastName','$email','$password','$number','Agent')";
    $newUserResult=mysqli_query($link,$newUser);
    if($newUserResult){
      $userID=mysqli_insert_id($link);
  $newAgentSQL="INSERT INTO agent (userID,agent_fname,agent_lname,email,password,contact,role,teamleadID)
  VALUES ('$userID','$firstName','$lastName','$email','$password','$number','Agent','$leadID')";
  $newAgent=mysqli_query($link,$newAgentSQL);
  if($newAgent){
    echo '<script>alert("Added a new user")</script>';
    header('Refresh:0.2, URL=../View/agentAdmin.php');
  }
}
  else{
    echo '<script>alert("Failed to add")</script>';
    header( 'Refresh:0.2, URL= ' . $_SERVER['HTTP_REFERER'] );
  }
  }
  else if($validforPassword==false){
    echo '<script>alert("Password should be minimum 8 characters long and should have atleast 1 capital letter.")</script>';
    header( 'Refresh:0.2, URL= ' . $_SERVER['HTTP_REFERER'] );
  }
  else {
    echo '<script>alert("Retype your password again")</script>';
    header( 'Refresh:0.2, URL=' . $_SERVER['HTTP_REFERER'] );
  }
}
function showAgentToAdmin(){
  include "../Configuration/database.php";
  global $agentInfo,$agentRow;
  $agentSQL="SELECT * FROM agent";
  $agentInfo=mysqli_query($link,$agentSQL);
}
function getAgentDetails($agentID){
  include "../Configuration/database.php";
  global $agentInfo,$agentRow,$leadRow,$totalTicketRow,$assignedTicketRow,$resolvedTicketRow,$avgResTimeRow,$allAgents,$allAgentInfo;
  $agentSQL="SELECT * FROM agent WHERE agentID='$agentID'";
  $agentInfo=mysqli_query($link,$agentSQL);
  $agentRow=mysqli_fetch_array($agentInfo,MYSQLI_ASSOC);
  $leadSQL="SELECT team_lead.leadID,team_lead.lead_fname AS lead_Fname,team_lead.lead_lname AS lead_Lname
   FROM agent JOIN team_lead ON team_lead.leadID=agent.teamleadID WHERE agent.agentID='$agentID';";
  $leadInfo=mysqli_query($link,$leadSQL);
  $leadRow=mysqli_fetch_array($leadInfo,MYSQLI_ASSOC);
  $totalTicket="SELECT agent.agentID,COUNT(tickets.ticketID) AS totalTickets FROM agent JOIN tickets ON agent.agentID=tickets.agentID WHERE agent.agentID='$agentID';";
  $totalTicketInfo=mysqli_query($link,$totalTicket);
  $totalTicketRow=mysqli_fetch_array($totalTicketInfo,MYSQLI_ASSOC);
  $assignedTickets= "SELECT agent.agentID,COUNT(tickets.ticketID) AS assignedTickets FROM agent
   JOIN tickets ON agent.agentID=tickets.agentID WHERE agent.agentID='$agentID'AND status='Open';";
  $assignedTicketInfo=mysqli_query($link,$assignedTickets);
  $assignedTicketRow=mysqli_fetch_array($assignedTicketInfo,MYSQLI_ASSOC);
  $resolvedTickets="SELECT agent.agentID,COUNT(tickets.ticketID) AS resolvedTickets FROM agent
  JOIN tickets ON agent.agentID=tickets.agentID WHERE agent.agentID='$agentID'AND status='Close';";
  $resolvedTicketInfo=mysqli_query($link,$resolvedTickets);
  $resolvedTicketRow=mysqli_fetch_array($resolvedTicketInfo,MYSQLI_ASSOC);
  $avgeResTime="SELECT ticketID,AVG(TIMESTAMPDIFF(HOUR, created_at, updated_at)) AS resolution_time_in_Hrs
  FROM tickets WHERE agentID='$agentID';";
  $avgResTimeInfo=mysqli_query($link,$avgeResTime);
  $avgResTimeRow=mysqli_fetch_array($avgResTimeInfo,MYSQLI_ASSOC);
  $allAgentSql="SELECT * FROM agent";
  $allAgentInfo=mysqli_query($link,$allAgentSql);
}
function deleteAgent($agentID){
  include "../Configuration/database.php";
  $info="SELECT * FROM agent WHERE agentID='$agentID'";
  $res=mysqli_query($link,$info);
  $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
  $userID=$row["userID"];
  $sql="DELETE FROM agent WHERE agentID='$agentID'";
  $sqlResult=mysqli_query($link,$sql);
  if($sqlResult){
    $del="DELETE FROM users WHERE userID='$userID'";
  $delRes=mysqli_query($link,$del);
  if($delRes){
    echo '<script>alert("Done")</script>';
    header("Refresh:0.2,URL=../View/agentAdmin.php");
  }
}
  else{
    echo "Error";
  }
}
function updateAgentLead($oldLeadID,$newLeadID){
  include "../Configuration/database.php";
  $sql="UPDATE `agent` SET `teamleadID` = '$newLeadID' WHERE agent.teamleadID ='$oldLeadID';";
    $sqlRes=mysqli_query($link,$sql);
    if($sqlRes){
        echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL=' . $_SERVER['HTTP_REFERER'] );
    }
  
}
function getAgentCount(){
  include "../Configuration/database.php";
  global $agentCount;
  $leadID=array();
  $agentCount=array();
  $sql="SELECT * FROM team_lead";
  $result=mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $leadID[]=$row["leadID"];
  }
  foreach($leadID as $value){
    $sql1="SELECT COUNT(agentID) AS agentCount FROM agent WHERE teamleadID='$value'";
    $res=mysqli_query($link,$sql1);
    while($row1=mysqli_fetch_assoc($res)){
      $agentCount[]=$row1["agentCount"];
    }
  }
  return $agentCount;

}
?>