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
include $_SERVER['DOCUMENT_ROOT']."/core/styles.php";
include $_SERVER['DOCUMENT_ROOT']."/core/nav.php";
include $_SERVER['DOCUMENT_ROOT']."/core/scripts.php";
?>
<div class="section white">
	<div class="row container">
		<div class="editable">
		<h2 class="header">Wellington Rover Crew</h2>
		<p class="grey-text text-darken-3 lighten-3">
			Welcome to the Wellington Rover Crew home page.<br>
			<br>
			Wellington Rovers are one of the two Rover Crews located in the Wellington District in Southern Tasmania. We are situated down at the 10th Hobart Scout Hall on the Marieville Esplanade, Battery Point backing on to the Derwent Estuary (near the playground).
			<br>
			<br>
			We currently meet every Thursday between 8pm and 10pm although we do occasionally go over this timeframe. Our program is active with various activities to situate all Rovers and newcomers. 
			<br>
			<br>
			What we do: ANZAC Day, rockclimbing, cocktail parties, iceblocking, bushwalking, camping, rafting, movie nights, abseiling, poker and casino nights, pub nights, Clean Up Australia day, four wheel driving, salsa dancing, bike rides, cooking, campcraft, swimming, moots (state, national and international Rover gatherings), costume parties, beach walks ...... whatever you want really, if you want to do, then we can do it...to a certain degree, that is.
			<br>
		</p>
		</div>
		<a onclick="edit();" class="waves-effect waves-light btn">Edit</a>
	</div>
</div>

</body>