<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<form action="image_upload.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="image">
			<input type="submit" name="submit" value="submit">
		</form>
		
		<?php
		//connect to the server
		
			mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("image") or die(mysql_error());
			
			
			if(!isset($_FILES['image']['tmp_name']))
				echo "please select some image";
			else{
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);
				
				if($image_size == FALSE)
					echo "that is not an image";
				else{
					$result=mysql_query("insert into storeimages value('','$image_name','$image')");
					?>
					<img src="get.php">
					<?php
				}
				
			}
		?>
	</body>
</html>