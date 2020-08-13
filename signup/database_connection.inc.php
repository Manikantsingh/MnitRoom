<?php


	if(mysql_connect('localhost', 'root', 'manikantsingh54@gmail.com'))
	{
		if(mysql_select_db('maniroom_users'))
			{
			//echo 'connected to database<br>';
			}
		else{
			 echo mysql_error();
		}
	}
	else {
		 echo mysql_error();
	}
?>