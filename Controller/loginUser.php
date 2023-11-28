<?php
$userID=$_POST["userID"];
$pass=$_POST["password"];
include"Model/verifyUser.php";
login($userID,$pass);
?>