var id=userID;
function showTicketForm(){
    console.log("Showing the ticket form");
    $("#showForm").load("ticketForm.php");
        
}
function goBack(let) {
    console.log("Going Back");
    if (let>=300 && let==id)
    {
    $("#showForm").load("agentDashMain.php");
    }
    else if(let==105 && let==id)
    {
        location.reload();
         $("#showForm").load("adminDashMain.php");
    }
    
}
function showAddUserForm(){
    console.log("Showing the add user form");
    $("#showForm").load("addUserForm.php");
  
}
function showAgentForm(){
    console.log("Showing the agent form");
    $("#showSpecificForm").load("agentForm.php");
}
function showLeadForm(){
    console.log("Showing the team lead form");
    $("#showSpecificForm").load("leadForm.php");
}
function showClientForm(){
    console.log("Showing the client form");
    $("#showSpecificForm").load("clientForm.php");
}
function showAdminTicketForm(){
    console.log("Showing the ticket form");
    $("#adminTicket").load("adminTicketForm.php");
}
function showAllTickets(){
    console.log("Showing all the tickets");
    $("#adminTicket").load("allTickets.php");
}
function goBackToadminTicket(){
    console.log("Showing all the tickets");
    location.reload();
    $("#adminTicket").load("adminTicket.php #target");
}
