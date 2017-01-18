<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

if (getSetting("calendar")) {
	echo "<li><a href=\"/calendar/\">Calendar</a></li>";
}
if (getSetting("hall_hire")) {
	echo "<li><a href=\"/hallhire/\">Hall Hire</a></li>";
}
if (getSetting("resources")) {
	echo "<li><a href=\"/resources/\">Resources</a></li>";
}

if (getSetting("roversarea") && $userPermission >= 20) {
	echo "<li><a href=\"/roversarea/\">Private</a></li>";
}

if ($userPermission >= 50) {
	echo "<li><a href=\"/settings/\">Settings</a></li>";
}

?>