<?php
/*
Gets the session ID (from cookie) and checks it against the database for a username
*/

function getSetting($setting) {

	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	$query = "SELECT ".$setting." FROM settings";

	$settingbind = 0;

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($settingbind);

		/* fetch values */
		while ($stmt->fetch()) {
				$settingreturn = $settingbind;
	}

	/* close statement */
	$stmt->close();

	return $settingreturn;	
	}
}
?>