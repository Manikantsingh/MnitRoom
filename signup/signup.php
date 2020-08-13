<?php


include 'database_connection.inc.php';
include '../signin_session.inc.php';

if(!loggedin()){
    
    include 'signup.html';
    
    
function spamcheck($field) {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  } else {
    return FALSE;
  }
}

    
    
    
    
    
    
    if(isset($_POST['first_name']) && isset($_POST['UI_username']) && isset($_POST['pass']) && isset($_POST['pass_again']) && isset($_POST['country']) && isset($_POST['month']) && isset($_POST['year']) && isset($_POST['date']) && isset($_POST['email']) && isset($_POST['policy'])){
	
	
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$unique_username= $_POST['UI_username'];
		$pass=$_POST['pass'];
		$passagain = $_POST['pass_again'];
		$country = $_POST['country'];
		$year = $_POST['year'];
		$month = $_POST['month'];
		$date = $_POST['date'];
		$email = $_POST['email'];
		$zip = $_POST['zip'];
		$dob = $year.'-'.$month.'-'.$date;
        
        
        $mailcheck = spamcheck($email);
    if ($mailcheck==FALSE) {
      echo "Invalid email input";
    } else {
        
        
		
        
    if(!empty($first_name)&& !empty($unique_username) && !empty($pass) && !empty($passagain) && !empty($country)&& !empty($month) && !empty($year) && !empty($date) && !empty($email))
    {
       $unique_username= preg_replace('/\s+/', '', $unique_username);
        $query="SELECT `username` FROM `mani_room_users` WHERE `username` ='$unique_username'";
        
        if($query_run=mysql_query($query))
        {
         $query_num_row=mysql_num_rows($query_run);
                
                if($query_num_row==0)
                    {
					
					if($pass==$passagain){
					$username= $unique_username;
					$pass = md5($pass);
					
				$query = "INSERT INTO `mani_room_users`(`first_name`, `last_name`, `username`, `pass`, `country`, `zip`, `dob`, `email`) VALUES ('".mysql_real_escape_string($first_name)."','".mysql_real_escape_string($last_name)."','".mysql_real_escape_string($username)."','".mysql_real_escape_string($pass)."','".mysql_real_escape_string($country)."','".mysql_real_escape_string($zip)."','".mysql_real_escape_string($dob)."','".mysql_real_escape_string($email)."')";
					
					if($query_run = mysql_query($query))
						{
						
						
					echo 'you are registered succesfully';
                    include 'create_data_username.php';
					}else{
						echo mysql_error();
					}
					}else{
						echo '*password doesn\'t match.';
					}
				   
                    }
                else if($query_num_row==1)
                {
                    echo '*choose a diffrent username its already taken';
                    
                }else{
                    
                    echo ' unable to get username';
                }
        
        }else{
            
            echo mysql_error();
        }

    
}else{
        
        echo '*all feilds are mandetary';
    }
}
    }
}else{
    
    header('Location: ../index.php');
}
?>