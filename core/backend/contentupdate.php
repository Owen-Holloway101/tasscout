<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/pagecontent.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

if ($userPermission >= 40) {
	updateContent($_POST['page'], $_POST['content']);
}
?>