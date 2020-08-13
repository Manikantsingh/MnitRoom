<?php

	if(mysql_connect("localhost","root","")){
		if(mysql_select_db('image')){
			echo 'connected to database';
		}else{
			echo mysql_error();
		}
	}else{
		echo mysql_error();
	}
		
if(isset($_GET['id'])){
    
    $id = mysql_real_escape_string($_GET['id']);

	$query = "SELECT * FROM `storeimages` WHERE `id`='$id'";
	
	if($query_run = mysql_query($query)){
		
		while($row= mysql_fetch_assoc($query_run)){
			$imagedata = $row['image'];
             header('Content-Type: image/jpeg');
		      echo $imagedata;
		}
       
		
	}else{
		echo mysql_error();
	}
}else{
    
    echo 'error';
}
?>
<img src="get.php">
