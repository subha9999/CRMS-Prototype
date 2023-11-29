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
    $("#showForm").load("adminDashMain.php");
    ct();

    }
    
}
function showLead(){
    console.log("Showing info");
    $("#showForm").load("teamLeadInfo.php");
}
function showAddUserForm(){
    console.log("Showing the ticket form");
    $("#showForm").load("addUserForm.php");
  
}
