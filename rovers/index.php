<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}
?>
<body>
<script>
var pagename = 'rovers'
</script>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/styles.php";
include $_SERVER['DOCUMENT_ROOT']."/core/nav.php";
include $_SERVER['DOCUMENT_ROOT']."/core/scripts.php";
include $_SERVER['DOCUMENT_ROOT']."/core/pagecontent.php";
?>
<script>
//Remove the grey background and change it to section colour
$(".nav-wrapper").removeClass("darken-3");
$(".nav-wrapper").removeClass("grey");
$(".nav-wrapper").addClass("rover-red");

<?php
if(!isMobile()) {
	echo "$(\"#logo-container\").append(\" - Rovers\");";
}
?>

</script>

<div class="section white">
	<div class="row container">
		<div class="editable">
		<?php
		echo getContent("rovers");
		?>
		</div>
		<a onclick="edit();" class="waves-effect waves-light btn editbutton">Edit</a>
	</div>
</div>

</body>