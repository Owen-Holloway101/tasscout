<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/corefunctions.php";
if (!isset($_COOKIE["session"])) {
	if (userExists($_POST['username'])) {
		if(checkSalt($_POST['username'],$_POST['password'])) {
			setSession($_POST['username'], generateSessionID());
			messageHandle("Logged in as ".$_POST['username']);
		} else {
			errorHandle("user does not exist or pass incorrect");
		}
	} else {
		errorHandle("user does not exist or pass incorrect");
	}
} else {
	errorHandle("already logged in as ". $userName);
}
?>