<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../images/logo.png">
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
        
        display:flex;
        min-width:500px;
    }
    #edit_up{
        
        margin:0px;
    }
    #details{
        height:auto;
        display:block;
    }
            
        </style>
        
        
        
    </head>

    <body>
    <div id="mana">
        
    <div id="edit_up">

<?php 

include '../signin_session.inc.php';


if(loggedin()){
    
    
    mysql_connect('localhost','root','manikantsingh54@gmail.com') or die(mysql_error());
    mysql_select_db('maniroom_users');
    
    $username = $_SESSION['user_name'];
    
      echo '<img src="Get_other_pic.php?search_text='.$_SESSION['user_name'].'" height="180px;"></img>';
            
        
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

   <?php  echo '<br>'.'<strong>First Name:</strong>';?>
    <input id="first_name" class="form-control" value="<?php echo $owner =$mysql_row['first_name']; ?>"></input><br><?php 
  
    echo '<br>'.'<strong>Last Name:</strong>'.'<br>';?>
   <input id="last_name" class="form-control" value="<?php echo $owner =$mysql_row['last_name']; ?>"></input><br><?php
    
    echo '<br>'.'<strong>New Password:</strong>'.' if want to change'.'<br>';?>
   <input id="pass" class="form-control" value=""></input><br><?php
        


     echo '<br>'.'<strong>DOB:</strong>  '.'<br>';?>
    <input id="dob" class="form-control" value="<?php echo $owner =$mysql_row['dob']; ?>"></input><br><?php

     echo '<br>'.'<strong>Email: </strong> '.'<br>';?>
    <input id="email" class="form-control" value="<?php echo $owner =$mysql_row['email']; ?>"></input><br><?php

     echo '<br>'.'<strong>Country: </strong> '.'<br>';?>
    <input id="country" class="form-control" value="<?php echo $owner =$mysql_row['country']; ?>"></input><br><?php

     echo '<br>'.'<strong>Zip Code: </strong> '.'<br>';?>
   <input id="zip" class="form-control" value="<?php echo $owner =$mysql_row['zip']; ?>"></input><br><?php
    
   ?>
<style>
    .status_top {
   
    border: none;
    display: inline;
    margin-top:10px;
    background: blue;
    height: 30px;
    width: 150px;
    color: #ffffff;
    text-align: center;
    border-radius: 5px;
  	-webkit-transition: all 0.15s linear;
	  -moz-transition: all 0.15s linear;
	  transition: all 0.15s linear;
}

    
    </style>

<button type="button" class="status_top" data-loading-text="saved"  id="update_id">Save Changes</button><?php
    
}


?>
    
    
       </div> 
    </div>
        

        
        <script type="text/javascript" src="http://localhost/ManiRoom/hand_made_js/update_id.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- compiled and minified Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
