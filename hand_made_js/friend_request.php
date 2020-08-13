<?php

include '../signin_session.inc.php';
if(loggedin()){
   

    
    if(isset($_GET['friend_name'])){
        
         
    mysql_connect("localhost","root","manikantsingh54@gmail.com");
        
        $username=$_SESSION['user_name'];

echo $name=mysql_real_escape_string(htmlentities($_GET['friend_name']));
    
        mysql_select_db($name);
        $insert =mysql_query("INSERT INTO `friend_request`(`id`, `username`, `recd`) VALUES ('','$username','0')");
        
        echo 'Friend request successful sent';
        
        
        
    }else{
        
        echo 'Friend name is not gathered';
    }
    
    
}else{
    
    header('Location: ../index.php');
}



?>