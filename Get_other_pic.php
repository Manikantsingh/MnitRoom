<?php
	
mysql_connect("localhost","root","manikantsingh54@gmail.com");
	mysql_select_db("maniroom_users");

    if(isset($_GET['search_text'])){
        
        $username=$_GET['search_text'];
    
	
	$result = mysql_query("select * from mani_room_users where `username`='$username'");
	
	while($row=mysql_fetch_assoc($result))
	{
	$image = $row['profilepic'];
	header("content-type: image/jpeg");
	echo $image;
	}
}else{
        die();
        
    }
?>