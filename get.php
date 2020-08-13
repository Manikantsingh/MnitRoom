<?php
	mysql_connect("localhost","root","manikantsingh54@gmail.com");
	mysql_select_db("maniroom_users");

   
ob_start();
session_start();

function loggedin(){
	if(isset($_SESSION['user_name'])&& !empty($_SESSION['user_name'])){
		return true;
		}
		else{
		return false;
		}
}

    if(loggedin()){
    $username= $_SESSION['user_name'];
	
	$result = mysql_query("select * from mani_room_users where `username`='$username'");
	
	while($row=mysql_fetch_assoc($result))
	{
	$image = $row['profilepic'];
	header("content-type: image/jpeg");
	echo $image;
	}
}
?>