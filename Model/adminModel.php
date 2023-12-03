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
    global $highPriorityTicket,$mediumPriorityTicket,$lowPriorityTicket;
    $highPriorityTicket = array();
    $mediumPriorityTicket = array();
    $lowPriorityTicket = array();
}
?>