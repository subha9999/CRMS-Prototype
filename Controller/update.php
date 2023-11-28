<?php 
 include ("session.php");
 $_POST['id']=$_SESSION['id'];
 $id=$_POST['id'];
 if(isset($_POST['firstName']))
 {
 $firstName=$_POST['firstName'];
 }
 if(isset($_POST['lastName']))
 {
 $lastName=$_POST['lastName'];
 }
 if(isset($_POST['contact'])){
 $contact=$_POST['contact'];
 }
 if(isset($_POST['email'])){
 $email=$_POST['email'];
 }
 if(isset($_POST['password']) || isset($_POST['newpassword']) || isset($_POST['confirmpassword'])){
 $password=$_POST['password'];
 $newPassword=$_POST['newpassword'];
 $confirmPassword=$_POST['confirmpassword'];
 }
 //echo $firstName,$lastName,$contact,$email,$currentPassword,$confirmPassword,$newPassword;
 include ('../Model/updateUser.php');
 if(!empty($firstName)|| !empty($lastName)){
 updateName($firstName,$lastName,$id);
 }
 if(!empty($contact) || !empty($email)){
 updateContact($contact,$email,$id);
 }
 if(!empty($password) && !empty($newPassword) && !empty($confirmPassword)){
 updatePassword($password,$newPassword,$confirmPassword,$id);
 }
?>