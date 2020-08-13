<?php 

mysql_connect('localhost','root','manikantsingh54@gmail.com');

mysql_select_db('maniroom_users');
include '../signin_session.inc.php';

if(!loggedin()){
    
if(isset($_POST['username'])){
    $username = mysql_real_escape_string($_POST['username']);
    
    if(!empty($username)){
        $username_query = mysql_query("select count(username) from `mani_room_users` where `username`='$username'");
        
        $username_result=mysql_result($username_query, 0);
        
        if($username_result == 0){
            
            echo 'Username available';
        }else{
            echo 'sorry, that username is taken';
        }
        
    }
    
}
}else{
    
    header('../index.php');
}
?>