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

<?php
require_once('config.php');

$user = $_SESSION['user_logs'];
echo $date = date('Y-m-d');
$query ="SELECT * FROM chat_box WHERE date_sent='$date' AND sendto='$user' OR sender='$user'";

if($query_run=mysql_query($query)){
		if($mysql_row=mysql_fetch_assoc($query_run)){

				
                //echo 'sender: '.$sender =$mysql_row['sender'].'<br>';
                //echo 'sendto: '.$sendto =$mysql_row['sendto'].'<br>';
                echo '<br>message: '.$message =$mysql_row['message'].'<br>';
                echo 'date: '.$date_sent =$mysql_row['date_sent'].'<br>';
				
				}else{
			echo 'No Results';
		
		}
				
				
				
			}else{
			echo mysql_error();
			
			}
