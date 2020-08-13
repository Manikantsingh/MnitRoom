<?php 
include '../signin_session.inc.php';




if(loggedin()){
    
    if(isset($_GET['status'])){
        
        if(!empty($_GET['status'])){
        $username = $_SESSION['user_name'];
            
        $status = mysql_real_escape_string(htmlentities($_GET['status']));
        
        mysql_connect('localhost','root','manikantsingh54@gmail.com') or die(mysql_error());
        mysql_select_db($username) or die(mysql_error());
            
        
       
        $query = "INSERT INTO `status_wall`(`id`, `comment`) VALUES ('','$status')";
        
        if(mysql_query($query)==true){
            
            echo 'Status uploaded';
        }else{
    
        echo 'an error occured';
        }
       
        
    }else{
        
        echo 'Write first';
    }
    
    }
    
}else{
    
    header('Location: ../index.php');
}


?>