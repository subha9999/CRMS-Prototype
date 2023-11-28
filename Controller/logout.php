<?php
 session_start();
 $_SESSION=array();
 session_destroy();
 echo "Logging Out";
 header('Refresh: 1; URL = index.php');
?>