<br/>
<?php

include '../signin_session.inc.php';

if(loggedin()){
    
    $username = $_SESSION['user_name'];
    

    
    mysql_connect('localhost','root','manikantsingh54@gmail.com');
    mysql_select_db($username);
    
    $query = "SELECT `first_name`, `last_name`, `username` FROM `friend_list` WHERE 1 ORDER BY `first_name`";
    
    if($query_run = mysql_query($query)){
        
        if(mysql_num_rows($query_run)==NULL){
            echo 'No Friends Yet !';
        }else{
            
            while($query_row = mysql_fetch_assoc($query_run)){
                ?><div><a style="font-size:12px; " class="frd" href="http://localhost/ManiRoom/hand_made_js/list_messages.php?search_text=<?php echo $query_row['username']; ?>"><?php
                echo '<img src="Get_other_pic.php?search_text='.$query_row['username'].'" height="20px;" width="20px;"></img>'.'&nbsp'.'&nbsp'.$query_row['first_name'].'&nbsp'.'&nbsp'.$query_row['last_name'].'<br>'.'<hr>';
    ?></a></div><?php
            }
        }
    
    }
    
    
}else{
    
    header('Location: ../index.php');
}


?>

<script type="text/javascript" src="http://localhost/ManiRoom/hand_made_js/list_message.js"></script>