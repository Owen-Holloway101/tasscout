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
var pagename = 'joeys'
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
$(".nav-wrapper").addClass("joey-brown");

<?php
if(!isMobile()) {
	echo "$(\"#logo-container\").append(\" - Joeys\");";
} else {
	echo "$(\"#logo-container\").text(\"Joeys\");";
}
?>

</script>

<div class="row">
    <div class="col m8 offset-m2">
        <div class="card">
			<div class="card-content">
				<div class="editable">
				<?php
				echo getContent("joeys");
				?>
				</div>
			</div>
			<div class="card-action">
				<a onclick="edit();" class="editbutton">Edit</a>
        	</div>
		</div>
	</div>
</div>

</body>