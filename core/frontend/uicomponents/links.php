<li><a href="/">Home</a></li>

<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

if (getSetting("shows")) {
	echo "<li><a href=\"/shows/\">Shows</a></li>";
}

if (getSetting("news")) {
	echo "<li><a href=\"/news/\">News</a></li>";
}

if (getSetting("parentsarea") && $userPermission >= 20) {
	echo "<li><a href=\"/parentsarea/\">Parents</a></li>";
}
?>