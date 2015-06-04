<?php
	require_once("include/web.config.php");
	require_once("include/ez_sql.php");


	function create_db($name){

		$sql = "CREATE DATABASE  `$name`";
		return mysql_query($sql);

	}

	function create_tbl($name, $field_name = 'id', $fields){

		$sql = "CREATE TABLE  `$name` (
		`$field_name` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , $fields)";

		return mysql_query($sql);

	}

	function db_insert($tbl, $data){

		$fields = array();
		$value = array();

		foreach($data as $field_name => $v):

			$fields[] = "`$field_name`";
			$value[] = "'".htmlentities($v, ENT_QUOTES)."'";

		endforeach;

		$sql = "INSERT INTO `$tbl` (".implode(',',$fields).") VALUES (".implode(',',$value).")";
		return mysql_query($sql);

	}

	function insert_id(){
		return mysql_insert_id();
	}

	function db_update($tbl, $data, $field_name, $value, $ext_sql = ""){

		$set = array();

		foreach($data as $fname => $v):

			$set[] = "`$fname` = '".htmlentities($v, ENT_QUOTES)."'";

		endforeach;

		$sql = "UPDATE `$tbl` SET ".implode(',',$set)." WHERE $field_name = $value ".$ext_sql;
		// echo $sql;
		return mysql_query($sql);

	}

	function db_select($tbl, $fields = '*', $ext_sql = "", $single = false){

		$sql = "SELECT $fields FROM $tbl ".$ext_sql;
		if(!$single):
			return mysql_query($sql);
		else:
			$qry = mysql_query($sql);
			if(!$qry) die(mysql_error().' '.$sql);
			return mysql_fetch_object($qry);
		endif;

	}

	function db_num_rows($qry){
		return mysql_num_rows($qry);
	}

	function db_delete_row($tbl, $field_name = 'id', $value){

		$sql = "DELETE FROM `$tbl` WHERE `$field_name` = $value";
		return mysql_query($sql);

	}

	// Not Related to DB function..
	function redirect($url = 'index.php'){
		header("location: $url"); die();
	}


	// Alert Functions
	function alerts(){
		if(isset($_SESSION['err'])):
			$msg = $_SESSION['err'];
			unset($_SESSION['err']);
			echo '<div class="alert alert-error center">'.$msg.'</div>';

		elseif(isset($_SESSION['msg'])):
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
			echo '<div class="alert alert-success center">'.$msg.'</div>';
			
		endif;
	}

	// Test Empty Function...
	function test_empty($reqs, $data){
		foreach($reqs as $req):
			$v = trim($data[$req]);
			if(empty($v) && $v != "0"):
				return '<b>'.ucfirst($req).'</b> field must not be empty!';
				break;
			endif;
		endforeach;

		return false;
	}