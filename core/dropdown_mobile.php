<li class="no-padding">
	<ul class="collapsible collapsible-accordion">
		<li>
			<a class="collapsible-header">Sections<i class="mdi-navigation-arrow-drop-down"></i></a>
			<div class="collapsible-body">
				<ul class="">
					<?php
					if (getSetting("joeys")) {
						echo "<li class=\"joey-brown\"><a class=\"white\" href=\"/joeys/\">Joeys (6-8)</a></li>
						<li class=\"divider\"></li>";
					}
					?>
					<?php
					if (getSetting("cubs")) {
						echo "<li class=\"cub-yellow\"><a class=\"white\" href=\"/cubs/\">Cubs (7&frac12; - 11)</a></li>
					<li class=\"divider\"></li>";
					}
					?>
					<?php
					if (getSetting("scouts")) {
						echo "<li class=\"scout-green\"><a class=\"white\" href=\"/scouts/\">Scouts (10&frac12; - 15)</a></li>
					<li class=\"divider\"></li>";
					}
					?>
					<?php
					if (getSetting("venturers")) {
						echo "<li class=\"venturer-maroon\"><a class=\"white\" href=\"/venturers/\">Venturers (14&frac12; - 18)</a></li>
					<li class=\"divider\"></li>";
					}
					?>
					<?php
					if (getSetting("rovers")) {
						echo "<li class=\"rover-red\"><a class=\"white\" href=\"/rovers/\">Rovers (18 - 26)</a></li>
					<li class=\"divider\"></li>";
					}
					?>
				</ul>
			</div>
		</li>
	</ul>
</li>