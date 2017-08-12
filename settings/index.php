<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}
?>
<body onload="" background="/assets/settingsbackdrop.jpeg">
<main>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/ui.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
?>

<div class="row">
	<div class="col s12 l8 push-l2">
		<div class="card">
			<div class="card-content">
				<form action="/core/backend/updatesettings.php" onkeypress="" id="updatesettings" method="post">
					<h5>Group Name</h5>
					<div class="input-field col s12">
						<input value='<?php echo getSetting("groupname");?>' name="groupname" id="groupname" type="text" class="validate">
					</div>
					<h5>Pages</h5>
					<p>
					<input type="checkbox" class="filled-in" name="shows" id="shows" />
					<label for="shows">Shows</label>
					</p>
					<p>
					<input type="checkbox" class="filled-in" name="news" id="news" />
					<label for="news">News</label>
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

<script type="text/javascript">

window.onload = settingload();

function settingload() {
	<?php
	if (getSetting("shows")) {
	echo "$(\"#shows\").prop(\"checked\", true);";
	}
	if (getSetting("news")) {
	echo "$(\"#news\").prop(\"checked\", true);";
	}
	if (getSetting("parentsarea")) {
	echo "$(\"#parentsarea\").prop(\"checked\", true);";
	}
	?>
}
</script>

<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/uicomponents/footer.php";
?>