<?php
    require 'database_connection.inc.php';
    include 'signin_session.inc.php';
if(loggedin()){

?>


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

 
   <a  href="#" id="notifications"  data-toggle="modal" data-target="#myModal"><img src="images/bootstrapsetting3_Page_01.png" height="37px;"></img></a>
   <!-- Modal-->
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

<div id="do">
<!--list of friends-->
 <div  id="list" >
        <p class="user-input">Search Friend</p>
     
    <form id="search" name="search">
      <input type="text" class="form-control" placeholder="Search" name="search_text" onkeyup="findmatch();">
        <span><a href="#"> <img src="images/bootstrapsearch.png" height=20px;></img></a></span>
    </form>
<div id="results"></div>

<div id="main_container" style="max-height:300px; overflow-y:scroll; ">   <br/>
        <?php 

$username=$_SESSION['user_name'];
$_SESSION['username']=$username;


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
                    $us =$mysql_row['first_name'];
                    $usl =$mysql_row['last_name'];
                    
                            
                  ?>
                    <a style="font-size:12px; " href="javascript:void(0)" onClick="javascript:chatWith('<?php echo preg_replace('/\s+/', '', $users); ?>')"><?php echo '<img src="Get_other_pic.php?search_text='.$mysql_row['username'].'" height="20px;" width="20px;"></img>'.'&nbsp'.'&nbsp'.$us.'&nbsp'.$usl; ?></a><hr/>
                   
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
    #mana{
        
        display:flex;
        min-width:500px;
    }
    #edit_up{
        
        margin:0px;
    }
#details {
    margin-left: 50px;
    margin-top=0px;
    font-size: 12px;
    display:inline;
}
#details  span{
    font-size: 20px;
    font-family: segoe ui light;
    
}
#details p{
    font-size: 20px;
    font-family: segoe ui light;
}
            
        </style>



<div id="status">

         <div id="mana">
        
    <div id="edit_up">
   <?php
mysql_connect('localhost','root','manikantsingh54@gmail.com');
                mysql_select_db('maniroom_users');
        echo '<img src="Get_other_pic.php?search_text='.$_GET['search_text'].'" height="180px;"></img>';
            
        $username = $_GET['search_text'];

        $query="SELECT * 
        FROM  `mani_room_users` 
        WHERE  `username` =  '$username'
        LIMIT 0 , 30";


if($query_run=mysql_query($query)){
    
    if($mysql_row=mysql_fetch_assoc($query_run)){
        
      
    }
}else{
    
    die();
}
?>
</div>
        
        <div id='details' class="input-group">

   <?php  echo '<br>'.'<strong>First Name:</strong>'.'<br>';?>
    <span><?php echo $owner =$mysql_row['first_name'].'<br>'; ?></span><?php 
  
    echo '<br>'.'<strong>Last Name:</strong>'.'<br>';?>
   <span><?php echo $owner =$mysql_row['last_name'].'<br>'; ?></span><?php

     echo '<br>'.'<strong>User Name:</strong>'.'<br>';?>
    <p id="last"><?php echo $owner =$mysql_row['username'].'<br>'; ?></p>
   
    
<!--  to send username to javascript file   -->
    
        <?php


     echo '<br>'.'<strong>DOB:</strong>  '.'<br>';?>
    <span><?php echo $owner =$mysql_row['dob'].'<br>'; ?></span><?php

     echo '<br>'.'<strong>Email: </strong> '.'<br>';?>
    <span><?php echo $owner =$mysql_row['email'].'<br>'; ?></span><?php

     echo '<br>'.'<strong>Country: </strong> '.'<br>';?>
    <span><?php echo $owner =$mysql_row['country'].'<br>'; ?></span><?php

     echo '<br>'.'<strong>Zip Code: </strong> '.'<br>';?>
    <span><?php echo $owner =$mysql_row['zip'].'<br>'; ?></span><?php
    
     echo '<br>'.'<strong>Total Friends: </strong> '.'<br>';?>
        <span><?php echo $owner =$mysql_row['no_friends'].'<br>';?></span>

    
    
    
  </div> 
    </div>

<?php 
    
mysql_select_db($mysql_row['username']) or die(mysql_error());
if($query_run=mysql_query("select `username` from friend_request where `username`='".$_SESSION['user_name']."' and `recd`='0'"))
{

    if(mysql_num_rows($query_run)!=NULL){    
  ?>  
<div>
 <button type="button"  class="btn btn-primary">
  Friend Request Sent
</button>
</div>
   <?php 
    
    
    }elseif( mysql_select_db($_SESSION['user_name'])){
        
         if($query_run=mysql_query("select `username` from friend_list where `username`='".$mysql_row['username']."'")){
        if(mysql_num_rows($query_run)!=NULL){
    
    ?>
    <div>
     <button type="button"  class="btn btn-primary">
        Friends
    </button>
</div>
    <?php
    }else if($_SESSION['user_name']!=$mysql_row['username']){
          ?>
    <div>
      <button type="button" id="loading-example-btn" data-loading-text="Friend Request Sent" class="btn btn-primary">
        Add Friend
    </button>

</div>
    <?php
        
    }else{
            
            
        }
         }
}
}
    
?>    
    
    
</div>

<!--chat column-->
    <div id="chat">
	<div id="chat_div">
         <?php 
                mysql_connect('localhost','root','manikantsingh54@gmail.com');
                mysql_select_db('maniroom_users');
$username=$_SESSION['user_name'];

                $sql_run = mysql_query("SELECT `first_name`, `last_name`, `username`  FROM `mani_room_users` WHERE `online_status`=1 AND `username`!='$username'" );

            echo 'Online Friends<br><br>';
           
   if(mysql_num_rows($sql_run)==NULL){
       
       echo '<br><br>No Friend Online';
   }else{
       
      while($row=mysql_fetch_assoc($sql_run))
        {
      //echo '<br>'.'<br>'.$row['first_name'].'&nbsp'.$row['last_name']; 
          
          mysql_select_db($username);
if($query_run =mysql_query("SELECT `first_name`, `last_name`, `username`  FROM `friend_list` WHERE `username`='".$row['username']."'"))
{
               
    while($row_result=mysql_fetch_assoc($query_run)) {
            echo '<a style="font-size:12px; text-decoration:none; " href="profile_search.php?search_text='.$row_result['username'].'">'.'<img src="Get_other_pic.php?search_text='.$row_result['username'].'" height="20px;" width="20px;"></img>';
                    echo '&nbsp'.'&nbsp'.'&nbsp'.'<strong>'.$row_result['first_name'].'&nbsp'.$row_result['last_name'].'<hr/>'.'</strong>'; 
                    
            
    
}
    }
   }
        
        
        
        } 
   
}else{
    
    header('Location: profileview.php');
}?>

	
	</div>
        
        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Farkleaf&amp;width=50&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px; float:left; margin-left:0px; position:absolute;" allowTransparency="true"></iframe>
        
      
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

>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="bootstrap-master/dist/css/bootstrap-theme.css"></script>
    <script type="text/javascript" src="bootstrap-master/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="hand_made_js/add_friend.js"></script>

   
</body>
</html>