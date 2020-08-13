<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>Starter Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
      
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <div id="status_up">
 <h4 >Status Update</h4>
    
   <p id="demo"></p>
   <textarea  type="text" cols="80" style="margin: 0px; height: 60px; width:auto;" id="status_update"></textarea><br/>
    
    <button type="submit" class='bt' id="post">POST</button>

	
</div>
        
        
        
        
       <?php 

include '../signin_session.inc.php';

if(loggedin()){
    
    $username = $_SESSION['user_name'];
      mysql_connect('localhost','root','manikantsingh54@gmail.com')or die(mysql_error());
    mysql_select_db($username)or die(mysql_error());
    
    $query ="CREATE TEMPORARY TABLE IF NOT EXISTS `temp_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
   `username` varchar(30) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4";
    
    
     
    
    if(mysql_query($query)==true){
        
        //echo 'temporary database created';
    }
    
     mysql_select_db($username)or die(mysql_error());
    $query="SELECT `username` FROM `friend_list` WHERE 1";
    if($result = mysql_query($query)){
        if(mysql_num_rows($result)==NULL){
            
        
        }else{
            
            while($result_row = mysql_fetch_assoc($result)){
                
                $friend = $result_row['username'];
               if(mysql_select_db($friend)){
                
                $query= "SELECT * FROM `status_wall` WHERE 1";
               
                   if($query_results=mysql_query($query))
                   {
                       if(mysql_num_rows($query_results)==NULL){
                           
                           
                       }else{
                           
                           while($res = mysql_fetch_assoc($query_results)){
                               
                               
                             $comment = $res['comment'];
                               $comment_time = $res['comment_time'];
                               
                               mysql_select_db($username);
                               
                        $query ="INSERT INTO `temp_status` (`username`, `comment`, `comment_time`) VALUES ('$friend', '$comment', '$comment_time')";
                               if(mysql_query($query)==true)
                               {
                                   
                                
                               }else{
                                    echo '<br>'.mysql_error();
                                   
                               }
                           }
                           
                           mysql_select_db($username);
                           
                           $query = "SELECT * FROM `status_wall` WHERE 1";
                            if($query_results=mysql_query($query))
                   {
                       if(mysql_num_rows($query_results)==NULL){
                           
                           
                       }else{
                            mysql_select_db($username);
                           while($res = mysql_fetch_assoc($query_results)){
                               
                               
                             $comment = $res['comment'];
                               $comment_time = $res['comment_time'];
                               
                              
                               
                        $query ="INSERT INTO `temp_status` (`username`, `comment`, `comment_time`) VALUES ('$username', '$comment', '$comment_time')";
                               if(mysql_query($query)==true)
                               {
                                   
                                
                               }else{
                                   echo '<br>'.mysql_error();
                                   
                               }
                           }
                           
                           
                           
                       }
                       
                   }
                   
                   
               }
                
            }
            
        }
             
        
    }
                 
            ?><div><?php
            echo '<br>';
            
                  mysql_select_db($username);
                  $query = "select * from temp_status where 1 order by comment_time desc limit 0,60";
                  if($end = mysql_query($query)){
                      if(mysql_num_rows($end)==NULL){
                          
                          echo 'no status';
                  }else{
                      while($end_result=mysql_fetch_assoc($end)){
                          
                      ?> <pre><?php  echo '<img src="Get_other_pic.php?search_text='.$end_result['username'].'" height="30px;" width="30px;"></img>';
                         echo '&nbsp    '.'<strong>'.$user = $end_result['username'];
                          echo '&nbsp                                                            '.$id = $end_result['comment_time'];
                          
                          echo '<br>'.'<br>'.'<strong>'.$id = $end_result['comment'].'</strong>'.'<hr>';?></pre><?php
                         
                      }
                      
                  }
    ?></div><?php
                  
                  }
        
            
        }
    }else{
        
        echo 'An error ocurred';
    }
    
    
    
}else{
    
    header('Location: ../index.php');
}


?>
        
        <script type="text/javascript" src="hand_made_js/post.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- compiled and minified Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
