
<!-- Dropdowns-->
<ul id="sections" class="dropdown-content">
  <?php
  if (getSetting("joeys")) {
    echo "<li class=\"joey-brown padded\"><a class=\"white\" href=\"/joeys/\">Joeys <br> (6-8)</a></li>
    <li class=\"divider\"></li>";
  }
  ?>
  <?php
  if (getSetting("cubs")) {
    echo "<li class=\"cub-yellow padded\"><a class=\"white\" href=\"/cubs/\">Cubs <br> (7&frac12; - 11)</a></li>
    <li class=\"divider\"></li>";
  }
  ?>
  <?php
  if (getSetting("scouts")) {
    echo "<li class=\"scout-green padded\"><a class=\"white\" href=\"/scouts/\">Scouts <br> (10&frac12; - 15)</a></li>
    <li class=\"divider\"></li>";
  }
  ?>
  <?php
  if (getSetting("venturers")) {
    echo "<li class=\"venturer-maroon darken-4 padded\"><a class=\"white\" href=\"/venturers/\">Venturers <br> (14&frac12; - 18)</a></li>
    <li class=\"divider\"></li>";
  }
  ?>
  <?php
  if (getSetting("rovers")) {
    echo "<li class=\"rover-red padded\"><a class=\"white\" href=\"/rovers/\">Rovers <br> (18 - 26)</a></li>
    <li class=\"divider\"></li>";
  }
  ?>
</ul>

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