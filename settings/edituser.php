<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
} 
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";
if($userPermission < 80) {
	header("Location: /");
	die();
}
?>