<?php require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";?>

<ul id="user" class="dropdown-content">
  <?php
  if ($userPermission > 0) {
    echo "<li><a href=\"/core/user/logout.php\">Logout ".$userName."</a></li>";
  } else {
    echo "<li><a href=\"#loginmodal\">Login</a></li>";
  }
  if ($userPermission >= 50) {
	echo "<li><a href=\"/settings/\">Settings</a></li>";
  }
  ?>
</ul>