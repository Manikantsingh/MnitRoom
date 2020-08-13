<?php
    require 'database_connection.inc.php';
    require_once 'signin_session.inc.php';
?>
<?php
if(loggedin()){
    
    $username = $_SESSION['user_name'];
	$result = mysql_query("select * from mani_room_users where `username`='$username'");
	
    
	while($row=mysql_fetch_assoc($result))
	{
	$image = $row['profilepic'];
	header("content-type: image/jpeg");
	echo $image;
	}
}else{
    
    header("Location: ../ManiRoom/index.php");
}
?>