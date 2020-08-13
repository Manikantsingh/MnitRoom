<?php

$username = $_SESSION['user_name'];

$query="SELECT * 
FROM  `mani_room_users` 
WHERE  `username` =  '$username'
LIMIT 0 , 30";


if($query_run=mysql_query($query)){
    
    if($mysql_row=mysql_fetch_assoc($query_run)){
        
       
    }
}



?>