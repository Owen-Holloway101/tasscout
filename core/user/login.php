<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

if (!isset($_COOKIE["session"])) {
	if (userExists($_POST['user_name'])) {
		if(checkSalt($_POST['user_name'],$_POST['password'])) {
			setSession($_POST['user_name'], generateSessionID());
			message_return("Success","Logged in as ".$_POST['user_name']);
		} else {
			message_return("Error","user does not exist or pass incorrect 1");
		}
	} else {
		message_return("Error","user does not exist or pass incorrect 2");
	}
} else {
	message_return("Error","already logged in as ". $userName);
}

function message_return($title,$message) {
    setcookie("message_title",rawurlencode($title),time()+36000,"/");
	setcookie("message",rawurlencode($message),time()+36000,"/");
	$url = "/".$_COOKIE["lastpage"];
	header("Location: $url");
}

?>