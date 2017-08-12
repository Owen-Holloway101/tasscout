
<?php
/*
Gets some content from the database for a specific page 
*/

function getContent($pageName) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$query = "SELECT page, content FROM PAGECONTENT";

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
	
	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";


	$stmt = $db->prepare("UPDATE PAGECONTENT SET content=? WHERE page=?");
	echo $db->error;
	$stmt->bind_param("ss",$content,$pageName);
	
	$stmt->execute();

	$stmt->close();

}
?>