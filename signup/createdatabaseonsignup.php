<?php

include 'signup_currentfil.php';

if(!isloggedin()){
    include 'signup.html';
    
    if(isset($_POST['first_name']) && isset($_POST['UI_username']) && isset($_POST['pass']) && isset($_POST['pass_again']) &&                        isset($_POST['country']) && isset($_POST['month']) && isset($_POST['year']) && isset($_POST['date']) && isset($_POST['email']) &&            isset($_POST['checkbox'])){
        
    if(!empty($_POST['first_name']) && !empty($_POST['UI_username']) && !empty($_POST['pass']) && !empty($_POST['pass_again']) &&                 !empty($_POST['country']) && !empty($_POST['month']) && !empty($_POST['year']) && !empty($_POST['date']) && !empty($_POST['email']) &&       !empty($_POST['checkbox'])){
        
        
        
    }
        
        
    }
       
}
?>