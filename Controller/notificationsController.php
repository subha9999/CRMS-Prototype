<?php
include_once ('../Model/notificationsModel.php');
include_once ('../Controller/session.php');
$user_id=$_SESSION['userID'];
checkNotification($user_id);
if (isset($_GET['action']) && $_GET['action'] == 'updateStatus') {
    if (isset($_GET['notificationID'])) {
        $notificationID = $_GET['notificationID'];
        updateNotificationStatus($notificationID);
    } else {
        echo 'Notification ID is not set.';
    }
}
?>