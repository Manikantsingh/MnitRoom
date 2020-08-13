<?php

require 'signin_session.inc.php';

echo 'now you are logged out';
$username = $_SESSION['user_name'];

mysql_connect('localhost','root','manikantsingh54@gmail.com');
mysql_select_db('maniroom_users');
 mysql_query("UPDATE `mani_room_users` SET `online_status`='0' WHERE `username`='$username'");

session_destroy();
header('Location: index.php');

?> 