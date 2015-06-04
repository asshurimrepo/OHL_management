<?php

//this is a controller class of all users
//
class customers {

	var $db;
	
	//example usage: $p = new product($db);
	function customers($db) {
		$this->db = $db;
	}
	
	//returns an ordered list of users
	function customerlist($pagenum=0,$pagesize=3) {
		$sql = "SELECT * FROM customers order by CustomerID DESC" ;
		if ($pagenum > 0) {
			$pagenum = ($pagenum-1) * $pagesize;
			$sql .= " LIMIT $pagenum,$pagesize ";
		}
		return $this->db->get_results($sql);
	}
	
	//returns a single row
	function getcustomer($id) {

		$sql = "SELECT * FROM customers WHERE CustomerID=$id;";
		return $this->db->get_row($sql);
	}
	
	function getcustomerbyname($customername) {
		$sql = "SELECT * FROM customers WHERE Name='$customername'";
		return $this->db->get_row($sql);
	}
	
	//adds user
	function add($name, $address, $contact) {
		$sql  = "INSERT INTO customers(Name, Address, Contact) ";
		$sql .= "VALUES ('$name','$address','$contact') ";
		$r = $this->db->query($sql);		
		if ($r) 
		   return $this->db->insert_id;
		else
		   return $r;		
	}
	
	// edit user
	function update($id, $customername) {
		$sql  = "UPDATE customers SET ";
		$sql .= "CustomerName = '$customername' ";		
		$sql .= "WHERE CustomerID = $id";
		return $this->db->query($sql);		
		
	}
	
	function delete($id){
		$sql = "DELETE FROM customers WHERE CustomerID=$id";
		return $this->db->query($sql);
	}
	
	function getAll(){
		$sql = "SELECT * from customers;";
		return $this->db->get_results($sql);
	
	}
}
?>