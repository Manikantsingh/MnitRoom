<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];


function loggedin(){
	if(isset($_SESSION['user_name'])&& !empty($_SESSION['user_name'])){
		return true;
		}
		else{
		return false;
		}
}
?>