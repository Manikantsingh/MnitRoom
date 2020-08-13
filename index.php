<?php
include 'database_connection.inc.php';
include 'signin_session.inc.php';

if(!loggedin())
{
include 'index.html';
    
    if(isset($_POST['username']) && isset($_POST['user_pass']))
    {
        if(!empty($_POST['username']) && !empty($_POST['user_pass'])){
  
        $username=mysql_real_escape_string($_POST['username']);
        $password=md5(mysql_real_escape_string($_POST['user_pass']));
           
            
$query = "SELECT `username` FROM `mani_room_users` WHERE `username`='$username' OR `email`='$username' AND `pass`='$password'";
    
            if($query_run=mysql_query($query))
            {
                $query_num_row=mysql_num_rows($query_run);
                
                if($query_num_row==0)
                    {
                    echo 'Invalid email/username or password';
                    
                    }
                else if($query_num_row==1)
                    {
                    $user_name=mysql_result($query_run, 0, 'username');
                    $_SESSION['user_name']=$user_name;
                    
              
                    mysql_query("UPDATE `mani_room_users` SET `online_status`='1' WHERE `username`='".$user_name."'");
                    
                   header('Location: profileview.php');
                    }
                
            }
    
        }else{
        
         echo 'all fields are mandetary';
    }
    }
    
include 'footer.html';
    
}else{
    
    header('Location: profileview.php');
}

?>