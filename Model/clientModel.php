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
      $newUser="INSERT INTO users(user_F_Name,user_L_Name,email,password,contact,role)
      VALUES ('$firstName','$lastName','$email','$password','$number','Client')";
      $newUserResult=mysqli_query($link,$newUser);
      if($newUserResult){
        $userID=mysqli_insert_id($link);
        $newLead="INSERT INTO client(userID,representative_fname,representative_lname,email,password,contact,clientCompany)
        VALUES ('$userID','$firstName','$lastName','$email','$password','$number','$companyName')";
        $newLeadResult=mysqli_query($link,$newLead);
        if($newLeadResult){
          echo '<script>alert("Added a new user")</script>';
          header('Refresh:0.2, URL=../View/adminDashboard.php');
        }
    }
    else{
      echo '<script>alert("Failed to add")</script>';
      header( 'Refresh:0.2, URL= ' . $_SERVER['HTTP_REFERER'] );
    }
    }
    else if($validforPassword==false){
      echo '<script>alert("Password should be minimum 8 characters long and should have atleast 1 capital letter.")</script>';
      header( 'Refresh:0.2, URL=' . $_SERVER['HTTP_REFERER'] );
    }
    else {
      echo '<script>alert("Retype your password again")</script>';
      header( 'Refresh:0.2, URL= ' . $_SERVER['HTTP_REFERER'] );
    }
}
function showClientToAdmin(){
    include ("../Configuration/database.php");
    global $clientInfo,$clientRow;
    $clientSQL="SELECT * FROM client";
    $clientInfo=mysqli_query($link,$clientSQL);
}
function getCustomersDistribution(){
  include "../Configuration/database.php";
  global $clientCustomers;
  $clientCustomers = array();
  $clientID = array();
  $clientCompanysql="SELECT clientID FROM client;";
  $clientCompanyInfo=mysqli_query($link,$clientCompanysql);
  while($client_row=mysqli_fetch_assoc($clientCompanyInfo)){
      $clientID[] = $client_row['clientID'];
  }
  foreach($clientID as $value){
      $clientCustomersql="SELECT COUNT(customerID) as totalCustomers FROM `customers` WHERE clientID='$value';";
      $clientCustomerInfo=mysqli_query($link,$clientCustomersql);
      while($clientCustomer_row=mysqli_fetch_assoc($clientCustomerInfo)){
          $clientCustomers[] = $clientCustomer_row["totalCustomers"];
      }
  }
  return $clientCustomers;  
}
function getClientDetails($clientID){
  include "../Configuration/database.php";
  global $clientRow,$totalAgentsRow,$totalLeadRow;
  $clientSQL="SELECT * FROM client WHERE clientID='$clientID'";
  $clientInfo=mysqli_query($link,$clientSQL);
  $clientRow=mysqli_fetch_array($clientInfo,MYSQLI_ASSOC);
  $totalAgents="SELECT COUNT(agent.agentID) AS totalAgents FROM agent
  JOIN team_lead ON agent.teamleadID = team_lead.leadID 
  JOIN client ON team_lead.client_id = client.clientID
  WHERE client.clientID = '$clientID';";
  $totalAgentsInfo=mysqli_query($link,$totalAgents);
  $totalAgentsRow=mysqli_fetch_array($totalAgentsInfo,MYSQLI_ASSOC);
  $totalLead="SELECT COUNT(team_lead.leadID) AS totalLeads FROM team_lead
  JOIN client ON team_lead.client_id = client.clientID
  WHERE client.clientID = '$clientID';";
  $totalLeadsInfo=mysqli_query($link,$totalLead);
  $totalLeadRow=mysqli_fetch_array($totalLeadsInfo,MYSQLI_ASSOC);
  
}
function getClientRelatedInfo($id){
  include "../Configuration/database.php";
  global $agentCount,$leadCount,$ticketCount,$customerCount;
  $sql="SELECT COUNT(agent.agentID) AS agentCount
  FROM agent
  JOIN team_lead ON agent.teamleadID = team_lead.leadID
  JOIN client ON team_lead.client_id = client.clientID
  WHERE client.clientID = '$id';
  SELECT COUNT(leadID) AS leadCount FROM team_lead where client_id='$id';
  SELECT COUNT(tickets.ticketID) AS ticketCount FROM tickets WHERE tickets.clientID='$id';
  SELECT COUNT(DISTINCT tickets.customerID) AS customerCount FROM tickets WHERE tickets.clientID='$id';";
  if (mysqli_multi_query($link, $sql)) {
    $queryIndex = 0; 
    do {
      if ($result = mysqli_store_result($link)) {
        $cl_row[$queryIndex] = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        $queryIndex++;
      }
    } while (mysqli_next_result($link));
  }
  $agentCount = $cl_row[0]["agentCount"];
  $leadCount=$cl_row[1]['leadCount'];
  $ticketCount=$cl_row[2]['ticketCount'];
  $customerCount=$cl_row[3]['customerCount'];
  
  mysqli_close($link);

}
function getClientAgent($id){
  include "../Configuration/database.php";
  global $agentInfo;
  $sql="SELECT *
  FROM agent
  JOIN team_lead ON agent.teamleadID = team_lead.leadID
  JOIN client ON team_lead.client_id = client.clientID
  WHERE client.clientID = '$id'";
  $agentInfo=mysqli_query($link,$sql);
  
}
function getClientLead($id){
  include "../Configuration/database.php";
  global $leadInfo;
  $sql="SELECT *
  FROM team_lead
  WHERE client_id = '$id'";
  $leadInfo=mysqli_query($link,$sql);
  
}
?>