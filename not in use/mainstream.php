
<! DOCTYPE html>

<html lang="en">
<head>
    
     <meta charset="utf-8">
    <title>People</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
       
        <!-- Bootstrap core CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    
        
    <link rel="stylesheet" type="text/css" href="PACE.css" >
    <link rel="stylesheet" type="text/css" href="mainstreamcss.css">
    
<style>
body {
   align-content: center;
   
	background-color: #ffffff;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:12px;
}
</style>

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

<body  style="max-width=1500px; overflow-x:auto;" >
    
<!--  header  -->
    <div id="header">
        <div id="People_link">
        <img src="images/logo.png" height="25px" ><a href="profileview.php">People</a></img>
        </div>
        <div>
            <ul>
                <li><a href="http://localhost/ManiRoom/hand_made_js/new_status.php" id="NEW_STATUS">New</a></li>
                <li><a href="http://localhost/ManiRoom/hand_made_js/edit.php" id="EDIT">Manage</a></li>
                <li><a href="#">Delete</a></li>
                <li><a href="#">Group</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>


<!--message image    -->
    
 <div id="Profile">
 <a href="#" ><img src="images/bootstrap3message_Page_01.png" height="25px;"></img></a>
</div>
    
    
<!--setting image-->
    
<div id="settings">
    
       
     
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
      <h3><?php 

        $result=mysql_query("SELECT `first_name`,`last_name` FROM `mani_room_users` WHERE `username`='".$_SESSION['user_name']."'");
        while($row=mysql_fetch_assoc($result))
        {
        echo $row['first_name'].'&nbsp'.$row['last_name']; 
          
        }  ?>
      </h3> <img src="get.php" height="35px;" width="35px;"></img></a>
</div>
    </div>

<!--list of friends-->
 <div  id="list" style="width:270px; height:590px; overflow: auto;" >
        <p class="user-input">Search Friend</p>
     
    <form id="search" name="search">
      <input type="text" class="form-control2" placeholder="Search" name="search_text" onKeyUp="findmatch();">
        <span><a href="#"> <img src="images/bootstrapsearch.png" height=20px;></img></a></span>
    </form>
<div id="results" >
</div>

<div id="main_container" >   
        <?php 

$username=$_SESSION['user_name'];
$_SESSION['username']=$username;


if(loggedin()){
        mysql_connect("localhost","root","");
        mysql_select_db("bucky_chat");

            $query = "SELECT username FROM users WHERE username !='$username'";
        if($mysql_run=mysql_query($query)){
            if(mysql_num_rows($mysql_run)==NULL){
                echo 'no friends yet';
                
            }else{
                
                while($mysql_row=mysql_fetch_assoc($mysql_run)){
                    

                    $users =$mysql_row['username'];
                    
                            
                  ?><br/>
            
                    <a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $users; ?>')"><?php echo '<img src="Get_other_pic.php?search_text='.$mysql_row['username'].'" height="30px;" width="30px;"></img>'.'&nbsp'.'&nbsp'.$users; ?></a><hr/>
                   
                    <?php
                    
                }
            }
            
        }


}
     mysql_close();   ?></div>

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



<div id="status" style="width:800px; height:590px; overflow:auto" >
   
    
<div id="status_up">
 <h4 >Status Update</h4>
    
   <p id="demo"></p>
   <input  type="text" cols="80" style="margin: 0px; height: 60px; width: 480px;" id="status_update"></input><br/>
    
    <button type="submit" class='bt' id="post">POST</button>

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
    
    
    
</div>

<!--chat column-->
    <div id="chat" style="width:280px; height:600px; overflow:auto">
    
        <?php 
                mysql_connect('localhost','root','');
                mysql_select_db('maniroom_users');

                $sql_run = mysql_query("SELECT `first_name`, `last_name`, `username`  FROM `mani_room_users` WHERE `online_status`=1 AND `username`!='$username'" );

            echo '<br><br>Online Friends';
           
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
            echo '<a href="profile_search.php?search_text='.$row_result['username'].'"><br>'.'<br>'.'<img src="Get_other_pic.php?search_text='.$row_result['username'].'" height="30px;" width="30px;"></img>';
                    echo '&nbsp'.'&nbsp'.'&nbsp'.'<strong>'.$row_result['first_name'].'&nbsp'.$row_result['last_name'].'<hr/>'.'</strong>'; 
                    
            
    
}
    }
   }
        
        
        
        } 
    ?>
        
	</div>

 <script type="text/javascript" src="actualc_chat/js/jquery.js"></script>
<script type="text/javascript" src="actualc_chat/js/chat.js"></script>
<script type="text/javascript" src="PACE.js"></script>
<script type="text/javascript" src="hand_made_js/notification.js"></script>
<script type="text/javascript" src="hand_made_js/post.js"></script>
<script type="text/javascript" src="hand_made_js/edit.js"></script>
<script type="text/javascript" src="hand_made_js/new_status.js"></script>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- compiled and minified Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
