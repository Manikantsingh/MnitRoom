<?php

include '../signin_session.inc.php';

if(loggedin()){
    
    
    if(isset($_GET['friend'])){
        $username = $_SESSION['user_name'];
        
        mysql_connect('localhost','root','manikantsingh54@gmail.com');
        
        mysql_select_db($username);    
        $friend = $_GET['friend'];
        
        $query = "DELETE FROM `friend_request` WHERE `username`='$friend' ";
        if(mysql_query($query)){
            
            echo 'friend request deleted';
        }
        
    }else{
        
        echo 'An error occured';
    }
    
    
}else{
    
    header('Location: ../index.php');
}


?>