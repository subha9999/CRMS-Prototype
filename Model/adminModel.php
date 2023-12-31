<?php
function getTicketDistribution(){
    include "../Configuration/database.php";
    global $clientCompany,$clientTicket,$clientTicketCount;
    $clientCompany = array();
    $clientTicket = array();
    $clientID = array();
    $clientTicketCount = array();
    $clientCompanysql="SELECT clientCompany,clientID FROM client;";
    $clientCompanyInfo=mysqli_query($link,$clientCompanysql);
    while($client_row=mysqli_fetch_assoc($clientCompanyInfo)){
        $clientCompany[] = $client_row["clientCompany"];
        $clientID[] = $client_row['clientID'];
    }
    foreach($clientID as $value){
        $clientTicket[] = $value;
    }
    foreach($clientTicket as $value){
        $clientTicketsql="SELECT COUNT(ticketID) AS no_of_ticket FROM tickets WHERE clientID='$value'";
        $clientTicketInfo=mysqli_query($link,$clientTicketsql);
        while($clientTicket_row=mysqli_fetch_assoc($clientTicketInfo)){
            $clientTicketCount[] = $clientTicket_row["no_of_ticket"];
        }
    }
    return $clientTicketCount;  
}
function getClientCompany(){
    include "../Configuration/database.php";
    global $clientCompany,$clientTicket,$clientTicketCount;
    $clientCompany = array();
    $clientCompanysql="SELECT clientCompany FROM client;";
    $clientCompanyInfo=mysqli_query($link,$clientCompanysql);
    while($client_row=mysqli_fetch_assoc($clientCompanyInfo)){
        $clientCompany[] = $client_row["clientCompany"];
    }
    return $clientCompany;
}
function getTicketPriority(){
    include "../Configuration/database.php";
    global $priority_count;
    $priority_count = array();
    $highPrioritySQL="SELECT COUNT(ticketID) AS HighPriorityTickets FROM `tickets` WHERE priority='High'";
    $highPriorityInfo=mysqli_query($link,$highPrioritySQL);
    $highPriorityRow=mysqli_fetch_assoc($highPriorityInfo);
    $mediumPrioritySQL="SELECT COUNT(ticketID) AS MediumPriorityTickets FROM `tickets` WHERE priority='Medium'";
    $mediumPriorityInfo=mysqli_query($link,$mediumPrioritySQL);
    $mediumPriorityRow=mysqli_fetch_assoc($mediumPriorityInfo);
    $lowPrioritySQL="SELECT COUNT(ticketID) AS LowPriorityTickets FROM `tickets` WHERE priority='Low'";
    $lowPriorityInfo=mysqli_query($link,$lowPrioritySQL);
    $lowPriorityRow=mysqli_fetch_assoc($lowPriorityInfo);
    $priority_count[0]=$highPriorityRow['HighPriorityTickets'];
    $priority_count[1]=$mediumPriorityRow['MediumPriorityTickets'];
    $priority_count[2]=$lowPriorityRow['LowPriorityTickets'];
    return $priority_count;
}
function getTicketStatus(){
    include "../Configuration/database.php";
    global $status_count;
    $status_count = array();
    $closedSQL="SELECT COUNT(ticketID) AS closedTickets FROM `tickets` WHERE status='close'";
    $closedInfo=mysqli_query($link,$closedSQL);
    $closedRow=mysqli_fetch_assoc($closedInfo);

    $openSQL="SELECT COUNT(ticketID) AS openTickets FROM `tickets` WHERE status='open'";
    $openInfo=mysqli_query($link,$openSQL);
    $openRow=mysqli_fetch_assoc($openInfo);
   
    $status_count[0]=$closedRow['closedTickets'];
    $status_count[1]=$openRow['openTickets'];
    return $status_count;
}
function getUserDistribution(){
    include '../Configuration/database.php';
    $totalUsers=array();
    $client="SELECT COUNT(clientID) AS noOfClients FROM client";
    $res1=mysqli_query($link,$client);
    $rowC=mysqli_fetch_array($res1,MYSQLI_ASSOC);
    $lead="SELECT COUNT(leadID) AS noOfLeads FROM team_lead";
    $res2=mysqli_query($link,$lead);
    $rowL=mysqli_fetch_array($res2,MYSQLI_ASSOC);
    $agent="SELECT COUNT(agentID) AS noOfAgents FROM agent";
    $res3=mysqli_query($link,$agent);
    $rowA=mysqli_fetch_array($res3,MYSQLI_ASSOC);
    $totalUser[0]=$rowA["noOfAgents"];
    $totalUser[1]=$rowL["noOfLeads"];
    $totalUser[2]=$rowC["noOfClients"];
    return $totalUser;
}
function totalTicket(){
    include '../Configuration/database.php';
    $ticket=array();
    $sql_1="SELECT COUNT(ticketID) AS totalTickets FROM tickets";
    $res_1=mysqli_query($link,$sql_1);
    $row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
    foreach(range(1,$row['totalTickets']) as $key){
        $ticket[]=$key;
    }
    return $ticket;
}
function allTicket(){
    include '../Configuration/database.php';
    $t_ticket=array();
    $sql_1="SELECT COUNT(ticketID) AS totalTickets FROM tickets";
    $res_1=mysqli_query($link,$sql_1);
    $row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
    foreach(range(1,$row['totalTickets']) as $key){
        $t_ticket[]=$key;
    }
    return $t_ticket;
}
function openTicket(){
    include '../Configuration/database.php';
    $o_ticket=array();
    $sql_1="SELECT COUNT(ticketID) AS openTickets FROM tickets WHERE status='open'";
    $res_1=mysqli_query($link,$sql_1);
    $row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
    foreach(range(1,$row['openTickets']) as $key){
        $o_ticket[]=$key;
    }
    return $o_ticket;
}
function closeTicket(){
    include '../Configuration/database.php';
    $c_ticket=array();
    $sql_1="SELECT COUNT(ticketID) AS Tickets FROM tickets WHERE status='close'";
    $res_1=mysqli_query($link,$sql_1);
    $row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
    foreach(range(1,$row['Tickets']) as $key){
        $c_ticket[]=$key;
    }
    return $c_ticket;
}
function getCreationDate(){
    include '../Configuration/database.php';
    $creationDate=array();
    $sql="SELECT DATE(created_at) AS date FROM tickets";
    $res=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $creationDate[]=$row['date'];
    }
    return $creationDate;
}
function viewAgents(){
    include "../Configuration/database.php";
    global $agent_info,$agentRow;
    $agentSQL="SELECT * FROM agent";
    $agent_info=mysqli_query($link,$agentSQL); 
}
?>