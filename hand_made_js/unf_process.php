<?php


include '../signin_session.inc.php';


if(loggedin()){
    
    mysql_connect('localhost','root','manikantsingh54@gmail.com');
    
    if(isset($_GET['search_text'])){
        
        
        $unf = $_GET['search_text'];
        $username = $_SESSION['user_name'];
        
        mysql_select_db($username);
        
        $query = "DELETE FROM `friend_list` WHERE `username`='$unf'";
        mysql_query($query);
        
        mysql_select_db($unf);
        
        $query = "DELETE FROM `friend_list` WHERE `username`='$username'";
        mysql_query($query);
        echo 'Now you are no longer friend with'.$unf;
        
        
        
        mysql_select_db('maniroom_users');
        $query_row=  mysql_query("SELECT `no_friends` FROM `mani_room_users` WHERE `username`='$unf'");
        if(mysql_num_rows($query_row)==NULL){
            
            
        }else{
        
            while($fr = mysql_fetch_assoc($query_row)){
               $frn = $fr['no_friends'];
            }
            
        }
     $frn--;
        
  $query = "UPDATE `mani_room_users` SET `no_friends`='$frn' WHERE `username`='$unf'";
        mysql_query($query);
        
        
         $query_row=  mysql_query("SELECT `no_friends` FROM `mani_room_users` WHERE `username`='$username'");
        if(mysql_num_rows($query_row)==NULL){
            
            
        }else{
        
            while($fr = mysql_fetch_assoc($query_row)){
              $frn = $fr['no_friends'];
            }
            
        }
     $frn--;
        
  $query = "UPDATE `mani_room_users` SET `no_friends`='$frn' WHERE `username`='$username";
  mysql_query($query);
        
        
        
        
        
        
        
        
        
    }else{
        
        echo 'could not process your request';
    }
    
    
}else{
    
    header('Location: ../index.php');
}


?>