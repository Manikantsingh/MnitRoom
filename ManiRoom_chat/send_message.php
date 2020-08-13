<?php
require_once('../ManiRoom_chat/config.php');
?>
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

<html>
    <head>
    <script type="text/javascript" src="../js/development-bundle/ui/jquery.ui.core.js"></script>
        <link rel="stylesheet" href="../js/css/smoothness/jquery-ui-1.10.4.custom.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../js/js/jquery-ui-1.10.4.custom.js"></script>    
<link type="text/css" href="../jquery.ui.chatbox.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery.ui.chatbox.js"></script>

    </head>
    
<?php
echo $username = clean($_SESSION['user_logs']);
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