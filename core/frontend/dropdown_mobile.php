<?php
if (getSetting("joeys")) {
	echo "<li class=\"joey-brown\"><a href=\"/joeys/\">Joeys (6-8)</a></li>
	<li class=\"divider\"></li>";
}
?>
<?php
if (getSetting("cubs")) {
	echo "<li class=\"cub-yellow\"><a href=\"/cubs/\">Cubs (7&frac12; - 11)</a></li>
<li class=\"divider\"></li>";
}
?>
<?php
if (getSetting("scouts")) {
	echo "<li class=\"scout-green\"><a href=\"/scouts/\">Scouts (10&frac12; - 15)</a></li>
<li class=\"divider\"></li>";
}
?>
<?php
if (getSetting("venturers")) {
	echo "<li class=\"venturer-maroon\"><a href=\"/venturers/\">Venturers (14&frac12; - 18)</a></li>
<li class=\"divider\"></li>";
}
?>
<?php
if (getSetting("rovers")) {
	echo "<li class=\"rover-red\"><a href=\"/rovers/\">Rovers (18 - 26)</a></li>
<li class=\"divider\"></li>";
}
?>