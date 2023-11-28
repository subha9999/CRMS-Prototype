<?php
$link=mysqli_connect("localhost","root","","crm_db");
if(!$link){
    die("Error".mysqli_connect_error());
}
?>