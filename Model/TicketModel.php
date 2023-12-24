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
        echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
    }
}
function showTicketsToAdmin(){
    include ('../Configuration/database.php');
    global $totalTicket_row,$openTicket_row,$closedTicket_row,$highPriority_row,
    $mediumPriority_row,$lowPriority_row,$allTicketsRow,$allTicketsInfo,$highPriorityTicketInfo,$highPriorityTicketRow,
    $openTicketInfo,$closeTicketInfo;
    $totalTicket = "SELECT COUNT(ticketID) AS total_no_of_tickets FROM tickets";
    $totalTicketInfo=mysqli_query($link,$totalTicket);
    $totalTicket_row=mysqli_fetch_array($totalTicketInfo,MYSQLI_ASSOC);
    
    $openTicket="SELECT COUNT(ticketID) as open_tickets FROM tickets WHERE status='Open'";
    $openTicketInfo=mysqli_query($link,$openTicket);
    $openTicket_row=mysqli_fetch_array($openTicketInfo,MYSQLI_ASSOC);

    $closedTicket= "SELECT COUNT(ticketID) as closed_tickets FROM tickets WHERE status='Close'";
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

    $allTicketsSQL="SELECT * FROM tickets";
    $allTicketsInfo=mysqli_query($link,$allTicketsSQL);

    $highPriorityTicketSql="SELECT * FROM tickets WHERE priority='high'";
    $highPriorityTicketInfo=mysqli_query($link,$highPriorityTicketSql);

    $openTicket="SELECT * FROM tickets WHERE status='open'";
    $openTicketInfo=mysqli_query($link,$openTicket);
    
    $closeTicket="SELECT * FROM tickets WHERE status='close'";
    $closeTicketInfo=mysqli_query($link,$closeTicket);
}
function showTicketsToAgents($id){
    include ('../Configuration/database.php');
    global $totalTicket_row,$openTicket_row,$ticketJson,$closedTicket_row,$highPriority_row,$mediumPriority_row,$lowPriority_row;
    $totalTicket = "SELECT COUNT(ticketID) AS total_no_of_tickets FROM tickets WHERE agentID='$id'";
    $totalTicketInfo=mysqli_query($link,$totalTicket);
    $totalTicket_row=mysqli_fetch_array($totalTicketInfo,MYSQLI_ASSOC);
    
    $openTicket="SELECT COUNT(ticketID) as open_tickets FROM tickets WHERE status='Open' AND agentID='$id'";
    $openTicketInfo=mysqli_query($link,$openTicket);
    $openTicket_row=mysqli_fetch_array($openTicketInfo,MYSQLI_ASSOC);

    $closedTicket= "SELECT COUNT(ticketID) as closed_tickets FROM tickets WHERE status='Close' AND agentID='$id'";
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

    $total=$totalTicket_row["total_no_of_tickets"];
    $open=$openTicket_row["open_tickets"];
    $close=$closedTicket_row["closed_tickets"];
    $ticket=array($total,$open,$close);
    $ticketJson=json_encode($ticket);
}
function submitTicketFromAdmin($id,$customer_id,$creationDateAndTime,$ticketDesc,$subject,$client_id){
    include "../Configuration/database.php";
    $ticket="INSERT INTO tickets (status,priority,created_at,subject,description,clientID,agentID,customerID)
    VALUES ('Open','high','$creationDateAndTime','$subject','$ticketDesc','$client_id','$id','$customer_id')";
    $ticketInfo=mysqli_query($link,$ticket);
    if($ticketInfo){
        echo '<script>alert("Added a new Ticket")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
    }
}
function getTickets( ){
    include "../Configuration/database.php";
    global $ticket_row,$ticketInfo;
    $ticketSql="SELECT * FROM tickets";
    $ticketInfo=mysqli_query($link,$ticketSql);
  
  }
function getTicketDetails($ticketID){
    include '../Configuration/database.php';
    global $ticket_details_row,$clientRow, $customerRow,$agentRow;
    $sql="SELECT * FROM tickets WHERE ticketID='$ticketID'";
    $result=mysqli_query($link,$sql);
    $ticket_details_row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    $clientName="SELECT client.clientCompany AS client FROM tickets
    JOIN client ON tickets.clientID=client.clientID
    WHERE ticketID='$ticketID'";
    $clientInfo=mysqli_query($link,$clientName);
    $clientRow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);

    $customerName="SELECT customers.customer_fname AS customerFirstName,customers.customer_lname AS customerLastName FROM tickets
    JOIN customers ON tickets.customerID=customers.customerID
    WHERE ticketID='$ticketID'";
    $customerInfo=mysqli_query($link,$customerName);
    $customerRow=mysqli_fetch_array($customerInfo,MYSQLI_ASSOC);

    $agentName="SELECT agent.agent_fname AS agentFirstName,agent.agent_lname AS agentLastName FROM tickets
    JOIN agent ON tickets.agentID=agent.agentID
    WHERE ticketID='$ticketID'";
    $agentInfo=mysqli_query($link,$agentName);
    $agentRow=mysqli_fetch_array($agentInfo,MYSQLI_ASSOC);
   
}
function changeStatus($ticketID,$newStatus,$updateDateandTime,$remarks){
    include "../Configuration/database.php";
    $sql="UPDATE tickets SET status='$newStatus',updated_at='$updateDateandTime',remarks='$remarks' WHERE ticketID='$ticketID'";
    $sqlResult=mysqli_query($link,$sql);
    if($sqlResult){
        echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
    }
}
function deleteTicket($deleteTicketID){
    include "../Configuration/database.php";
    $sql="DELETE FROM tickets WHERE ticketID='$deleteTicketID'";
    $sqlResult=mysqli_query($link,$sql);
    if($sqlResult){
        echo '<script>
        alert("Done");
        window.history.go(-2);
        </script>';
        
    }
}
function updateTicketAgent($oldAgentID,$newAgentID){
    include "../Configuration/database.php";
    $sql="UPDATE `tickets` SET `agentID` = '$newAgentID' WHERE `tickets`.`agentID` ='$oldAgentID';";
    $sqlRes=mysqli_query($link,$sql);
    if($sqlRes){
        echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
    }
}
function getAgentTickets($id){
    include "../Configuration/database.php";
    global $allTicketsRes,$openTicketsRes,$closeTicketsRes,$highTicketRes,$medTicketRes,$lowTicketRes;
    $sql="SELECT * FROM tickets WHERE agentID='$id'";
    $allTicketsRes=mysqli_query($link,$sql);
    $open="SELECT * FROM tickets WHERE agentID='$id' AND status='open'";
    $openTicketsRes=mysqli_query($link,$open);
    $close="SELECT * FROM tickets WHERE agentID='$id' AND status='close'";
    $closeTicketsRes=mysqli_query($link,$close);
    $high="SELECT * FROM tickets WHERE agentID='$id' AND priority='high'";
    $highTicketRes=mysqli_query($link,$high);
    $med="SELECT * FROM tickets WHERE agentID='$id' AND priority='medium'";
    $medTicketRes=mysqli_query($link,$med);
    $low="SELECT * FROM tickets WHERE agentID='$id' AND priority='low'";
    $lowTicketRes=mysqli_query($link,$low);
}
function showTicketsToClient($id){
    include "../Configuration/database.php";
    global $result;
    $sql="SELECT * FROM tickets WHERE clientID='$id';" ;
    $result=mysqli_query($link,$sql);
}
function getTicketsForClients($id){
    include "../Configuration/database.php";
    $clientTicket=array();
    $sql="SELECT COUNT(ticketID) AS totalTickets FROM tickets WHERE clientID='$id'";
    $o_sql="SELECT COUNT(ticketID) AS openTickets FROM tickets WHERE clientID='$id' AND status='open'";
    $c_sql="SELECT COUNT(ticketID) AS closeTickets FROM tickets WHERE clientID='$id' AND status='close'";
    $res_t=mysqli_query($link,$sql);
    $res_o=mysqli_query($link,$o_sql);
    $res_c=mysqli_query($link,$c_sql);
    $row_t=mysqli_fetch_array($res_t,MYSQLI_ASSOC);
    $row_o=mysqli_fetch_array($res_o,MYSQLI_ASSOC);
    $row_c=mysqli_fetch_array($res_c,MYSQLI_ASSOC);
    $clientTicket[0]=$row_t['totalTickets'];
    $clientTicket[1]=$row_o['openTickets'];
    $clientTicket[2]=$row_c['closeTickets'];
    return $clientTicket;
}
?>