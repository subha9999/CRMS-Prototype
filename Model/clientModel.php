<?php 
function showClientName($id){
    include "../Configuration/database.php";
    global $client_name;
    $client="SELECT client.clientCompany  FROM agent
     JOIN team_lead ON agent.teamleadID = team_lead.leadID 
     JOIN client ON team_lead.client_id = client.clientID
     WHERE agent.agentID = '$id';";
    $clientInfo=mysqli_query($link,$client);
    $clientrow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
    $client_name=$clientrow["clientCompany"];
}
function assignClient(){
    include ("../Configuration/database.php");
    global $clientResult,$clientRow;
    $clientSQL="SELECT clientID,clientCompany FROM `client` ";
    $clientResult=mysqli_query($link,$clientSQL);
}
function addNewClient($firstName,$lastName,$email,$number,$companyName,$password,$re_password){
    include ("../Configuration/database.php");
    $validforPassword=true;
    if (!preg_match('/[A-Z]/', $password)) {
        $validforPassword=false;
        
    }
    
    if (!preg_match('/[a-z]/', $password)) {
        $validforPassword=false;
    }
    
    if (!preg_match('/[0-9]/', $password) ||strlen($password) < 8 ) {
        $validforPassword=false;
    }
    if($validforPassword==true && $password==$re_password)
    {
      $newLead="INSERT INTO client(representative_fname,representative_lname,email,password,contact,clientCompany)
      VALUES ('$firstName','$lastName','$email','$password','$number','$companyName')";
      $newLeadResult=mysqli_query($link,$newLead);
    if($newLeadResult){
      echo "Done";
      header('Refresh:0.2, URL=../View/adminDashboard.php');
    }
    else{
      echo "Failed to add";
    }
    }
    else if($validforPassword==false){
      echo "Password should be minimum 8 characters long and should have atleast 1 capital letter.";
    }
    else {
      echo "Retype your password again";
    }
}
?>