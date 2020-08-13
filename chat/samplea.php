<?php
session_start();
$_SESSION['username'] = "johndoe" // Must be already set
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

<html>
<head>

<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
</style>

<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<div id="main_container">

        
        
        <?php 

if(loggedin()){
        mysql_connect("localhost","root","");
        mysql_select_db("bucky_chat");

            $query = "SELECT username FROM users WHERE username !='$username'";
        if($mysql_run=mysql_query($query)){
            if(mysql_num_rows($mysql_run)==NULL){
                echo 'no users yet';
                
            }else{
                
                while($mysql_row=mysql_fetch_assoc($mysql_run)){
                    

                    $users =$mysql_row['username'];
                    
                            
                  ?><br/><a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $users; ?>')"><?php echo $users; ?></a><br/>
                   
                    <?php
                    
                }
            }
            
        }


}
        ?>
  </div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

</body>
</html>