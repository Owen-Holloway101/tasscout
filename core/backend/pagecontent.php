
<?php
/*
Gets some content from the database for a specific page 
*/

function getContent($pageName) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$query = "SELECT page, content FROM pagecontent";

	$pagecontent = "null";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($pageNameDB, $contentDB);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($pageNameDB == $pageName) {
				$pagecontent = $contentDB;
		}
	}

	/* close statement */
	$stmt->close();

	return $pagecontent;	
	}
}

/*
Update a pages content inserting some html into the database
*/

function updateContent($pageName, $content) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";


	$stmt = $db->prepare("UPDATE pagecontent SET content=? WHERE page=?");
	echo $db->error;
	$stmt->bind_param("ss",$content,$pageName);
	
	$stmt->execute();

	$stmt->close();

}
?>