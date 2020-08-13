<style>
#other{
    
    background-color:#7eb3c6;
     direction:rtl;
    opacity:0.8;
    color:#000;
    max-width:600px;
    overflow:hidden;
    margin-bottom:10px;
    margin-right:0px;
    box-shadow:1px 1px 20px 3px #384a83;
    padding:5px 20px 5px 0px;
    border:1px solid #384a83;
    border-radius:50px 50px 50px 50px;
}
#self{
    max-width:600px;
    margin-left:0px;
   margin-bottom:10px;
     direction:ltr;
    opacity:0.8;
     padding:5px 0px 5px 20px;
    overflow:hidden;
    color:#000;
     box-shadow:1px 1px 20px 3px #455a4f;
    border-radius:50px 50px 50px 50px;
    border:1px solid #455a4f;
    background-color:#62b532;
        
    }
#both{
    background-color:#fff;
    margin-top:30px;
    font-family:sans-serif;
    font-size:15px;
    max-width:auto;
    padding:auto;
    display:block;
    
}
</style>

<script>
var auto_refresh = setInterval(
function ()
{
$('#both').load('http:/localhost/ManiRoom/hand_made_js/list_messages.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds


</script>





<?php

include '../signin_session.inc.php';

if(loggedin()){
    
    if(isset($_GET['search_text'])){
        if(!empty($_GET['search_text'])){
            
            $friend = $_GET['search_text'];
            $username = $_SESSION['user_name'];
            mysql_connect('localhost','root','manikantsingh54@gmail.com');
            mysql_select_db('bucky_chat');
            
            $query = "SELECT `from`, `to`, `message`, `sent` FROM `chat` WHERE (`from`='$username' AND `to`='$friend' ) OR (`from`='$friend' AND `to`='$username') ORDER by `sent` DESC";
            
            if($query_run= mysql_query($query)){
                if(mysql_num_rows($query_run)==NULL){
                    
                    echo 'No messages to show';
                }else{
                    
                    while($query_row=mysql_fetch_assoc($query_run)){
                        
                        $name = $query_row['from'];  ?>
                <div id="both">
                    
                    
                    <?php
                    
                        if($name == $username){
                            
                            ?><div id="self"><?php
                            
                            echo '<strong>'.$query_row['from'].'</strong>:>>>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            echo $query_row['message'].'<br>';
                           // echo '<br>'.$query_row['sent'];
                        
                            ?></div><?php
                        } else{
                          ?>
                    
                    <div id="other">
                <?php     
                            echo $query_row['message'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<<<:';
                            echo '<strong>'.$query_row['from'].'</strong><br>';
                           // echo '<br>'.$query_row['sent'];
                        
                        ?></div><?php
                        }
                    ?>
                    </div><?php
                        
                        
                    }
                }
                
            }else{
                
                die(mysql_error());
            }
            
            
        }
        
    }else{
        
        echo 'An error has occured  try later...';
    }
    
}else{
    
    header('Location: ../index.php');
}



?>