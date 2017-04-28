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
include $_SERVER['DOCUMENT_ROOT']."/core/frontend/ui.php";
include $_SERVER['DOCUMENT_ROOT']."/core/backend/pagecontent.php";
?>

<script>
var pagename = 'rovers';
savePageCookie();
</script>

<div class="parallax-container">
	<div class="parallax"><img style="width=100%" src=<?php displayBackground()?>></div>
</div>

<div class="section white">
	<div class="row container">
		<div class="editable">
			<?php
				if ($userPermission >= 20) echo getContent("rovers");
				else echo "Sorry you don't have permission to see this";
				?>
		</div>
		<?php if ($userPermission >= 50) {
		echo "<div class=\"card-action\">
		<a onclick=\"edit();\" class=\"editbutton\">Edit</a>
				</div>";
		}
		?>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img style="width=100%" src=<?php displayBackground()?>></div>
</div>
</main>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/footer.php";