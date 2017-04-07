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
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/styles.php";
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/nav.php";
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/scripts.php";
?>
<script>
<?php
if(!isMobile()) {
} else {
	echo "$(\"#logo-container\").text(\"Settings\");";
}
?>

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
<div class="row">
    <div class="col s12 l8 push-l2">
        <div class="card">
			<div class="card-content">
				<form action="/core/backend/updatesettings.php" onkeypress="" id="updatesettings" method="post">
					<h5>Group Name</h5>
					<div class="input-field col s12">
						<input value='<?php echo getSetting("groupname");?>' name="groupname" id="groupname" type="text" class="validate">
					</div>
					<h5>Available Sections</h5>
					<p>
					<input type="checkbox" class="filled-in" name="joeys" id="joeys" />
					<label for="joeys">Joeys</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="cubs" id="cubs" />
					<label for="cubs">Cubs</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="scouts" id="scouts" />
					<label for="scouts">Scouts</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="venturers" id="venturers" />
					<label for="venturers">Venturers</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="rovers" id="rovers" />
					<label for="rovers">Rovers</label>
					</p>
					<h5>Extra Pages</h5>
					<p>
					<input type="checkbox" class="filled-in" name="calendar" id="calendar" />
					<label for="calendar">Calendar</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="hall_hire" id="hall_hire" />
					<label for="hall_hire">Hall Hire</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="resources" id="resources" />
					<label for="resources">Resources</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="parentsarea" id="parentsarea" />
					<label for="parentsarea">Parents Area</label>
					</p>
					<br>
					<button class="btn waves-effect waves-light" type="submit" name="action" onclick="document.getElementById('updatesettings').submit();">Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
</main>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/footer.php";
?>
</body>