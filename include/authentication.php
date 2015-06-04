<?php
//this file will contain functions pertaining to user authentication

/*function isUserAdmin() {
	if (isset($_SESSION["admin_user"]))
		return ($_SESSION["admin_user"] == ADMIN_USER);
	else
		return false;
}*/

function isUserAdmin() {
	require_once("include/users.php");
	//require_once("include/ez_sql.php");
	global $db;
	$retval = false;
	$users = new users($db);
	
	if (getCurrentUserID() != 0){
		
		$user = $users->getuser(getCurrentUserID());		
		if ($user->isAdmin == 1 )
			$retval = true;
	}
	return $retval;
}

function isLoggedIn() {
	require_once("include/users.php");
	//require_once("include/ez_sql.php");
	global $db;
	$retval = false;
	$users = new users($db);
	
	if (getCurrentUserID() != 0){
			$retval = true;
	}
	return $retval;
}

function LogIn($username,$password){
	require_once("include/ez_sql.php");
	require_once("include/users.php");
	global $db;
	$retval = false;
	$password = md5($password);
	$users = new users($db);
	$user = $users->getuserbyusername($username);
	
	if ($user != null){
		if ($user->Password == null)
			$retval = true;
		else{
			if ($user->Password == $password){
				$retval = true;
			}
			else
				$retval = false;		
		}			
	}
	if ($retval) 
		$_SESSION["userloginid"] = $user->UserID;
	
	return $retval;
}

function LogOut(){
	$_SESSION["userloginid"] = null;
	session_destroy();

}

function getCurrentUserID(){
	$retval = 0;
	if (isset($_SESSION["userloginid"]))
		$retval = $_SESSION["userloginid"];
		
	return $retval;
	
}

?>