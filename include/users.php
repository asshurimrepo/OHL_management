<?php

//this is a controller class of all users
//
class users {

	var $db;
	
	//example usage: $p = new product($db);
	function users($db) {
		$this->db = $db;
	}
	
	//returns an ordered list of users
	function userlist($pagenum=0,$pagesize=3) {
		$sql = "SELECT * FROM users order by UserID DESC" ;
		if ($pagenum > 0) {
			$pagenum = ($pagenum-1) * $pagesize;
			$sql .= " LIMIT $pagenum,$pagesize ";
		}
		return $this->db->get_results($sql);
	}
	
	//returns a single row
	function getuser($uid) {

		$sql = "SELECT * FROM users WHERE UserID=$uid;";
		return $this->db->get_row($sql);
	}
	
	function getuserbyusername($username) {
		$sql = "SELECT * FROM users WHERE Username='$username'";
		return $this->db->get_row($sql);
	}
	
	//adds user
	function add($username, $password) {
		if ($password != '') {
			$password = md5($password);
		}
		//$datecreated = date("Y-m-d H:i:s");
		//$datemodified = date("Y-m-d H:i:s");
		$sql  = "INSERT INTO users(Username, Password) ";
		$sql .= "VALUES ('$username','$password') ";
		$r = $this->db->query($sql);		
		if ($r) 
		   return $this->db->insert_id;
		else
		   return $r;		
	}
	
	//admin adds user
	function admin_add($username, $password, $isadmin) {
		if ($password != '') {
			$password = md5($password);
		}
		//$datecreated = date("Y-m-d H:i:s");
		//$datemodified = date("Y-m-d H:i:s");
		$sql  = "INSERT INTO users(Username, Password, isAdmin) ";
		$sql .= "VALUES ('$username','$password',$isadmin) ";
		$r = $this->db->query($sql);		
		if ($r) 
		   return $this->db->insert_id;
		else
		   return $r;		
	}
	
	//edit user
	/*function update($userid, $username, $npassword) {
		$datemodified = date("Y-m-d H:i:s");
		$sql  = "UPDATE users SET ";
		$sql .= "Username = '$username' ";		
		if ($password != '') {
			$password = md5($password);
			$sql .= "password = '$npassword', ";
		}
		$sql .= "WHERE UserID = $userid";
		return $this->db->query($sql);		
		
	}*/
	
	// edit user
	function update($userid, $username) {
		$sql  = "UPDATE users SET ";
		$sql .= "Username = '$username' ";		
		$sql .= "WHERE UserID = $userid";
		return $this->db->query($sql);		
		
	}
	
	//admin edits user
	/*function admin_update($userid, $username, $npassword, $isadmin) {
		$datemodified = date("Y-m-d H:i:s");
		$sql  = "UPDATE users SET ";
		$sql .= "Username = '$username' ";		
		if ($password != '') {
			$password = md5($password);
			$sql .= "password = '$npassword', ";
		}
		$sql .= "isAdmin = '$isadmin' ";		
		$sql .= "WHERE UserID = $userid";
		return $this->db->query($sql);		
		
	}*/
	
	function resetPassword($userid,$npassword){
		$npassword = md5($npassword);
		
		$sql = "UPDATE users SET ";
		$sql .= "password = '$npassword' ";
		$sql .= "WHERE UserID = $userid";
		
		return $this->db->query($sql);
	
	}

	function delete($userid){
		$sql = "DELETE FROM users WHERE userid=$userid";
		return $this->db->query($sql);
	}
	
	function getAll(){
		$sql = "SELECT * from users;";
		return $this->db->get_results($sql);
	
	}
}
?>