<?php
    require 'database_connection.inc.php';
    include 'signin_session.inc.php';
?>
<?php
if(loggedin()){
    
   $username = $_SESSION['user_name'];

        include 'mainstream2.php';
        
       
        
    }else{
    
    header('Location: index.php');
}

?>