<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

deleteSession($_COOKIE["session"]);
setcookie("session","loggedout",time()-120000,"/");
message_return("Success","Logged out ". $userName);

function message_return($title,$message) {
    setcookie("message_title",rawurlencode($title),time()+36000,"/");
	setcookie("message",rawurlencode($message),time()+36000,"/");
	$url = "/".$_COOKIE["lastpage"];
	header("Location: $url");
}
?>