<?php
function submitTicket($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject){
    include "../Configuration/database.php";
    global $client_id;

    $agentsql="SELECT * FROM agent WHERE agentID='$id';";

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
    if($ticketInfo){
        header ('Refresh: 1; URL =../View/agentDashboard.php');
    }
}
function showTicketsToAdmin(){
    include ('../Configuration/database.php');
    global $totalTicket_row,$openTicket_row,$closedTicket_row,$highPriority_row,$mediumPriority_row,$lowPriority_row;
    $totalTicket = "SELECT COUNT(ticketID) AS total_no_of_tickets FROM tickets";
    $totalTicketInfo=mysqli_query($link,$totalTicket);
    $totalTicket_row=mysqli_fetch_array($totalTicketInfo,MYSQLI_ASSOC);
    
    $openTicket="SELECT COUNT(ticketID) as open_tickets FROM tickets WHERE status='Open'";
    $openTicketInfo=mysqli_query($link,$openTicket);
    $openTicket_row=mysqli_fetch_array($openTicketInfo,MYSQLI_ASSOC);

    $closedTicket= "SELECT COUNT(ticketID) as closed_tickets FROM tickets WHERE status='Closed'";
    $closedTicketInfo=mysqli_query($link,$closedTicket);
    $closedTicket_row=mysqli_fetch_array($closedTicketInfo,MYSQLI_ASSOC);

    $highPriorityTicket="SELECT COUNT(ticketID) AS high_PriorityTickets FROM tickets WHERE priority='high'";
    $highPriorityInfo=mysqli_query($link,$highPriorityTicket);
    $highPriority_row=mysqli_fetch_array($highPriorityInfo,MYSQLI_ASSOC);

    $mediumPriorityTicket= "SELECT COUNT(ticketID) AS medium_PriorityTickets FROM tickets WHERE priority='medium'";
    $mediumPriorityInfo=mysqli_query($link,$mediumPriorityTicket);
    $mediumPriority_row=mysqli_fetch_array($mediumPriorityInfo,MYSQLI_ASSOC);

    $lowPriorityTicket= "SELECT COUNT(ticketID) AS low_PriorityTickets FROM tickets WHERE priority='low'";
    $lowPriorityInfo=mysqli_query($link,$lowPriorityTicket);
    $lowPriority_row=mysqli_fetch_array($lowPriorityInfo,MYSQLI_ASSOC);
}
function showTicketsToAgents($id){
    include ('../Configuration/database.php');
    global $totalTicket_row,$openTicket_row,$closedTicket_row,$highPriority_row,$mediumPriority_row,$lowPriority_row;
    $totalTicket = "SELECT COUNT(ticketID) AS total_no_of_tickets FROM tickets WHERE agentID='$id'";
    $totalTicketInfo=mysqli_query($link,$totalTicket);
    $totalTicket_row=mysqli_fetch_array($totalTicketInfo,MYSQLI_ASSOC);
    
    $openTicket="SELECT COUNT(ticketID) as open_tickets FROM tickets WHERE status='Open' AND agentID='$id'";
    $openTicketInfo=mysqli_query($link,$openTicket);
    $openTicket_row=mysqli_fetch_array($openTicketInfo,MYSQLI_ASSOC);

    $closedTicket= "SELECT COUNT(ticketID) as closed_tickets FROM tickets WHERE status='Closed' AND agentID='$id'";
    $closedTicketInfo=mysqli_query($link,$closedTicket);
    $closedTicket_row=mysqli_fetch_array($closedTicketInfo,MYSQLI_ASSOC);

    $highPriorityTicket="SELECT COUNT(ticketID) AS high_PriorityTickets FROM tickets WHERE priority='high' AND agentID='$id'";
    $highPriorityInfo=mysqli_query($link,$highPriorityTicket);
    $highPriority_row=mysqli_fetch_array($highPriorityInfo,MYSQLI_ASSOC);

    $mediumPriorityTicket= "SELECT COUNT(ticketID) AS medium_PriorityTickets FROM tickets WHERE priority='medium' AND agentID='$id'";
    $mediumPriorityInfo=mysqli_query($link,$mediumPriorityTicket);
    $mediumPriority_row=mysqli_fetch_array($mediumPriorityInfo,MYSQLI_ASSOC);

    $lowPriorityTicket= "SELECT COUNT(ticketID) AS low_PriorityTickets FROM tickets WHERE priority='low' AND agentID='$id'";
    $lowPriorityInfo=mysqli_query($link,$lowPriorityTicket);
    $lowPriority_row=mysqli_fetch_array($lowPriorityInfo,MYSQLI_ASSOC);
}
function submitTicketFromAdmin($id,$priority,$customer_id,$creationDateAndTime,$ticketDesc,$subject){
    include "../Configuration/database.php";
    $client="SELECT clientID FROM customers
    WHERE customerID = '$customer_id';";
   $clientInfo=mysqli_query($link,$client);
   $clientrow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
   $client_id=$clientrow["clientID"];
    $ticket="INSERT INTO tickets (status,priority,created_at,subject,description,clientID,agentID,customerID)
    VALUES ('Open','$priority','$creationDateAndTime','$subject','$ticketDesc','$client_id','$id','$customer_id')";
    $ticketInfo=mysqli_query($link,$ticket);
    if($ticketInfo){
        header ('Refresh: 1; URL =../View/adminTicket.php');
    }
}
?>