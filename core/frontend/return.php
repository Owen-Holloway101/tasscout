<?php
if ($_COOKIE["error"] == 1) {
	setcookie("message_title","Error",time()+36000,"/");
	setcookie("message","It works",time()+36000,"/");
	$url = "/";
	setcookie("error","0",0,"/");
} else {
	setcookie("message_title","Message",time()+36000,"/");
	setcookie("message","It works",time()+36000,"/");
	$url = "/".$_COOKIE["lastpage"];
}
header("Location: $url");
?>