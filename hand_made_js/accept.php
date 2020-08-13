<?php 
include '../signin_session.inc.php';

if(loggedin()){
    
    //************************************************deleting friend request from friend request list************
    
  
    
    
    
    
    
    //add data to whom friend request is sent;
    
    if(isset($_GET['username']))
    {
        $friend = $_GET['username'];
         
        
        
 
       mysql_connect('localhost','root','manikantsingh54@gmail.com');
        mysql_select_db('maniroom_users');
        $query="SELECT * FROM `mani_room_users` WHERE `username`='$friend'";
        
        if($query_run=mysql_query($query)){
    
    if($mysql_row=mysql_fetch_assoc($query_run)){
        
      ?><div id='details'>

   <?php  echo '<br>'.'<strong>First Name:</strong>'.'<br>';?>
    <span><?php echo $first_name =$mysql_row['first_name']; ?></span><?php 
  
    echo '<br>'.'<strong>Last Name:</strong>'.'<br>';?>
   <span><?php echo $last_name =$mysql_row['last_name']; ?></span><?php

     echo '<br>'.'<strong>User Name:</strong>'.'<br>';?>
    <p id="last"><?php echo $username =$mysql_row['username']; ?></p>
   
    
<!--  to send username to javascript file   -->
    
        <?php


     echo '<br>'.'<strong>DOB:</strong>  '.'<br>';?>
    <span><?php echo $dob =$mysql_row['dob']; ?></span><?php

     echo '<br>'.'<strong>Email: </strong> '.'<br>';?>
    <span><?php echo $email =$mysql_row['email']; ?></span><?php

     echo '<br>'.'<strong>Country: </strong> '.'<br>';?>
    <span><?php echo $country =$mysql_row['country']; ?></span><?php

     echo '<br>'.'<strong>Zip Code: </strong> '.'<br>';?>
    <span><?php echo $zip =$mysql_row['zip']; ?></span><?php
    
     echo '<br>'.'<strong>Total Friends: </strong> '.'<br>';?>
        <span><?php echo $no_friends =$mysql_row['no_friends'];?></span>

   
</div>
<?php
         $no_friends++;
         $user_name=$_SESSION['user_name'];
        $query ="UPDATE `mani_room_users` SET `no_friends`='$no_friends' WHERE `username`='$friend'";
        if(mysql_query($query)==true){
            
        }else{
            
            die(mysql_error());
        }
        $query ="UPDATE `mani_room_users` SET `no_friends`='$no_friends' WHERE `username`='$user_name'";
       if(mysql_query($query)==true){
            
        }else{
            
            die(mysql_error());
        }
        
        
    }
}else{
    
    die();
}
        
        
        mysql_close();
        
       
        mysql_connect('localhost','root','manikantsingh54@gmail.com');
        mysql_select_db($user_name);
        
        $query = "DELETE FROM `friend_request` WHERE `username`='$friend'";
        mysql_query($query);
        
        
        
        
        
        $query = "INSERT INTO `friend_list` (`id`, `first_name`, `last_name`, `username`, `country`, `zip`, `dob`, `email`) VALUES ('','$first_name','$last_name','$username','$country','$zip','$dob','$email')";
        
        if(mysql_query($query)==true){
            
            echo 'friend request accepted';
        }
        else{
            
           echo mysql_error();
        }
        
// ***************************************** to insert data in sender profile**************************************************************************
        
        

       mysql_connect('localhost','root','manikantsingh54@gmail.com');
        mysql_select_db('maniroom_users');
        $query="SELECT * FROM `mani_room_users` WHERE `username`='$user_name'";
        
        if($query_run=mysql_query($query)){
    
    if($mysql_row=mysql_fetch_assoc($query_run)){
        
      ?><div id='details'>

   <?php  echo '<br>'.'<strong>First Name:</strong>'.'<br>';?>
    <span><?php echo $first_name =$mysql_row['first_name']; ?></span><?php 
  
    echo '<br>'.'<strong>Last Name:</strong>'.'<br>';?>
   <span><?php echo $last_name =$mysql_row['last_name']; ?></span><?php

     echo '<br>'.'<strong>User Name:</strong>'.'<br>';?>
    <p id="last"><?php echo $username =$mysql_row['username']; ?></p>
   
    
<!--  to send username to javascript file   -->
    
        <?php


     echo '<br>'.'<strong>DOB:</strong>  '.'<br>';?>
    <span><?php echo $dob =$mysql_row['dob']; ?></span><?php

     echo '<br>'.'<strong>Email: </strong> '.'<br>';?>
    <span><?php echo $email =$mysql_row['email']; ?></span><?php

     echo '<br>'.'<strong>Country: </strong> '.'<br>';?>
    <span><?php echo $country =$mysql_row['country']; ?></span><?php

     echo '<br>'.'<strong>Zip Code: </strong> '.'<br>';?>
    <span><?php echo $zip =$mysql_row['zip']; ?></span><?php
    
     echo '<br>'.'<strong>Total Friends: </strong> '.'<br>';?>
        <span><?php echo $no_friends =$mysql_row['no_friends'];?></span>

   
</div>
<?php

        
    }
}else{
    
    die();
}
        
        
        mysql_close();
        
       
        mysql_connect('localhost','root','manikantsingh54@gmail.com');
        mysql_select_db($friend);
        
       
        
        
        $query = "INSERT INTO `friend_list` (`id`, `first_name`, `last_name`, `username`, `country`, `zip`, `dob`, `email`) VALUES ('','$first_name','$last_name','$username','$country','$zip','$dob','$email')";
        
        if(mysql_query($query)==true){
            
            echo 'friend request accepted';
            
        }
        else{
            
           echo mysql_error();
        }
        
        
        
        
        
        
        
        
        

    }
}else{
    
    header('Location: ../index.php');
}



?>