<?php
global $row_1,$row_2,$row_3,$row_4;
function login($userID,$pass){
    include "Configuration/database.php";
    $sql_1="SELECT * FROM admin WHERE adminID='$userID' AND password='$pass';";
    $sql_2= "SELECT *FROM team_lead WHERE leadID='$userID' AND password='$pass';";
    $sql_3="SELECT * FROM agent WHERE agentID='$userID' AND password='$pass';";
    $sql_4= "SELECT * FROM client WHERE clientID='$userID' AND password='$pass';";
    $result_1=mysqli_query($link, $sql_1);
    $result_2=mysqli_query($link, $sql_2);
    $result_3=mysqli_query($link, $sql_3);
    $result_4=mysqli_query($link, $sql_4);  
    $row_1=mysqli_fetch_array($result_1,MYSQLI_ASSOC);
    $row_2=mysqli_fetch_array($result_2,MYSQLI_ASSOC);
    $row_3=mysqli_fetch_array($result_3,MYSQLI_ASSOC);
    $row_4=mysqli_fetch_array($result_4,MYSQLI_ASSOC);
    if(!empty($row_1)){
        echo"Login successful";
        session_start();
        $_SESSION["id"]=$row_1["adminID"];
        $_SESSION["Fname"] = $row_1["admin_fname"];
        $_SESSION["Lname"] = $row_1["admin_lname"];
        $_SESSION["role"] = $row_1["role"];
        $_SESSION["email"] = $row_1["email"];
        $_SESSION["password"] = $row_1["password"];
        $_SESSION["contact"] = $row_1["contact"];
        header('Location:View/adminDashboard.php'); 
        
    }
    elseif(!empty($row_2)){
        echo"Login successful";
        session_start();
        $_SESSION["id"]=$row_2["leadID"];
        $_SESSION["Fname"] = $row_2["lead_fname"];
        $_SESSION["Lname"] = $row_2["lead_lname"];
        $_SESSION["role"] = $row_2["role"];
        $_SESSION["email"] = $row_2["email"];
        $_SESSION["password"] = $row_2["password"];
        $_SESSION["contact"] = $row_2["contact"];
        if ($_SESSION['email']=='' && $_SESSION['password']==''){
            echo 'Error';

        }
        else{
            header('Location:View/leadDashboard.php');
        }
        
    }
    elseif(!empty($row_3)){
        echo"Login successful";
        session_start();
        $_SESSION["id"]=$row_3["agentID"];
        $_SESSION["Fname"] = $row_3["agent_fname"];
        $_SESSION["Lname"] = $row_3["agent_lname"];
        $_SESSION["role"] = $row_3["role"];
        $_SESSION["email"] = $row_3["email"];
        $_SESSION["password"] = $row_3["password"];
        $_SESSION["contact"] = $row_3["contact"];
        if ($_SESSION['email']=='' && $_SESSION['password']==''){
            echo 'Error';

        }
        else{
            header('Location:View/agentDashboard.php');
        }
        
    }
    elseif(!empty($row_4)){
        echo"Login successful";
        session_start();
        $_SESSION["id"]=$row_4["clientID"];
        $_SESSION["Fname"] = $row_4["representative_fname"];
        $_SESSION["Lname"] = $row_4["representative_lname"];
        $_SESSION["role"] = $row_4["clientCompany"];
        $_SESSION["email"] = $row_4["email"];
        $_SESSION["password"] = $row_4["password"];
        $_SESSION["contact"] = $row_4["contact"];
        if ($_SESSION['email']=='' && $_SESSION['password']==''){
            echo 'Error';

        }
        else{
            header('Location:View/clientDashboard.php');
        }
        
    }
    else{
        echo '<script>alert("Failed to login")</script>';
    }
}
?>