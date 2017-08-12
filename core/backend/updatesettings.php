<?php
error_reporting(-1);
ini_set('display_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
if ($userPermission >= 80) {
	//Group Name Update
	updateSetting("groupname",$_POST['groupname']);
	//extra pages
	updateSetting("shows",isset($_POST['shows']));
	updateSetting("news",isset($_POST['news']));
	updateSetting("parentsarea",isset($_POST['parentsarea']));

	message_return("Settings Updated","The settings were updated");
} else {
	message_return("Not Allowed to do that","");
}

function message_return($title,$message) {
    setcookie("message_title",rawurlencode($title),time()+36000,"/");
	setcookie("message",rawurlencode($message),time()+36000,"/");
	$url = "/".$_COOKIE["lastpage"];
	header("Location: $url");
}
?>