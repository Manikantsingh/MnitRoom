<?php

require_once('../ManiRoom_chat/config.php');
echo 'now you are logged out';

session_destroy();
header('Location:../ManiRoom_chat/login.php');

?> 