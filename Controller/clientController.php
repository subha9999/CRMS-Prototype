<?php
include("../Model/clientModel.php");
include ('../Model/adminModel.php');
showClientToAdmin();
if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['firstName'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $companyName=$_POST['companyName'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    addNewClient($firstName,$lastName,$email,$number,$companyName,$password,$re_password);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" &&  !empty($_GET['clientID'])){
    $clientID=$_GET['clientID'];
    getClientDetails($clientID);
    include ('../View/viewClient.php');
}
else if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['clientID'])){
    $clientID=$_POST['clientID'];
    deleteClient($clientID);
}
?>
<script>
    var clientArray=<?php echo json_encode(getClientCompany());?>;
    var ticketArray=<?php echo json_encode(getTicketDistribution());?>; 
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>