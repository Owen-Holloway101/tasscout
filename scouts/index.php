<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}
?>
<main>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/styles.php";
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/nav.php";
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/scripts.php";
include $_SERVER['DOCUMENT_ROOT']."/core/backend/pagecontent.php";
?>

<script>
var pagename = 'scouts';
savePageCookie();
</script>

<script>
//Remove the grey background and change it to section colour
$(".nav-wrapper").removeClass("darken-3");
$(".nav-wrapper").removeClass("grey");
$(".nav-wrapper").addClass("scout-green");

<?php
if(!isMobile()) {
	echo "$(\"#logo-container\").append(\" - Scouts\");";
} else {
	echo "$(\"#logo-container\").text(\"Scouts\");";
}
?>

</script>

<div class="row">
    <div class="col s12 l8 push-l2">
        <div class="card">
			<div class="card-content">
				<div class="editable">
				<?php
				echo getContent("scouts");
				?>
				</div>
			</div>
			<?php if ($userPermission >= 50) {
				echo "<div class=\"card-action\">
				<a onclick=\"edit();\" class=\"editbutton\">Edit</a>
        	</div>";
			}
			?>
		</div>
	</div>
</div>
</main>

<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/footer.php";
?>