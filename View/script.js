function showTicketForm(){
    console.log("Showing the ticket form");

    $("#showForm").load("ticketForm.php");
        
}
function goBack() {
    console.log("Going Back");
    $("#showForm").load("agentDashMain.php");
}
function showLead(){
    console.log("Showing info");
    $("#showForm").load("teamLeadInfo.php");
}