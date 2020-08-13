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
      
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    
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
    <style>
    .menu_top {
   
    border: none;
    display: inline;
    background: blue;
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
    
    
    </head>
<body>
<?php

include '../signin_session.inc.php';


if(loggedin()){
    
     $username= $_SESSION['user_name'];
    mysql_connect('localhost','root','manikantsingh54@gmail.com');

    mysql_select_db($username);
    
    if($query_results=mysql_query("SELECT `username`, `recd` FROM `friend_request` WHERE recd='0' limit 0,30")){
        
    if(mysql_num_rows($query_results)==NULL)
        {
            echo 'No pending requests';
        }else{
            while($mysql_row=mysql_fetch_assoc($query_results)){
            echo '&nbsp'.'&nbsp'.'<img src="Get_other_pic.php?search_text='.$mysql_row['username'].'" height="30px;" width="30px;"></img>'.'<a href="profile_search.php?search_text='.$mysql_row['username'].'">'.$mysql_row['username'].' sent you friend request'.'</a>';
                
            ?><button type="button" class="menu_top" id="accept" href="/ManiRoom/hand_made_js/accept.php?username=<?php echo $mysql_row['username'];?>">Accept</button>&nbsp<?php
            ?><button type="button" class="menu_top" id="delete" href="/ManiRoom/hand_made_js/delete_request.php?friend=<?php echo $mysql_row['username'];?>">Delete</button><hr><br><?php
                
           
            }
        }
    }
}else{
    
    header('Location: http://localhost/ManiRoom/index.php');
}


?>

    
    
<script type="text/javascript" src="http://localhost/ManiRoom/hand_made_js/request_handler.js"></script>




        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- compiled and minified Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
    </html>
    