<style>
    #searchcss{
        font-size:12px;
        font-weight:bold;
    }
#searchcss a{
    font-family:sans-serif;
    margin-left:5px;
    text-decoration:none;
    font-size:12px;
}
</style>


<span id="searchcss"><br/>

<?php


if(isset($_GET['search_text'])) {
	 $search_text = $_GET['search_text'];
	}
if(!empty($search_text)){

	require 'database_connection.inc.php';
	$query="SELECT `username`,`first_name`,`last_name` FROM `mani_room_users` WHERE `first_name` LIKE '%".mysql_real_escape_string($search_text)."%'";
	if($query_run=mysql_query($query)){
        if(mysql_num_rows($query_run)!=NULL){
        
		while($query_row=mysql_fetch_assoc($query_run)){
echo  $username = '<img src="Get_other_pic.php?search_text='.$query_row['username'].'" height="20px;" width="20px;"></img>'.'<a href="profile_search.php?search_text='.$query_row['username'].'">'.$query_row['first_name'].'&nbsp'.$query_row['last_name'].'</a><hr/>';
				//include 'searchresult.php';
		}
        }else{
			echo 'No Results';
		
		}
	}
}

?>
</span>











