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
function showLead(){
    console.log("Showing info");
    $("#showForm").load("teamLeadInfo.php");
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