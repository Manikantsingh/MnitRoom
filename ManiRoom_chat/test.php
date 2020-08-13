<?php
require('../ManiRoom_chat/config.php');
?>
 <?php
$db = 'bucky_chat';

	if(mysql_connect('localhost', 'root', ''))
	{
		if(mysql_select_db($db))
			{
			echo 'connected to database<br>';
			}
		else{
			 echo mysql_error();
		}
	}
	else {
		 echo mysql_error();
	}
?>

<html>
    <head>
        
        <link href="css/chat-style.css" rel="stylesheet">

<script src="http://js.pusher.com/1.12/pusher.min.js" type="text/javascript"></script> 

<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>

<script src="js/jquery.pusherchat.js" type="text/javascript"></script>

        
        
        
    <script type="text/javascript" src="../js/development-bundle/ui/jquery.ui.core.js"></script>
        <link rel="stylesheet" href="../js/css/smoothness/jquery-ui-1.10.4.custom.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../js/js/jquery-ui-1.10.4.custom.js"></script>    
<link type="text/css" href="../jquery.ui.chatbox.css" rel="stylesheet" />
<script type="text/javascript" src="../Pusher-chat---jQuery-plugin-master/js/jquery.pusherchat.js"></script>
        
        
<script type="text/javascript" src="../jquery.ui.chatbox.js"></script>

    </head>
    
<body>
<p>
    
    
<a href="../ManiRoom_chat/logout.php">Logout <?php echo $_SESSION['user_logs']; ?></a>
</p>
<input type="hidden" id="username" value="<?php echo $_SESSION['user_logs']; ?>">
    
    
    
    <p>
	<label for="chatwith">Chat with:</label>
	<input type="text" name="chatwith" id="chatwith" list="otherusers">
    
	<datalist id="otherusers">
     
	<?php 
	   $current_user = $_SESSION['user_logs'];
    
$query = "SELECT username FROM users WHERE username != '$current_user'";
		if($query_run=mysql_query($query)){
					if(mysql_num_rows($query_run)==NULL){
						
						echo 'could not load... try again later';
					}else{
                while($mysql_row=mysql_fetch_assoc($query_run)){
				
				    ?><option >
                    <?php
							echo $name = $mysql_row['username'];
							?></option><?php
                
						}
						
				}
    }
                    
?>
	</datalist>
	</p>
	<input type="button" id="btn_chat" name="toggle" value="chat" />
    
    
    
    
    <div id="chat_div">
       
</div>
    
    
    <script type="text/javascript">
        
    $(function(1){
        $('#chat_div').hide();  setInterval(load_messages, 1000);

            var username = $.trim($('#username').val()); 
            var box = null;
       

        });
        
        
        
        $("#btn_chat").click(function(event, ui) {
		  
      if(box){
         box.chatbox("option", "boxManager").toggleBox();
       }else{
       
          box = $("#chat_div").chatbox({id: username, user:{key : username}, title : "chat", 
                                                messageSent : function(id, user, msg){
													
	 $.post('send_message.php', {'username': username, 'sendto' : $.trim($('#chatwith').val()), 'message' : msg});
													
          $("#chat_div").chatbox("option", "boxManager").addMsg(id, msg);
                                                }});
              }
          });
          });
          });
          });
        
        
                
function load_messages(){
	$('#chat_div').load('load_messages.php');
 }
        </script>
    
    
</body>
    
</html>





