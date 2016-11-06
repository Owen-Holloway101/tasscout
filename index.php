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
var pagename = 'index'
</script>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/styles.php";
include $_SERVER['DOCUMENT_ROOT']."/core/nav.php";
include $_SERVER['DOCUMENT_ROOT']."/core/scripts.php";
include $_SERVER['DOCUMENT_ROOT']."/core/pagecontent.php";
?>

<div class="row">
    <div class="col m8 offset-m2">
        <div class="card">
			<div class="card-content">
				<div class="editable">
				<?php
				echo getContent("index");
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