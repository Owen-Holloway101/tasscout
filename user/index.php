<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}
?>
<body onload="settingload()">
<main>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/ui.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
?>

<script type="text/javascript">
function settingload() {
	<?php
	if (getSetting("joeys")) {
	echo "$(\"#joeys\").prop(\"checked\", true);";
	}
	if (getSetting("cubs")) {
	echo "$(\"#cubs\").prop(\"checked\", true);";
	}
	if (getSetting("scouts")) {
	echo "$(\"#scouts\").prop(\"checked\", true);";
	}
	if (getSetting("venturers")) {
	echo "$(\"#venturers\").prop(\"checked\", true);";
	}
	if (getSetting("rovers")) {
	echo "$(\"#rovers\").prop(\"checked\", true);";
	}

	if (getSetting("calendar")) {
	echo "$(\"#calendar\").prop(\"checked\", true);";
	}
	if (getSetting("hall_hire")) {
	echo "$(\"#hall_hire\").prop(\"checked\", true);";
	}
	if (getSetting("resources")) {
	echo "$(\"#resources\").prop(\"checked\", true);";
	}
	if (getSetting("parentsarea")) {
	echo "$(\"#parentsarea\").prop(\"checked\", true);";
	}
	?>
}
</script>

<div class="parallax-container">
	<div class="parallax"><img src="/assets/settingsbackdrop.jpeg"></div>
</div>

<div class="section white">
	<div class="row container">
	</div>
</div>

<div class="parallax-container">
<div class="parallax"><img src="/assets/settingsbackdrop.jpeg"></div>
</div>
</main>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/footer.php";
?>