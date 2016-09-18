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

/*
Update a setting inserting some html into the database
*/

function updateSetting($setting, $value) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";


	$stmt = $db->prepare("UPDATE settings SET ".$setting."=?");
	echo $db->error;
	$stmt->bind_param("is",$value,$setting);
	
	$stmt->execute();

	$stmt->close();

}
?>