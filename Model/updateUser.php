<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
function sendEmail($id,$email,$verificationCode,$expirationTime){
    include("../Configuration/database.php");
    $sql="INSERT INTO tokens(userID,email,verification_code,expiration_time,status)
    VALUES ('$id','$email','$verificationCode','$expirationTime','0')";
    $result=mysqli_query($link,$sql);
    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true; 
$mail->Port = 2525;
$mail->Username = '2bfbe7db576c0a';
$mail->Password = 'eb62b37ba1aaba'; 

    
        $mail->setFrom('subhanizam15@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Verification Code';
        $mail->Body = 'Your verification code is: ' . $verificationCode;

        $mail->send();
        header('Location:../View/verificationCode.php');
        exit();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
function checkCode($code){
    include("../Configuration/database.php");
    $sql="UPDATE tokens SET status='1' WHERE verification_code='$code'";
    $res=mysqli_query($link,$sql);
    header('Location:../View/resetPassword.php');
}
function resetPassword($password,$cPassword,$id){
    include("../Configuration/database.php");
    $admin = "SELECT * FROM admin WHERE adminID='$id'";
    $agent = "SELECT * FROM agent WHERE agentID='$id'";
    $lead = "SELECT * FROM team_lead WHERE leadID='$id'";
    $client = "SELECT * FROM client WHERE clientID='$id'";
    
    $ad_res = mysqli_query($link, $admin);
    $a_res = mysqli_query($link, $agent);
    $l_res = mysqli_query($link, $lead);
    $c_res = mysqli_query($link, $client);
    
    $ad_row = mysqli_fetch_array($ad_res, MYSQLI_ASSOC);
    $a_row = mysqli_fetch_array($a_res, MYSQLI_ASSOC);
    $l_row = mysqli_fetch_array($l_res, MYSQLI_ASSOC);
    $c_row = mysqli_fetch_array($c_res, MYSQLI_ASSOC);
    $validforPassword=true;
    if (!preg_match('/[A-Z]/', $password)) {
        $validforPassword=false;
        echo '<script>alert("Password does not contain an uppercase letter.")</script>';
    }
    if (!preg_match('/[a-z]/', $password)) {
        $validforPassword=false;
        echo '<script>alert("Password does not contain a lowercase letter."")</script>';
    }
    if (!preg_match('/[0-9]/', $password) ||strlen($password) < 8 ) {
        $validforPassword=false;
        echo '<script>alert("Password does not meet length or digit requirement.")</script>';
    }
    if($id==$ad_row['adminID']){
         if($cPassword==$password){
             if($validforPassword){
             $updateAdmin="UPDATE admin SET password='$password' WHERE adminID='$id'";
             $resultforAdmin=mysqli_query($link,$updateAdmin);
             if($resultforAdmin){
                
                     echo "<br>"."Updated";
                     echo '<script>alert("Done")</script>';
                     header( 'Refresh:0.2,URL= ../index.php'  );
                 
             }
             else{
                 echo '<script>alert("Failed to update")</script>';
                 header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
             }
         }
         else{
             echo '<script>alert("<br>"."Your password should have one capital,one digit and should be atleast 8 characters long")</script>';
             header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
         }
 
 
         }
         else{
             echo '<script>alert("<br>"."Retype your new password again.")</script>';
             header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
         }
        
     }
     else if($id==$a_row['agentID']){
         if($cPassword==$password){
             if($validforPassword){
             $updateAgent="UPDATE agent SET password='$password' WHERE agentID='$id'";
             $resultforAgent=mysqli_query($link,$updateAgent);
             if($resultforAgent){
                 
                     echo "<br>"."Updated";
                     echo '<script>alert("Done")</script>';
                     header( 'Refresh:0.2,URL= ../index.php' );
                 
             }
             else{
                 echo '<script>alert("Failed to update")</script>';
                 header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
             }
            }
            else{
                echo '<script>alert("<br>"."Your password should have one capital,one digit and should be atleast 8 characters long")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
    
 
         }
         else{
             echo '<script>alert("<br>"."Retype your new password again.")</script>';
             header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
         }
     }
     else if($id==$l_row['leadID'])
     {
         if($cPassword==$password){
            if($validforPassword){
            $updateLead="UPDATE team_lead SET password='$password' WHERE leadID='$id'";
            $resultforLead=mysqli_query($link,$updateLead);
            if($resultforLead){
                
                    echo "<br>"."Updated"."<br>";
                    echo '<script>alert("Done")</script>';
                    header( 'Refresh:0.2,URL= ../index.php' );
                
            }
            else{
                echo '<script>alert("Failed to update")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo "<br>"."Your password should have one capital,one digit and should be atleast 8 characters long";
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
        }

        }
        else{
            echo "<br>"."Retype your new password again.";
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
        }
     }
     else if($id==$c_row['clientID']){
         if($cPassword==$password){
             if($validforPassword){
                $updateClient="UPDATE client SET password='$password' WHERE  clientID='$id';";
                $resultforClient=mysqli_query($link,$updateClient);
                if($resultforClient){
                        echo '<script>alert("Done")</script>';
                        header( 'Refresh:0.2,URL= ../index.php' );
                    
                }
                else{
                    echo "Failed to update";
                    header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
                }

              }
              else{
                echo '<script>alert("<br>"."Your password should have one capital,one digit and should be atleast 8 characters long")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
    

            }
            else{
                echo '<script>alert("<br>"."Retype your new password again.")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }                
     }
     else {
        echo  '<script>alert("Failed to update")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
     }
    
    
}
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
            header('Refresh:0.2,URL=../View/adminProfile.php');
        }
    }
    else{
        echo '<script>alert("Failed to update")</script>';
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
        echo '<script>alert("Failed to update")</script>';
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
        echo '<script>alert("Failed to update")</script>';
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
        echo '<script>alert("Failed to update")</script>';
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
                echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo '<script>alert("Failed to update")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo '<script>alert("Failed to update")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                echo '<script>alert("Done")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo '<script>alert("Failed to update")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                echo '<script>alert("Done")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo '<script>alert("Failed to update")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                    echo '<script>alert("Done")</script>';
                    header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
                }
            }
            else{
                echo '<script>alert("Failed to update")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo '<script>alert("<br>"."Your password should have one capital,one digit and should be atleast 8 characters long")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
        }


        }
        else{
            echo '<script>alert("<br>"."Retype your new password again.")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
        }
       }
       else
       {
        echo '<script>alert("<br>"."Your previous password is wrong")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                     echo '<script>alert("Done")</script>';
                     header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
                 }
             }
             else{
                 echo '<script>alert("Failed to update")</script>';
                 header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
             }
            }
            else{
                echo '<script>alert("<br>"."Your password should have one capital,one digit and should be atleast 8 characters long")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
    
 
         }
         else{
             echo '<script>alert("<br>"."Retype your new password again.")</script>';
             header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
         }
        }
        else
        {
         echo '<script>alert("<br>"."Your previous password is wrong")</script>';
         header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                    echo '<script>alert("Done")</script>';
                    header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
                }
            }
            else{
                echo '<script>alert("Failed to update")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
        }
        else{
            echo "<br>"."Your password should have one capital,one digit and should be atleast 8 characters long";
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
        }

        }
        else{
            echo "<br>"."Retype your new password again.";
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
        }
       }
       else
       {
        echo "<br>"."Your previous password is wrong";
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
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
                        echo '<script>alert("Done")</script>';
                        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
                    }
                }
                else{
                    echo "Failed to update";
                    header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
                }

              }
              else{
                echo '<script>alert("<br>"."Your password should have one capital,one digit and should be atleast 8 characters long")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
    

            }
            else{
                echo '<script>alert("<br>"."Retype your new password again.")</script>';
                header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
            }
           }
           else
           {
            echo '<script>alert("<br>"."Your previous password is wrong")</script>';
            header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
           }
                
     }
}

?>