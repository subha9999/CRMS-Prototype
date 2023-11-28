<?php
function updateName($firstName,$lastName,$id){
    include("../Configuration/database.php");
    $adminsql="SELECT * FROM admin WHERE adminID='$id';";
    $agentsql="SELECT * FROM agent WHERE agentID='$id';";
    $leadsql="SELECT * FROM team_lead WHERE leadID='$id';";
    $clientsql="SELECT *FROM client WHERE clientID='$id';";

    $adminresult=mysqli_query($link,$adminsql);
    $adminrow=mysqli_fetch_array($adminresult,MYSQLI_ASSOC);
    $adminid=$adminrow['adminID'];

    $agentresult=mysqli_query($link,$agentsql);
    $agentrow=mysqli_fetch_array($agentresult,MYSQLI_ASSOC);
    $agentid=$agentrow['agentID'];

    $leadresult=mysqli_query($link,$leadsql);
    $leadrow=mysqli_fetch_array($leadresult,MYSQLI_ASSOC);
    $leadid=$leadrow['leadID'];
    
    $clientresult=mysqli_query($link,$clientsql);
    $clientrow=mysqli_fetch_array($clientresult,MYSQLI_ASSOC);
    $clientid=$clientrow['clientID'];
    

    if($id==$adminid){
    $updateAdmin="UPDATE admin SET";
    if (!empty($firstName)){
        $updateAdmin .= " admin_fname='$firstName'";
    }
    if (!empty($lastName)){
        $updateAdmin .= " admin_lname='$lastName'";
    }
    $updateAdmin .=" WHERE adminID='$id'";
    echo $updateAdmin;
    $resultforAdmin=mysqli_query($link,$updateAdmin);
    if($resultforAdmin){
        $res_1=mysqli_query($link,$adminsql);
        if($res_1){
            $admin_row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
            echo "<br>"."Updated";
            unset($_SESSION['Fname']);
            unset($_SESSION['Lname']);
            $_SESSION['Fname']=$admin_row['admin_fname'];
            $_SESSION['Lname']=$admin_row['admin_lname'];
            echo $_SESSION['Fname']." ".$_SESSION['Lname'];
            header('Refresh:1,URL=../View/adminProfile.php');
        }
    }
    else{
        echo "Failed to update";
    }
}


else if($id==$agentid){
    $updateAgent="UPDATE agent SET";
    if(!empty($firstName)){
        $updateAgent .= " agent_fname='$firstName'";
    }
    else if(!empty($lastName)){
        $updateAgent .= " agent_lname='$lastName'";
    }
    $updateAgent .= " WHERE agentID='$id'";
    echo $updateAgent;
    $resultforAgent=mysqli_query($link,$updateAgent);
    if($resultforAgent){
        $res_2=mysqli_query($link,$agentsql);
        if($res_2){
            $agent_row=mysqli_fetch_array($res_2,MYSQLI_ASSOC);
            echo "<br>"."Updated";
            unset($_SESSION['Fname']);
            unset($_SESSION['Lname']);
            $_SESSION['Fname']=$agent_row['agent_fname'];
            $_SESSION['Lname']=$agent_row['agent_lname'];
            echo $_SESSION['Fname']." ".$_SESSION['Lname'];
            header('Refresh:1,URL=../View/agentProfile.php');
        }
    }
    else{
        echo "Failed to update";
    }

}

else if($id==$leadid){
    $updateLead="UPDATE team_lead SET";
    if(!empty($firstName)){
        $updateLead.=" lead_fname='$firstName'";
    }
    if(!empty($lastName)){  
        $updateLead.= " lead_lname='$lastName'";
    }
    $updateLead .= " WHERE  leadID='$id'";
    echo $updateLead;
    $resultforLead=mysqli_query($link,$updateLead);
    if($resultforLead){
        $res_3=mysqli_query($link,$leadsql);
        if($res_3){
            $lead_row=mysqli_fetch_array($res_3,MYSQLI_ASSOC);
            unset($_SESSION['Fname']);
            unset($_SESSION['Lname']);
            $_SESSION['Fname']=$lead_row['lead_fname'];
            $_SESSION['Lname']=$lead_row['lead_lname'];
            echo $_SESSION['Fname']." ".$_SESSION['Lname'];
            header('Refresh:1,URL=../View/leadProfile.php');
        }
    }
    else{
        echo "Failed to update";
    }

}

else if($id==$clientid){
    $updateClient="UPDATE client SET";
    if(!empty($firstName)){ 
    $updateClient.=" representative_fname='$firstName'";
    }
    if(!empty($lastName)){
    $updateClient.= " representative_lname='$lastName'";
    }
    $updateClient.= " WHERE  clientID='$id';";
    echo $updateClient;
    $resultforClient=mysqli_query($link,$updateClient);
    if($resultforClient){
        $res_4=mysqli_query($link,$clientsql);
        if($res_4){
            $rep_row=mysqli_fetch_array($res_4,MYSQLI_ASSOC);
            unset($_SESSION['Fname']);
            unset($_SESSION['Lname']);
            $_SESSION['Fname']=$rep_row['representative_fname'];
            $_SESSION['Lname']=$rep_row['representative_lname'];
            echo $_SESSION['Fname']." ".$_SESSION['Lname'];
            header('Refresh:1,URL=../View/clientProfile.php');
        }
    }
    else{
        echo "Failed to update";
    }

}
}

function updateContact($contact,$email,$id){
    include("../Configuration/database.php");
    $adminsql="SELECT * FROM admin WHERE adminID='$id';";
    $agentsql="SELECT * FROM agent WHERE agentID='$id';";
    $leadsql="SELECT * FROM team_lead WHERE leadID='$id';";
    $clientsql="SELECT *FROM client WHERE clientID='$id';";

    $adminresult=mysqli_query($link,$adminsql);
    $adminrow=mysqli_fetch_array($adminresult,MYSQLI_ASSOC);
    $adminid=$adminrow['adminID'];

    $agentresult=mysqli_query($link,$agentsql);
    $agentrow=mysqli_fetch_array($agentresult,MYSQLI_ASSOC);
    $agentid=$agentrow['agentID'];

    $leadresult=mysqli_query($link,$leadsql);
    $leadrow=mysqli_fetch_array($leadresult,MYSQLI_ASSOC);
    $leadid=$leadrow['leadID'];
    
    $clientresult=mysqli_query($link,$clientsql);
    $clientrow=mysqli_fetch_array($clientresult,MYSQLI_ASSOC);
    $clientid=$clientrow['clientID'];



    if($id==$adminid){
        $updateAdmin="UPDATE admin SET";
        if (!empty($contact)){
            $updateAdmin .= " contact='$contact'";
        }
        if (!empty($email)){
            $updateAdmin .= " email='$email'";
        }
        $updateAdmin.=" WHERE adminID='$id'";
        echo $updateAdmin;
        $resultforAdmin=mysqli_query($link,$updateAdmin);
        if($resultforAdmin){
            $res_1=mysqli_query($link,$adminsql);
            if($res_1){
                $admin_row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
                echo "<br>"."Updated";
                unset($_SESSION['contact']);
                unset($_SESSION['email']);
                $_SESSION['contact']=$admin_row['contact'];
                $_SESSION['email']=$admin_row['email'];
                //echo $_SESSION['Fname']." ".$_SESSION['Lname'];
                header('Refresh:1,URL=../View/adminProfile.php');
            }
        }
        else{
            echo "Failed to update";
        }
    }

    else if($id==$agentid){
        $updateAgent="UPDATE agent SET";
        if(!empty($contact)){
            $updateAgent .= " contact='$contact'";
        }
        else if(!empty($email)){
            $updateAgent .= " agent_lname='$email'";
        }
        $updateAgent .= " WHERE agentID='$id'";
        echo $updateAgent;
        $resultforAgent=mysqli_query($link,$updateAgent);
        if($resultforAgent){
            $res_2=mysqli_query($link,$agentsql);
            if($res_2){
                $agent_row=mysqli_fetch_array($res_2,MYSQLI_ASSOC);
                echo "<br>"."Updated";
                unset($_SESSION['contact']);
                unset($_SESSION['email']);
                $_SESSION['contact']=$agent_row['contact'];
                $_SESSION['email']=$agent_row['email'];
                echo $_SESSION['Fname']." ".$_SESSION['Lname'];
                header('Refresh:1,URL=../View/agentProfile.php');
            }
        }
        else{
            echo "Failed to update";
        }
    
    }

    else if($id==$leadid){
        $updateLead="UPDATE team_lead SET";
        if(!empty($contact)){
            $updateLead.=" contact='$contact'";
        }
        if(!empty($email)){  
            $updateLead.= " email='$email'";
        }
        $updateLead .= " WHERE  leadID='$id'";
        echo $updateLead;
        $resultforLead=mysqli_query($link,$updateLead);
        if($resultforLead){
            $res_3=mysqli_query($link,$leadsql);
            if($res_3){
                $lead_row=mysqli_fetch_array($res_3,MYSQLI_ASSOC);
                unset($_SESSION['contact']);
                unset($_SESSION['email']);
                $_SESSION['contact']=$lead_row['contact'];
                $_SESSION['email']=$lead_row['email'];
                echo $_SESSION['Fname']." ".$_SESSION['Lname'];
                header('Refresh:1,URL=../View/leadProfile.php');
            }
        }
        else{
            echo "Failed to update";
        }
    
    }

    else if($id==$clientid){
        $updateClient="UPDATE client SET";
        if(!empty($contact)){ 
        $updateClient.=" contact='$contact'";
        }
        if(!empty($email)){
        $updateClient.= " email='$email'";
        }
        $updateClient.= " WHERE  clientID='$id';";
        echo $updateClient;
        $resultforClient=mysqli_query($link,$updateClient);
        if($resultforClient){
            $res_4=mysqli_query($link,$clientsql);
            if($res_4){
                $rep_row=mysqli_fetch_array($res_4,MYSQLI_ASSOC);
                unset($_SESSION['contact']);
                unset($_SESSION['email']);
                $_SESSION['contact']=$rep_row['contact'];
                $_SESSION['email']=$rep_row['email'];
                echo $_SESSION['Fname']." ".$_SESSION['Lname'];
                header('Refresh:1,URL=../View/clientProfile.php');
            }
        }
        else{
            echo "Failed to update";
        }
    
    }
}
function updatePassword($password,$newPassword,$confirmPassword,$id){
    include("../Configuration/database.php");
    $adminsql="SELECT * FROM admin WHERE adminID='$id';";
    $agentsql="SELECT * FROM agent WHERE agentID='$id';";
    $leadsql="SELECT * FROM team_lead WHERE leadID='$id';";
    $clientsql="SELECT *FROM client WHERE clientID='$id';";

    $adminresult=mysqli_query($link,$adminsql);
    $adminrow=mysqli_fetch_array($adminresult,MYSQLI_ASSOC);
    $adminid=$adminrow['adminID'];

    $agentresult=mysqli_query($link,$agentsql);
    $agentrow=mysqli_fetch_array($agentresult,MYSQLI_ASSOC);
    $agentid=$agentrow['agentID'];

    $leadresult=mysqli_query($link,$leadsql);
    $leadrow=mysqli_fetch_array($leadresult,MYSQLI_ASSOC);
    $leadid=$leadrow['leadID'];
    
    $clientresult=mysqli_query($link,$clientsql);
    $clientrow=mysqli_fetch_array($clientresult,MYSQLI_ASSOC);
    $clientid=$clientrow['clientID'];



    $validforPassword=true;
    if (!preg_match('/[A-Z]/', $newPassword)) {
        $validforPassword=false;
        
    }
    
    if (!preg_match('/[a-z]/', $newPassword)) {
        $validforPassword=false;
    }
    
    if (!preg_match('/[0-9]/', $newPassword) ||strlen($newPassword) < 8 ) {
        $validforPassword=false;
    }
    


    if($id==$adminid){
       $oldPass=$adminrow['password'];
       if($password==$oldPass){
        if($confirmPassword==$newPassword){
            //echo "<br>".$password." New Pass: ".$newPassword." ".$confirmPassword."<br> ";
            if($validforPassword){
            $updateAdmin="UPDATE admin SET password='$newPassword' WHERE adminID='$id'";
            echo $updateAdmin;
            $resultforAdmin=mysqli_query($link,$updateAdmin);
            if($resultforAdmin){
                $res_1=mysqli_query($link,$adminsql);
                if($res_1){
                    $admin_row=mysqli_fetch_array($res_1,MYSQLI_ASSOC);
                    echo "<br>"."Updated";
                    unset($_SESSION['password']);
                    $_SESSION['password']=$admin_row['password'];
                    //echo $_SESSION['Fname']." ".$_SESSION['Lname'];
                    header('Refresh:1,URL=../View/adminProfile.php');
                }
            }
            else{
                echo "Failed to update";
            }
        }
        else{
            echo "<br>"."Your password should have one capital,one digit and should be atleast 8 characters long";
        }


        }
        else{
            echo "<br>"."Retype your new password again.";
        }
       }
       else
       {
        echo "<br>"."Your previous password is wrong";
       }
    }
    else if($id==$agentid){
        $oldPass=$agentrow['password'];
        if($password==$oldPass){
         if($confirmPassword==$newPassword){
             //echo "<br>".$password." New Pass: ".$newPassword." ".$confirmPassword."<br> ";
             if($validforPassword){
             $updateAgent="UPDATE agent SET password='$newPassword' WHERE agentID='$id'";
             echo $updateAgent;
             $resultforAgent=mysqli_query($link,$updateAgent);
             if($resultforAgent){
                 $res_2=mysqli_query($link,$agentsql);
                 if($res_2){
                     $agent_row=mysqli_fetch_array($res_2,MYSQLI_ASSOC);
                     echo "<br>"."Updated";
                     unset($_SESSION['password']);
                     $_SESSION['password']=$agent_row['password'];
                     //echo $_SESSION['Fname']." ".$_SESSION['Lname'];
                     header('Refresh:1,URL=../View/agentProfile.php');
                 }
             }
             else{
                 echo "Failed to update";
             }
            }
            else{
                echo "<br>"."Your password should have one capital,one digit and should be atleast 8 characters long";
            }
    
 
         }
         else{
             echo "<br>"."Retype your new password again.";
         }
        }
        else
        {
         echo "<br>"."Your previous password is wrong";
        }
     }
     else if($id==$leadid)
     {
        $oldPass=$leadrow['password'];
        if($password==$oldPass){
         if($confirmPassword==$newPassword){
            if($validforPassword){
            $updateLead="UPDATE team_lead SET password='$newPassword' WHERE leadID='$id'";
            echo $updateLead;
            $resultforLead=mysqli_query($link,$updateLead);
            if($resultforLead){
                $res_3=mysqli_query($link,$leadsql);
                if($res_3){
                    $lead_row=mysqli_fetch_array($res_3,MYSQLI_ASSOC);
                    echo "<br>"."Updated"."<br>";
                    unset($_SESSION['password']);
                    $_SESSION['password']=$lead_row['password'];
                    header('Refresh:1,URL=../View/leadProfile.php');
                }
            }
            else{
                echo "Failed to update";
            }
        }
        else{
            echo "<br>"."Your password should have one capital,one digit and should be atleast 8 characters long";
        }

        }
        else{
            echo "<br>"."Retype your new password again.";
        }
       }
       else
       {
        echo "<br>"."Your previous password is wrong";
       }
     }
     else if($id==$clientid){
        $oldPass=$clientrow['password'];
        if($password==$oldPass){
         if($confirmPassword==$newPassword){
             //echo "<br>".$password." New Pass: ".$newPassword." ".$confirmPassword."<br> ";
             if($validforPassword){
                $updateClient="UPDATE client SET password='$newPassword' WHERE  clientID='$id';";
                echo $updateClient;
                $resultforClient=mysqli_query($link,$updateClient);
                if($resultforClient){
                    $res_4=mysqli_query($link,$clientsql);
                    if($res_4){
                        $rep_row=mysqli_fetch_array($res_4,MYSQLI_ASSOC);
                        unset($_SESSION['password']);
                        $_SESSION['password']=$rep_row['password'];
                        echo '<br>'.'Updated'.'<br>';
                        header('Refresh:1,URL=../View/clientProfile.php');
                    }
                }
                else{
                    echo "Failed to update";
                }

              }
              else{
                echo "<br>"."Your password should have one capital,one digit and should be atleast 8 characters long";
            }
    

            }
            else{
                echo "<br>"."Retype your new password again.";
            }
           }
           else
           {
            echo "<br>"."Your previous password is wrong";
           }
                
     }
}
?>