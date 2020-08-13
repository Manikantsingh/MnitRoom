
<form action="profilepic.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"></input>
	<input type="submit" value="submit" name="submit"/>

</form>



<?php
	
		if(mysql_connect('localhost', 'root', 'manikantsingh54@gmail.com'))
		{
		if(mysql_select_db('maniroom_users'))
			{
			//echo 'database connected';
			}
		else{
			 echo mysql_error();
		}
	}
	else {
		 echo mysql_error();
	}

include 'signin_session.inc.php';
if(isset($_POST['submit']))
{
	
		$imagename = mysql_real_escape_string($_FILES['file']['name']);
		@$imagedata = mysql_real_escape_string(file_get_contents($_FILES['file']['tmp_name']));
		$imagetype = mysql_real_escape_string($_FILES['file']['type']);
		
	if(substr($imagetype,0,5) == "image" )
	{
		
			
			if(@mysql_query("UPDATE `mani_room_users` SET `profilepic`='$imagedata' WHERE `username`='".$_SESSION['user_name']."'"))
				{
					echo "image uploaded<br>";
    
					
				}else{
					echo 'image size must be less than 900 kb<br>';
					echo 'upload unsuccessfull';
				}
			
	}else{
		echo 'only images are allowed<br>';
	}
}

?>

<img src="get.php"  height="200"; />