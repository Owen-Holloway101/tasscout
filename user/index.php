<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
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
			<table>
				<thead>
					<tr>
						<th>User Name</th>
						<th>Permission</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					
					<?php
					$users = getAllUsers();
					for ($usercount; $usercount < getNoUsers(); $usercount++) {
						echo "<tr>";
						echo "<td>".$users[$usercount+1][0]."</td>";
						echo "<td>".$users[$usercount+1][1]."</td>";
						echo "<td><a class=\"btn-floating\"><i class=\"material-icons\">edit</i></a></td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

</main>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/footer.php";
?>

