<?php
include("../Controller/ticketCount.php");
include("../Controller/session.php");
echo $totalTicket_row["total_no_of_tickets"]."<br>";
echo $openTicket_row["open_tickets"]."<br>";
echo $closedTicket_row["closed_tickets"]."<br>";
echo $highPriority_row["high_PriorityTickets"]."<br>";
echo $mediumPriority_row["medium_PriorityTickets"]."<br>";
echo $lowPriority_row["low_PriorityTickets"]."<br>";
echo $ID;
?>
