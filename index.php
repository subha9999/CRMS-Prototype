<?php
if(!isset($_GET['action']))
{
    include("View/login.php");
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "Controller/loginUser.php";
   }
}
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

switch ($action) {
    case 'logout':
        include 'Controller/logout.php';
        break;
    
}


?>