<?php 
include '../signin_session.inc.php';

if(loggedin()){
    

    
    if(isset($_GET['first_name']) && isset($_GET['country']) && isset($_GET['dob']) && isset($_GET['email']) && isset($_GET['zip'])){
	
	
		$first_name = mysql_real_escape_string($_GET['first_name']);
		$last_name = mysql_real_escape_string($_GET['last_name']);
		$country = mysql_real_escape_string($_GET['country']);
		$email = mysql_real_escape_string($_GET['email']);
		$zip = mysql_real_escape_string($_GET['zip']);
        $pass = mysql_real_escape_string($_GET['pass']);
		$dob = mysql_real_escape_string($_GET['dob']);
		$username= mysql_real_escape_string($_SESSION['user_name']);
        
        mysql_connect('localhost','root','manikantsingh54@gmail.com');
        mysql_select_db('maniroom_users');
        
        
    if(!empty($first_name)&& !empty($country)&& !empty($dob) && !empty($email) && !empty($zip) && !empty($pass))
    {
        $pass = md5($pass);
        
        
        $query="UPDATE `mani_room_users` SET `first_name`='$first_name',`last_name`='$last_name',`pass`='$pass',`country`='$country',`zip`='$zip',`dob`='$dob',`email`='$email' WHERE `username` ='$username'";
        
        if(mysql_query($query)==true)
        {
         echo 'id is updated successfully';
        
        }else{
                    
                    echo 'unable to update   try later....';
                    echo mysql_error();
                
        }
    
}else if(!empty($first_name)&& !empty($country)&& !empty($dob) && !empty($email) && !empty($zip) ){
        
         $query="UPDATE `mani_room_users` SET `first_name`='$first_name',`last_name`='$last_name',`country`='$country',`zip`='$zip',`dob`='$dob',`email`='$email' WHERE `username` ='$username'";
        
        if(mysql_query($query)==true)
        {
         echo 'id is updated successfully';
        
        }else{
                    
                    echo 'unable to update   try later....';
                    echo mysql_error();
                
        }
        
        
    }else{
        
        echo 'any element other than password cannot be empty!';
    }
}
}else{
    
    header('Location: ../index.php');
}
?>

