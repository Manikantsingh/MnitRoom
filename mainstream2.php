				

<! DOCTYPE html>

<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
    
     <meta charset="utf-8">
    <title>People</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/logo.png">
       
        <!-- Bootstrap core CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
       

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    
        
    <link rel="stylesheet" type="text/css" href="PACE.css" >
    <link rel="stylesheet" type="text/css" href="ultimatecss.css">
    


<link type="text/css" rel="stylesheet" media="all" href="actualc_chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="actualc_chat/css/screen.css" />
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
    
    
<!--script to search friend among ManiRoom-->
    <script type="text/JavaScript">
        function findmatch(){
        
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest(); 
        
        }else{
            
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        
            xmlhttp.onreadystatechange = function() {
             if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
             
             document.getElementById('results').innerHTML = xmlhttp.responseText;
             }   
                 
            }
        xmlhttp.open('GET', 'search.inc.php?search_text='+document.search.search_text.value, true);
            xmlhttp.send(); 
        }
        
    </script>
 
<!-- script to load status-->
    <!--    -->
    
    
    
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




    
<!--  header  -->
    <div id="header">
        <div id="People_link">
        <img src="images/logo.png" height="25px" ><a href="profileview.php">ManiRoom</a></img>
        </div>
        <div>
            <ul>
                <li><a href="http://localhost/ManiRoom/hand_made_js/new_status.php" id="NEW_STATUS">New</a></li>
                <li><a href="http://localhost/ManiRoom/hand_made_js/edit.php" id="EDIT">Manage</a></li>
                <li><a href="http://localhost/ManiRoom/hand_made_js/unfriend.php" id="UNFRIEND" >Delete</a></li>
                <li><a href="http://localhost/ManiRoom/hand_made_js/status_del.php" id="STATUS_DEL">Status</a></li>
                <li><a href="logout.php">Logout</a></li>
				
            </ul>
        </div>



    
 <div id="Profile">
 <!--message image    -->
 <a href="http://localhost/ManiRoom/hand_made_js/list_friends_message.php"  id="message_list"><img src="images/bootstrap3message_Page_01.png" height="25px;"></img></a>

    
    
<!--setting image-->
 
     
<a  href="#" id="notifications"  data-toggle="modal" data-target="#myModal"><img src="images/bootstrapsetting3_Page_01.png" height="37px;"></img></a>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Notifications</h4>
      </div>
      <div class="modal-body" id="noti_area"></div>
        <div id=content_area></div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
        
 
</div>

<!--image and the name of user-->



<div id="settings2">
  <a href="#" onClick="MyWindow=window.open('http://localhost/ManiRoom/profilepic.php','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=yes,scrollbars=no,resizable=no,width=600,height=600'); return false;">
      <span><?php 

        $result=mysql_query("SELECT `first_name`,`last_name` FROM `mani_room_users` WHERE `username`='".$_SESSION['user_name']."'");
        while($row=mysql_fetch_assoc($result))
        {
        echo $row['first_name'].'&nbsp'.$row['last_name']; 
          
        }  ?>
      </span> <img src="get.php" height="25px;" width="25px;"></img></a>
</div>
    </div>

<!--list of friends-->
<div id="do">
 <div  id="list" >
        <p class="user-input">Search Friend</p>
     
    <form id="search" name="search">
      <input type="text" class="form-control" placeholder="Search" name="search_text" onKeyUp="findmatch();">
        <span><a href="#"> <img src="images/bootstrapsearch.png" height=20px;></img></a></span>
    </form>
<div id="results" style="max-height:250px; overflow-y:scroll; height:auto;" ></div>


<div id="main_container" style="max-height:300px; overflow-y:scroll; ">  <br/> 
        <?php 

$username=$_SESSION['user_name'];
$_SESSION['username']=mysql_real_escape_string($username);


if(loggedin()){
        mysql_connect("localhost","root","manikantsingh54@gmail.com");
        mysql_select_db($username);

            $query = "SELECT username,first_name,last_name FROM `friend_list` WHERE username !='$username' ORDER BY `first_name`";
        if($mysql_run=mysql_query($query)){
            if(mysql_num_rows($mysql_run)==NULL){
                echo 'no friends yet';
                
            }else{
                
                while($mysql_row=mysql_fetch_assoc($mysql_run)){
                    

                    $users =$mysql_row['username'];
                    $us = $mysql_row['first_name'];
                    $usl = $mysql_row['last_name'];
                            
                  ?>
            
                    <a style="font-size:12px; " href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $users ?>')"><?php echo '<img src="Get_other_pic.php?search_text='.$mysql_row['username'].'" height="20px;" width="20px;"></img>'.'&nbsp'.'&nbsp'.$us.'&nbsp'.$usl; ?></a><hr/>    
                   
                    <?php
                    
                }
            }
            
        }


}
     mysql_close();   ?>
    
    </div>

    </div>
	
<!--list of status of friends-->
<style>
.bt{
     border: none;
    display: block;
    background: #2193b4;
    margin-top:10px;
    height: 30px;
    width: 80px;
    color: #ffffff;
    text-align: center;
    border-radius: 5px;
  	-webkit-transition: all 0.15s linear;
	  -moz-transition: all 0.15s linear;
	  transition: all 0.15s linear;
    
}

</style>



<div id="status" >
   
         <div id="status_up">
 <h4 >Status Update</h4>
    
   <p id="demo"></p>
   <textarea  type="text" cols="80" style="margin: 0px; height: 60px; width:auto;" id="status_update"></textarea><br/>
    
    <button type="submit" class='bt' id="post">POST</button>

	
</div>
        
        
        
        
       <?php 

if(loggedin()){
    
    $username =mysql_real_escape_string($_SESSION['user_name']);
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
                  $query = "select * from temp_status where 1 order by comment_time desc limit 0,30";
                  if($end = mysql_query($query)){
                      if(mysql_num_rows($end)==NULL){
                          
                          echo 'no status';
                  }else{
                      while($end_result=mysql_fetch_assoc($end)){
                          
                      ?> <pre><?php  echo '<img src="Get_other_pic.php?search_text='.$end_result['username'].'" height="30px;" width="30px;"></img>';
                         echo '&nbsp    '.'<strong>'.$user = $end_result['username'];
                          echo '&nbsp                                                             '.$id = $end_result['comment_time'];
                          
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
	
</div>
        


<!--script for clock -->

<script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>

   
<!--script for clock --> 
    
    
    

<!--chat column-->
    <div id="chat" >
		
		<div id="chat_div">
        <?php 
                mysql_connect('localhost','root','manikantsingh54@gmail.com');
                mysql_select_db('maniroom_users');

                $sql_run = mysql_query("SELECT `first_name`, `last_name`, `username`  FROM `mani_room_users` WHERE `online_status`=1 AND `username`!='$username'" );

            echo 'Online Friends<br><br>';
           
   if(mysql_num_rows($sql_run)==NULL){
       
       echo '<br><br>No Friend Online';
   }else{
       
      while($row=mysql_fetch_assoc($sql_run))
        {
      //echo '<br>'.'<br>'.$row['first_name'].'&nbsp'.$row['last_name']; 
          
          mysql_select_db($username);
if($query_run =mysql_query("SELECT `first_name`, `last_name`, `username`  FROM `friend_list` WHERE `username`='".$row['username']."' "))
{
               
    while($row_result=mysql_fetch_assoc($query_run)) {
            echo '<a style="font-size:12px;text-decoration:none; text-decoration:none;" href="profile_search.php?search_text='.$row_result['username'].'">'.'<img src="Get_other_pic.php?search_text='.$row_result['username'].'" height="20px;" width="20px;"></img>';
                    echo '&nbsp'.'&nbsp'.'&nbsp'.'<strong>'.$row_result['first_name'].'&nbsp'.$row_result['last_name'].'<hr/>'.'</strong>'; 
                    
            
    
}
    }
   }
        
        
        
        } 
    ?>
	
	</div>
        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2Farkleaf&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:125px; max-width:100px; float:left; margin-left:0px; position:absolute;" allowTransparency="true"></iframe>
        
  
        </div>
   
	</div>
 
<footer id="footer">
       
        <div id="footer_op">
            <ul>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Copyright © 2014 mani</a></li>
            </ul>
             <div id="name_site">
                ManiRoom
            </div>
        </div>
    </footer>



<script type="text/javascript" src="actualc_chat/js/jquery.js"></script>
<script type="text/javascript" src="actualc_chat/js/chat.js"></script>
<script type="text/javascript" src="PACE.js"></script>
<script type="text/javascript" src="hand_made_js/notification.js"></script>
<script type="text/javascript" src="hand_made_js/post.js"></script>
<script type="text/javascript" src="hand_made_js/edit.js"></script>
<script type="text/javascript" src="hand_made_js/new_status.js"></script>
<script type="text/javascript" src="hand_made_js/list_friends_message.js"></script>
<script type="text/javascript" src="hand_made_js/unfriend.js"></script>
<script type="text/javascript" src="hand_made_js/status_del.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- compiled and minified Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
