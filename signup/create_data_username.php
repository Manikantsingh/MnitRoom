<?php


if(mysql_connect('localhost', 'root', 'manikantsingh54@gmail.com'))
	{
		
	
    $new_database = $unique_username;
    
    $query="CREATE DATABASE `$new_database`";

if($query_run=mysql_query($query)){
    echo "new database created";
    
    if(mysql_select_db($new_database))
       {
       

$query="CREATE TABLE IF NOT EXISTS `friend_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text,
  `last_name` text,
  `username` varchar(30) DEFAULT NULL,
  `country` tinytext,
  `zip` int(8) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_friends` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2" ;

mysql_query($query);

$query="CREATE TABLE IF NOT EXISTS `friend_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `recd` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2" ;
        mysql_query($query);



$query="CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text,
  `last_name` text,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `country` tinytext,
  `zip` int(8) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_friends` int(4) DEFAULT NULL,
  `profilepic` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysql_query($query);

$query="CREATE TABLE IF NOT EXISTS `status_wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4" ;
        
        if(mysql_query($query)==true){
            $_SESSION['user_name']=$unique_username;
            
            header("Location: ../profileview.php");
        }



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

        
       }else{
			echo mysql_error();
	   }   
    
}else{
    
    echo mysql_error();
}
    
}else {
		 echo mysql_error();
	}

?>