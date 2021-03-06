<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/frontend/uicomponents/backdrops.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/frontend/scripts.php";
?>

<!--We use UTF-8 here-->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!--Love me some good jquery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script async type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script> 

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" media="none" onload="if(media!='all')media='all'">
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"></noscript>

<!--Text Editor-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<!--Good icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

<script src="/core/frontend/uicomponents/ui.js" defer></script>

<link rel="stylesheet" type="text/css" href="/core/frontend/uicomponents/global.css"/>

<nav>
	<div class="nav-wrapper scouts-aus-green">
		<a href="/" class="brand-logo" style="padding-left:10px;"><?php echo getSetting("groupname");?></a>
		<a href="#!" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<?php include $_SERVER['DOCUMENT_ROOT']."/core/frontend/uicomponents/links.php"; ?>
			<li><a class="dropdown-button" href="#!" data-activates="sections">Sections<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a class="dropdown-button" href="#!" data-activates="user"><?php 
			if ($userPermission <= 0) {
				echo "User";
			} else if ($userPermission > 0) {
				echo "Preferences";
			}
			?><i class="material-icons right">arrow_drop_down</i></a></li>
			<?php include $_SERVER['DOCUMENT_ROOT']."/core/frontend/uicomponents/dropdown.php"; ?>
		</ul>
		<ul class="side-nav" id="mobile">
			<?php include $_SERVER['DOCUMENT_ROOT']."/core/frontend/uicomponents/links.php"; ?>
			<li class="divider"></li>
			<?php include $_SERVER['DOCUMENT_ROOT']."/core/frontend/uicomponents/dropdown.mobile.php"; ?>
			<?php
            if ($userPermission > 0) {
                echo "<li><a href=\"/core/user/logout.php\">Logout ".$userName."</a></li>";
            } else {
                echo "<li><a href=\"#loginmodal\">Login</a></li>";
            }
            if ($userPermission >= 50) {
                echo "<li><a href=\"/settings/\">Page Setup</a></li>";
            }
            if ($userPermission >= 80) {
                echo "<li><a href=\"/user/\">User Settings</a></li>";
            }
            ?>
		</ul>
	</div>
</nav>

<?php require_once $_SERVER['DOCUMENT_ROOT']."/core/frontend/uicomponents/modals.php";?>