<?php
 session_start();
 $_SESSION=array();
 session_destroy();
 echo '<script>alert("Logging Out")</script>';
 header('Refresh: 1; URL = index.php');
?>