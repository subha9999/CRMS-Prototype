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
?>