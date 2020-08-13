 <style>
    .menu_top_c {
   
    border: none;
    display: inline;
    background: #5583eb;
    height: 30px;
    width:auto;
    color: #ffffff;
    text-align: center;
        margin-top:10px;
    border-radius: 5px;
  	-webkit-transition: all 0.15s linear;
	  -moz-transition: all 0.15s linear;
	  transition: all 0.15s linear;
}

    
    </style>

<?php 

include '../signin_session.inc.php';

if(loggedin()){
    
    mysql_connect('localhost','root','manikantsingh54@gmail.com');
    $username = $_SESSION['user_name'];
    mysql_select_db($username);
    
    $query = "SELECT `id`, `comment`, `comment_time` FROM `status_wall` ORDER BY `comment_time` DESC";
    
    if($query_run = mysql_query($query)){
        if(mysql_num_rows($query_run)==NULL){
            echo 'No status yet';
        }else{
            
            while($end_result=mysql_fetch_assoc($query_run)){
                          
                      ?> <pre><?php  echo '<img src="Get_other_pic.php?search_text='.$username.'" height="30px;" width="30px;"></img>';
                        
                          echo '&nbsp                         updated on: '.$id = $end_result['comment_time'];
                          
echo '<br>'.'<br>'.'<strong>'.$id = $end_result['comment'].'</strong>'.'<hr>';?><button type="button" class="menu_top_c" href="http://localhost/ManiRoom/hand_made_js/stat_del_pro.php?id=<?php echo $end_result['id']; ?>">DELETE STATUS</button>
</pre><?php

                      }
        }
    }
    
}else{
    
    header('Location: ../index.php');
    
}


?>
<script type="text/javascript" src="hand_made_js/stat_del_pro.js"></script>