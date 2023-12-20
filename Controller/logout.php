<?php
 session_start();
 $_SESSION=array();
 session_destroy();
 header('Refresh: 0.2; URL = index.php');
?>