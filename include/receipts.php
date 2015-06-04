<?php

//this is a controller class of all users
//
class receipts {

	var $db;
	
	//example usage: $p = new product($db);
	function receipts($db) {
		$this->db = $db;
	}
	
	//returns the latest/max record number
	function getmaxreceiptnum() {

		$sql = "SELECT MAX(RecordNumber) FROM tbl_receipt;";
		return $this->db->get_var($sql);
	}
	
	//returns a set of rows according to the record number
	function getmasterlist($from, $to) {

		$sql = "SELECT SUM(Quantity) AS TotalQuantity, Item FROM tbl_receipt_rows LEFT JOIN tbl_receipt ON (tbl_receipt_rows.RecordNumber = tbl_receipt.RecordNumber) WHERE tbl_receipt.is_not_master != 1 AND tbl_receipt_rows.Date BETWEEN '$from' AND '$to' GROUP BY Item DESC;";
		return $this->db->get_results($sql);
	}
	
	//returns a set of rows according to the record number
	function getreceiptsbyrecord($number) {

		$sql = "SELECT * FROM tbl_receipt_rows WHERE RecordNumber=$number ORDER BY RecordNumber DESC;";
		return $this->db->get_results($sql);
	}
	
	//returns a single row
	function getreceipt($number) {

		$sql = "SELECT * FROM tbl_receipt WHERE RecordNumber=$number;";
		return $this->db->get_row($sql);
	}
	
	//returns all rows according to customer name
	function getreceiptsbycustomername($customername) {
		$sql = "SELECT * FROM tbl_receipt_rows WHERE Customer='$customername'";
		return $this->db->get_results($sql);
	}
	
	//adds a transaction
	function add($number, $customer, $total_items, $grand_total, $status = 1, $is_not_master = 0) {
		$date = date("Y-m-d H:i:s");
		$sql  = "INSERT INTO tbl_receipt(RecordNumber, Customer, Total_Items, Grand_Total, Date, status, is_not_master) ";
		$sql .= "VALUES ('$number','$customer','$total_items','$grand_total','$date', $status, $is_not_master) ";
		$r = $this->db->query($sql);		
		if ($r) 
		   return $this->db->insert_id;
		else
		   return $r;		
	}
	
	//adds a transaction row
	function addRow($number, $customer, $address, $quantity, $unit, $item, $unitprice, $total) {
		$date = date("Y-m-d H:i:s");
		$sql  = "INSERT INTO tbl_receipt_rows(RecordNumber, Customer, Address, Quantity, Unit, Item, UnitPrice, Total, Date) ";
		$sql .= "VALUES ('$number','$customer','$address','$quantity','$unit','$item','$unitprice','$total','$date') ";
		$r = $this->db->query($sql);		
		if ($r) 
		   return $this->db->insert_id;
		else
		   return $r;		
	}
	
	// edits a transaction row
	function update($id, $number, $customer, $quantity, $unit, $item, $unitprice, $total) {
		$sql  = "UPDATE tbl_receipt_rows SET ";
		$sql .= "RecordNumber = $number, ";		
		$sql .= "Customer = '$customer', ";		
		$sql .= "Address = '$address', ";		
		$sql .= "Quantity = $quantity, ";		
		$sql .= "Unit = '$unit', ";		
		$sql .= "Item = '$item', ";		
		$sql .= "UnitPrice = $unitprice, ";		
		$sql .= "Total = $total, ";		
		$sql .= "Date = $date ";		
		$sql .= "WHERE RecordID = $id";
		return $this->db->query($sql);		
		
	}
	
	function delete($id){
		$sql = "DELETE FROM tbl_receipt_rows WHERE RecordID=$id";
		return $this->db->query($sql);
	}
	
	function getAll(){
		$sql = "SELECT * from tbl_receipt_rows;";
		return $this->db->get_results($sql);
	
	}
}
?>