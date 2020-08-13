<?php

include '../signin_session.inc.php';

if(loggedin())
{
    
    if(isset($_GET['id'])){
    mysql_connect('localhost','root','manikantsingh54@gmail.com');
    
    
    $username = $_SESSION['user_name'];
    mysql_select_db($username);
    $id = $_GET['id'];
        
    $query = "DELETE FROM `status_wall` WHERE `id`='$id'";
    if(mysql_query($query)){
        
        echo 'status deleted succesfully';
    }
        
        
    }else{
        
        echo 'An error occured';
    }
    
}else{
    
    header('Location: ../index.php');
}


?>