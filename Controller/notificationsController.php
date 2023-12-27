<?php
include_once ('../Model/notificationsModel.php');
include_once ('../Controller/session.php');
$user_id=$_SESSION['userID'];
checkNotification($user_id);
?>