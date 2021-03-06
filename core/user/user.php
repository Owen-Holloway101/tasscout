<?php
//Owen Holloway 2016
//@Zeryter

/*
How many users currently exist in the system
*/

function getNoUsers() {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$query = "SELECT COUNT(*) FROM USERS";

	$users = "0";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($returnusers);

		/* fetch values */
		while ($stmt->fetch()) {
			$users = $returnusers;
		}
		/* close statement */
		$stmt->close();

	return $users;	
	}
}

/*
Return all the user names
*/

function getAllUsers() {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$query = "SELECT UNAME, PERMISSION FROM USERS";

	$users = array();
	$userNo = 1;

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($username,$permission);

		/* fetch values */
		while ($stmt->fetch()) {
			$users[$userNo][0] = $username;
			$users[$userNo][1] = $permission;
			$userNo++;
		}
		/* close statement */
		$stmt->close();

	return $users;	
	}
}

/*
Gets the session ID (from cookie) and checks it against the database for a username
*/

function getUserName($sessionID) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$query = "SELECT ID, USER FROM SESSION";

	$uname = "null";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($sessionFromDB, $uname);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($sessionFromDB == $sessionID) {
				$user = $uname;
		}
	}

	/* close statement */
	$stmt->close();

	return $user;	
	}
}

/*
Checks the logged in users permission level and logs them in
*/

function getUserPermission($user) {

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$userPermission = 0;

	$query = "SELECT UNAME, PERMISSION FROM USERS";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($uname, $permissionFromDB);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($uname == $user) {
				$userPermission = $permissionFromDB;
			}				
		}
	/* close statement */
	$stmt->close();
	
	}

	return $userPermission;

}

/*
Checks if user exists
*/

function userExists($user) {

	//This is a check for if the user exists, 
	//we don't want 2 users getting inserted with the same name, and is an easy first stage check for login

	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$userExists = False;

	$query = "SELECT UNAME, SPASS FROM USERS";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($uname, $spass);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($uname == $user) {
				$userExists = True;
			}
		}

		/* close statement */
		$stmt->close();

		return $userExists;	
	}
}

/*
If the salt is correct the user has provided the correct password
*/

function checkSalt($user, $pass) {

	//This checks if the user has provided the correct passwor
	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	$sPassFound = False;
	$passAccepted = False;
	$sPassword = "null";

	$query = "SELECT UNAME, SPASS FROM USERS";
	
	if ($stmt = $db->prepare($query)) {
		
		/* execute statement */
		$stmt->execute();
		
		/* bind result variables */
		$stmt->bind_result($uname, $spass);
		
		/* fetch values */
		while ($stmt->fetch()) {
			if ($uname == $user) {
				
				$sPassword = $spass;
				$sPassFound = True;
			}
		}
		
		$stmt->close();
		
		if ($sPassFound) {
			$options = array('cost' => 11);

			if (password_verify($pass, $sPassword)) {
				return True;
			} else {
			    return False;
			}
		} else {
			return False;
		}
	}
}

/*
Inserts a new user into the DB complete with hashed password
*/

function insertNewUser($user, $pass) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/lib/password_compat.php';

	$options = array('cost' => 11);
	$passHash = password_hash($pass, PASSWORD_BCRYPT, $options);

	$stmt = $db->prepare("INSERT INTO `USERS` (`UNAME`, `SPASS`) VALUES (?, ?)");

	$stmt->bind_param("ss",$user,$passHash);

	$stmt->execute();

	$stmt->close();

}

/*
changes a users password
*/

function updateUserPass($user, $pass) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/backend/db.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/lib/password_compat.php';

	$options = array('cost' => 11);
	$passHash = password_hash($pass, PASSWORD_BCRYPT, $options);

	var_dump($passHash);
	var_dump($user);

	$stmt = $db->prepare("UPDATE USERS SET SPASS=? WHERE UNAME=?");
	echo $db->error;
	$stmt->bind_param("ss",$passHash,$user);
	
	$stmt->execute();

	$stmt->close();

}
?>