<li><a href="/">Home</a></li>

<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
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

if (getSetting("parentsarea") && $userPermission >= 20) {
	echo "<li><a href=\"/parentsarea/\">Parents</a></li>";
}
?>