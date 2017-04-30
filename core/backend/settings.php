<?php
/*
Gets the setting from the server as return its value
*/

function getSetting($settingName) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$query = "SELECT setting, value FROM settings";

	$value = "null";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($settingNameDB, $valueDB);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($settingNameDB == $settingName) {
				$value = $valueDB;
		}
	}

	/* close statement */
	$stmt->close();

	return $value;
	}
}

/*
Update a setting inserting some html into the database
*/

function updateSetting($setting, $value) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";


	$stmt = $db->prepare("UPDATE settings SET value=? WHERE setting=?");
	echo $db->error;
	$stmt->bind_param("ss",$value,$setting);
	
	$stmt->execute();

	$stmt->close();

}
?>