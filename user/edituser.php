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

<body background="/assets/settingsbackdrop.jpeg">
<main>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/ui.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/core/user/users.php";
?>

<div class="row">
	<div class="col s12 l8 push-l2">
		<div class="card">
			<div class="card-content">
				<form action="/core/backend/updatesettings.php" onkeypress="" id="updatesettings" method="post">
					<h4>Edit User Settings</h4>
					<div class="input-field col s12">
						<input disabled value='username' name="username" id="username" type="text" class="validate">
						<label for="username">Username</label>
					</div>
						<label>Permission Level</label>
						<select class="browser-default">
							<option value="" disabled selected>Choose your option</option>
							<option value="0">Banned</option>
							<option value="0">Temp Banned</option>
							<option value="10">Default</option>
							<option value="20">Parent</option>
							<option value="30">Rover</option>
							<option value="40">Youth Helper</option>
							<option value="50">Assistant Leader</option>
							<option value="61">Joey Leader</option>
							<option value="62">Cub Leader</option>
							<option value="63">Scout Leader</option>
							<option value="64">Ventuter Leader</option>
							<option value="65">Rover Crew Leader</option>
							<option value="70">Leader in Charge</option>
							<option value="71">Rover Advisor</option>
							<option value="80">Admin</option>
							<option value="90">Developer</option>
							<option value="100">Branch</option>
						</select>
				</form>
			</div>
		</div>
	</div>
</div>

</main>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/footer.php";
?>