<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

if (getSetting("calendar")) {
	echo "<li><a href=\"/calendar/\">Calendar</a></li>";
}
if ($userPermission >= 50) {
	echo "<li><a href=\"/settings/\">Settings</a></li>";
}
?>