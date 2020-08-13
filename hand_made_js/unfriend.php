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
        
        <style>

    #mana{
        
        display:block;
        min-width:500px;
    }
    #details{
        height:auto;
        display:block;
    }
            
        </style>
        
        
        
    </head>

    <body>
   

<?php 

include '../signin_session.inc.php';


if(loggedin()){
    
    $username = $_SESSION['user_name'];
    mysql_connect('localhost','root','manikantsingh54@gmail.com') or die(mysql_error());
    mysql_select_db($username);
    
    
  
        
        $query="SELECT * 
        FROM  `friend_list` 
        WHERE  1";


if($query_run=mysql_query($query)){
    
	      
   if(mysql_num_rows($query_run)!=NULL){
			while($mysql_row=mysql_fetch_assoc($query_run)){
			
	?><div id="mana">
        
    <div id="edit_up">
       <?php 
      echo '<img src="Get_other_pic.php?search_text='.$mysql_row['username'].'" height="180px;"></img>';
            
     ?> </div><a class="free" id="free" data-loading-text="Deleted" href="/ManiRoom/hand_made_js/unf_process.php?search_text=<?php echo $mysql_row['username'];?>">Unfriend</a>
        <div id="free_fr"></div>
	 
  <div id='details' class="input-group">

   <?php  echo '<br>'.'<strong>First Name:</strong>'.'<br>';?>
    <span><?php echo $owner =$mysql_row['first_name']; ?></span><?php 
  
    echo '<br>'.'<strong>Last Name:</strong>'.'<br>';?>
   <span><?php echo $owner =$mysql_row['last_name']; ?></span><?php

     echo '<br>'.'<strong>User Name:</strong>'.'<br>';?>
    <p id="last"><?php echo $owner =$mysql_row['username']; ?></p>
   
    
<!--  to send username to javascript file   -->
    
        <?php


     echo '<br>'.'<strong>DOB:</strong>  '.'<br>';?>
    <span><?php echo $owner =$mysql_row['dob']; ?></span><?php

     echo '<br>'.'<strong>Email: </strong> '.'<br>';?>
    <span><?php echo $owner =$mysql_row['email']; ?></span><?php

     echo '<br>'.'<strong>Country: </strong> '.'<br>';?>
    <span><?php echo $owner =$mysql_row['country']; ?></span><?php

     echo '<br>'.'<strong>Zip Code: </strong> '.'<br>';?>
    <span><?php echo $owner =$mysql_row['zip']; ?></span>
    
 
    
    
   <hr> 
  </div> 


<?php
 
}
}
}else{
    
    die();
}
}
?>
    
    
       </div> 
    </div>
        

        <script type="text/javascript" src="hand_made_js/unf_process.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- compiled and minified Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
