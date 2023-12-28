<?php 
function checkNotification($user_id){
    include ('../Configuration/database.php');
    $sql="SELECT *  FROM notifications WHERE userID='$user_id'";
    $result=mysqli_query($link,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            $status=$row['status'];
            if($status=='unseen'){
            echo '<h5 id='.$row['notificationID'].' onclick="hideNotification('.$row['notificationID'].')">
            <span class="material-symbols-outlined">
            mark_email_unread
            </span>'." ".$row['message'].'</h5>
            <p class="text-muted">Click on the notification to dismiss it.</p><hr>';
            }
        }
    }
        else{
            echo '<h5><span class="material-symbols-outlined">
            mark_email_unread
            </span> There are no notifications for you at the moment</h5>';
        }
    }
}
function updateNotificationStatus($notificationID){
    include ('../Configuration/database.php');
    $sql="UPDATE notifications SET status='seen' WHERE notificationID='$notificationID'";
    $res=mysqli_query($link,$sql); 
}
function addNotification($user_id,$message){
    include ('../Configuration/database.php');
    $sql="INSERT INTO notifications(userID,message,status) VALUES ('$user_id','$message','unseen')";
    $add=mysqli_query($link,$sql);
}

?>
