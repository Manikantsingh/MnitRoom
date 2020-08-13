<?php


include 'signin_session.inc.php';


if(mysql_connect('localhost', 'root', ''))
	{
		
	
    $new_database = $_SESSION['user_name'];
    
    $query="CREATE DATABASE `$new_database`";

if($query_run=mysql_query($query)){
    echo "new database created";
    
    if(mysql_select_db($new_database))
       {
        $query="CREATE TABLE personal_info(
            id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            first_name TEXT,
            last_name TEXT,
            username VARCHAR( 30 ) ,
            pass VARCHAR( 32 ) ,
            country TEXT( 3 ) ,
            zip INT( 8 ) ,
            dob DATE,
            email VARCHAR( 30 ) ,
            no_friends INT( 4 )
            )";
        
        if($query_run=mysql_query($query))
        {
            
            echo 'table and database created';
            
            $query = "CREATE TABLE status_wall (
                    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    comment VARCHAR(255),
                    comment_time TIMESTAMP
                    )";
                
                if($query_run=mysql_query($query))
                {
                
                    echo 'status wall is also created';
                    header('Location: mainstream.html');
                }
        }
        
       }    
    
}else{
    
    echo mysql_error();
}
    
}else {
		 echo mysql_error();
	}

?>