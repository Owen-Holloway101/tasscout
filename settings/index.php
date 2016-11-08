<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}
?>
<body>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/styles.php";
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/nav.php";
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/scripts.php";
?>
<script>
<?php
if(!isMobile()) {
	echo "$(\"#logo-container\").append(\" - Settings\");";
}
?>
</script>
<div class="section white">
	<div class="row container">
		<div class="editable">
		</div>
		<a onclick="edit();" class="waves-effect waves-light btn editbutton">Edit</a>
	</div>
</div>
</body>