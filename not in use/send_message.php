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

require_once('../ManiRoom_chat/config.php');

$username = clean($_POST['username']);
$sendto = clean($_POST['sendto']);
$message = clean($_POST['message']);
$date = date('Y-m-d');

$send_message = mysql_query("INSERT INTO chat_box SET sender='$username', sendto='$sendto', message='$message', date_sent='$date'");
?>


<?php
function clean($str){
	return trim(mysql_real_escape_string($str));
}
?>