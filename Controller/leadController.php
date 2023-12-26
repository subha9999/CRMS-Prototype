<?php
include("../Controller/session.php");
include_once ("../Model/leadModel.php");
include_once('../Model/AgentModel.php');
include_once ("../Model/clientModel.php");
$id=$_SESSION['id'];
assignClient();
showLeadToAdmin();
getDetailsForLead($id);
if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['firstName'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $re_password=$_POST['re-password'];
    $clientID=$_POST['clientID'];
    addNewLead($firstName,$lastName,$email,$number,$password,$re_password,$clientID);
}
else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_GET['leadID'])){
    $leadID=$_GET['leadID'];
    getLeadDetails($leadID);
    include_once('../View/viewLead.php');
}
else if($_SERVER['REQUEST_METHOD']== 'GET'&& !empty($_GET['oldLeadID'])){
    $oldLeadID=$_GET['oldLeadID'];
    $newLeadID=$_GET['newLeadID'];
    updateAgentLead($oldLeadID,$newLeadID);
}
else if($_SERVER['REQUEST_METHOD']== 'POST'&& !empty($_POST['leadID'])){
    $leadID=$_POST['leadID'];
    deleteLead($leadID);
}

?>
<script>
    var resolvingTime=<?php echo json_encode(getAvgResTime($id));?>;
    var agentsID_array=<?php echo json_encode(getAgentsID($id));?>;
</script>
<script src="../View/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>