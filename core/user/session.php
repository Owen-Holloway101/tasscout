<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/user.php"; 

/*
destroy a session (security etc)
*/

function deleteSession($sessionID) {

	//Prepared statements make sure that we don't fail and have sql injection ...
	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";
	
	$stmt = $db->prepare("DELETE FROM `SESSION` WHERE ID=?");

	$stmt->bind_param("s",$sessionID);

	$stmt->execute();

	$stmt->close();

}

/*
A user needs a session to be able to use the site
*/

function setSession($user, $sessionID) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("INSERT INTO `SESSION` (USER, ID) VALUES (?,?)");

	$stmt->bind_param("ss",$user,$sessionID);

	$stmt->execute();

	$stmt->close();
	
	//session will expire 2 weeks from now (now being an aribitary value that means the time the user logs in)
	setcookie("session",$sessionID,time()+1209600,"/");

	//also check for any expired sessions
	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("DELETE FROM SESSION WHERE TIMESTAMPDIFF(HOUR,TIMECREATED,NOW())>336"); //this should check if the session was made more than 2 weeks ago

	$stmt->execute();

	$stmt->close();
}

/*
Makes a random string to be used as session id
*/

function generateSessionID() {
	$length = 32;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

//Check the session
if (isset($_COOKIE['session'])) {
	$userName = getUserName($_COOKIE["session"]);
	$userPermission = getUserPermission($userName);
} else {
	//In this case the user is not logged in
	$userName = "null";
	$userPermission = 0;
}
?>