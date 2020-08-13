<?php

require 'database_connection.inc.php';

if(isset($_GET['search_text'])) {
	  $search_text = $_GET['search_text'];
	
		$query="SELECT * FROM `mani_room_users` WHERE `username`='$search_text' ";
		if($query_run=mysql_query($query)){
			if($mysql_row=mysql_fetch_assoc($query_run)){
				?><hr><b><?php
				echo 'First Name:'.$owner =$mysql_row['first_name'].'<br>';
				echo 'Last Name:'.$specifications = $mysql_row['last_name'].'<br>';
				echo 'Username: '.$facilities =$mysql_row['username'].'<br>';
				echo 'location: '.$location =$mysql_row['country'].'<br>';
                echo 'email: '.$location =$mysql_row['email'].'<br>';
                echo 'DOB: '.$location =$mysql_row['dob'].'<br>';
				
				}
				
				
				
			}else{
			echo mysql_error();
			
			}
		
		}else{
			echo mysql_error();
		}
	

	

?>