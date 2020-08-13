<! DOCTYPE html>


<?php

require_once('../ManiRoom_chat/config.php');


if(!empty($_SESSION['user_logs'])){ //check if user session is set
    header('Location:test.php'); //redirect to login page if user session is not set
}

?>


<html>
<head>

<link rel="stylesheet" href="../js/css/smoothness/jquery-ui-1.10.4.custom.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../js/js/jquery-ui-1.10.4.custom.js"></script>    
<link type="text/css" href="../jquery.ui.chatbox.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery.ui.chatbox.js"></script>

</head>
<body>
    
    <?php
$db = 'bucky_chat';

	if(mysql_connect('localhost', 'root', ''))
	{
		if(mysql_select_db($db))
			{
			echo 'connected to database<br>';
			}
		else{
			 echo mysql_error();
		}
	}
	else {
		 echo mysql_error();
	}
?>

<!--form-->
<form action="login.php" method="post">
<p>
<label for="username">Username:</label>
<input type="text" name="username" id="username">
<input type="submit" value="login">
</p>
</form>

<?php

//form processing
if(!empty($_POST['username'])){
	
	$username = clean($_POST['username']);
    
    $query= "SELECT username FROM users WHERE username='$username'";
    
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
                   
	               	 $_SESSION['user_logs'] = $user_name; //create a session for user
                    header('Location: test.php'); //redirect to chatbox page
                    }
                
            }
    
	
}
?>

<?php

//sanitize user input
function clean($str){
	return trim(mysql_real_escape_string($str));
}
?>

    
    
    
    
    
    
    
    
</body>
    
    
    
</html>