<?php
    require 'database_connection.inc.php';
    include 'signin_session.inc.php';
?>


<! DOCTYPE html>

<html lang="en">
<head>
    
     <meta charset="utf-8">
    <title>People</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="PACE.js"></script>
    <link rel="stylesheet" type="text/css" href="PACE.css" >
    <link rel="stylesheet" type="text/css" href="mainstreamcss.css">
    <link rel="stylesheet" type="text/css" href="mainstreamcss2.css">
    <link rel="stylesheet" type="text/css" href="mainstream_theme.css">
    
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
 
<!---->
    
    
    
    
</head>

<body>
    
<!--  header  -->
    <div id="header">
        <div id="People_link">
        <img src="images/logo.png" height="25px" ><a>People</a></img>
        </div>
        <div>
            <ul>
                <li><a href="#">New</a></li>
                <li><a href="#">Manage</a></li>
                <li><a href="#">Delete</a></li>
                <li><a href="#">Group</a></li>
                <li><a href="../ManiRoom/logout.php">Logout</a></li>
            </ul>
        </div>


<!--message image    -->
 <div id="Profile">
 <a href="#"><img src="images/bootstrap3message_Page_01.png" height="25px;"></img></a>
</div>
<!--setting image-->
<div id="settings">
    <a href="#"><img src="images/bootstrapsetting3_Page_01.png" height="37px;"></img></a>
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
      </h3> <img src="get.php" height="35px;"></img></a>
</div>
    </div>

<!--list of friends-->
 <div  id="list" style="width:270px; height:590px; overflow: auto;" >
        <p class="user-input">Search Friend</p>
     
    <form id="search" name="search">
      <input type="text" class="form-control2" placeholder="Search" name="search_text" onkeyup="findmatch();">
        <span><a href="#"> <img src="images/bootstrapsearch.png" height=20px;></img></a></span>
    </form>
<div id="results"></div>
    </div>
<!--list of status of friends-->
<div id="status" style="width:800px; height:590px; overflow:auto">
    
     <a href="#" onClick="MyWindow=window.open('http://localhost/ManiRoom/profilepic.php','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=yes,width=600,height=600'); return false;"><img src="get.php" height="150px;"></img></a>
<p id='details'>
    <?php
    include 'GetStatus.php';

     echo '<br>'.'<strong>First Name:</strong>'.'<br>';?>
    <span><?php echo $owner =$mysql_row['first_name'].'<br>'; ?></span><?php 
  
    echo '<br>'.'<strong>Last Name:</strong>'.'<br>';?>
   <span><?php echo $owner =$mysql_row['last_name'].'<br>'; ?></span><?php

     echo '<br>'.'<strong>User Name:</strong>'.'<br>';?>
     <span><?php echo $owner =$mysql_row['username'].'<br>'; ?></span><?php


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
</p>
    
</div>

<!--chat column-->
    <div id="chat" style="width:280px; height:600px; overflow:auto">
    

	</div>

    
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>