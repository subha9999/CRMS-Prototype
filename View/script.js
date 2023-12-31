function resetPassword(){
    console.log("Showing the hidden form");

}
function goBackToPrev(){
    // Use history.back() to go back one step in the session history
    window.history.back();
}
function showTicketForm(){
    console.log("Showing the ticket form");
    $("#showForm").load("ticketForm.php");
        
}
function goBackToAgent() {
    $("#showForm").load("agentTicket.php #agentTicket");
    
}
function goBackToAdmin(){
    console.log("Going Back");
    location.reload();
    $("#showForm").load("adminDashMain.php");
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
function goBackToadminTicket(){
    console.log("Showing all the tickets");
    location.reload();
    $("#adminTicket").load("adminTicket.php #target");
}

function updateDistricts(){
    var districtData={
        "Chittagong":["Bandarban","Brahmanbaria","Chandpur","Chittagong","Comilla","Cox's Bazar","Feni","Khagrachhari","Lakshmipur"],
        "Dhaka":["Dhaka","Faridpur","Gazipur","Gopalganj","Kishoreganj","Madaripur","Manikganj","Munshiganj","Narayanganj","Narsingdi","Rajbari","Shariatpur","Tangail"],
        "Khulna":["Bagerhat","Chuadanga","Jashore","Jhenaidah","Khulna","Kushtia","Magura","Meherpur","Narail","Satkhira"],
        "Rajshahi":["Bogura","Joypurhat","Naogaon","Natore","Chapai Nawabganj","Pabna","Rajshahi","Sirajganj"],
        "Barisal":["Barguna","Barishal","Bhola","Jhalokati","Patuakhali","Pirojpur"],
        "Mymensingh":["Jamalpur","Mymensingh","Netrokona","Sherpur"],
        "Rangpur":["Dinajpur","Gaibandha","Kurigram","Lalmonirhat","Nilphamari","Panchagarh","Rangpur","Thakurgaon"],
        "Sylhet":["Habiganj","Moulvibazar","Sunamganj","Sylhet"]
    };
    var selectedDivision = document.getElementById("division").value;
    var districtDropdown = document.getElementById("district");
    districtDropdown.innerHTML = "";
    var selectOption = document.createElement("option");
selectOption.text = "Select";
districtDropdown.add(selectOption);
    if (districtData.hasOwnProperty(selectedDivision)) {
        districtData[selectedDivision].forEach(function (district) {
            var option = document.createElement("option");
            option.text = district;
            districtDropdown.add(option);
        });
    } else {
        var option = document.createElement("option");
        option.text = "Select a Division First";
        districtDropdown.add(option);
    }
}

