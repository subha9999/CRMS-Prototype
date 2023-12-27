<?php 
function checkNotification($user_id){
    include ('../Configuration/database.php');
    $sql="SELECT*  FROM notifications WHERE userID='$user_id'";
    $result=mysqli_query($link,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            echo '<h5><span class="material-symbols-outlined">
            mark_email_unread
            </span>'." ".$row['message'].'</h5><hr>';
        }
    }
        else{
            echo '<h5><span class="material-symbols-outlined">
            mark_email_unread
            </span> There are no notifications for you at the moment</h5>';
        }
    }
}

function addNotification($user_id,$message){
    include ('../Configuration/database.php');
    $sql="INSERT INTO notifications(userID,message) VALUES ('$user_id','$message')";
    $add=mysqli_query($link,$sql);
}

?>