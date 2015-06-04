<?php 
	session_start();

	include 'include/db_func.php';

	if(function_exists($_GET['ref'])):
		$_GET['ref']();
	endif;

	// Customer Function Request
	function new_customer(){
		
		$empty = test_empty(array('Name', 'Address', 'Contact'), $_POST);
		if($empty): 
			$_SESSION['err'] = $empty; 
		else: 

			$qry = db_insert('customers', $_POST);
			$_qry = db_insert('_customers', $_POST);
			$_SESSION['msg'] = "New Customer Added Successfully!";

		endif;

		redirect('index.php#customers');
	}

	// Edit Customer
	function put_customer(){
		$id = $_GET['id'];

		$empty = test_empty(array('Name', 'Address', 'Contact'), $_POST);
		if($empty): 
			$_SESSION['err'] = $empty; 
		else: 

			$qry = db_update('customers', $_POST, 'CustomerID', $id);
			$_qry = db_update('_customers', $_POST, 'CustomerID', $id);
			$_SESSION['msg'] = "Customer Information Updated Successfully!";

		endif;

		redirect('index.php#customers');
	}

	// Removed Customer
	function destroy_customer(){
		$id = $_GET['id'];
		$qry = db_delete_row('customers', 'CustomerID', $id);
		$_SESSION['msg'] = "Customer Successfully Deleted!";
		redirect('index.php#customers');
	}

	// New Product
	function new_product(){
		$empty = test_empty(array('name'), $_POST);
		if($empty): 
			$_SESSION['err'] = $empty; 
		else: 

			$qry = db_insert('products', $_POST);
			$_qry = db_insert('_products', $_POST);
			$_SESSION['msg'] = "New Product Added Successfully!";

		endif;

		redirect('index.php#products');
	}

	//Put Product
	function put_product(){
		$id = $_GET['id'];

		$empty = test_empty(array('name'), $_POST);
		if($empty): 
			$_SESSION['err'] = $empty; 
		else: 
			$qry = db_update('products', $_POST, 'id', $id);
			$_qry = db_update('_products', $_POST, 'id', $id);
			$_SESSION['msg'] = "Product Information Updated Successfully!";

		endif;

		redirect('index.php#products');
	}

	//Destroy Product
	function destroy_products(){
		$id = $_GET['id'];
		$qry = db_delete_row('products', 'id', $id);
		$_SESSION['msg'] = "Product Successfully Deleted!";
		redirect('index.php#products');
	}


	// Ajax.. 
	function ajax_show_customer_result(){
		$key = $_POST['key'];
		$results = db_select("customers", '*', "WHERE Name LIKE '%$key%' LIMIT 10");
		$num = db_num_rows($results);

		if(trim($key)):

		if(!$num) echo 'No matching results for <b class="text-info">'.$key.'</b>';
		else
		include 'view/cdr/ajax_show_customer_results.php'; 		
		endif;

	}

	function ajax_show_product_result(){
		$key = $_POST['key'];
		$results = db_select("products", '*', "WHERE name LIKE '$key%' ORDER BY name ASC LIMIT 10");
		$num = db_num_rows($results);
		
		if(trim($key)):

		if(!$num) echo 'No matching results for <b class="text-info">'.$key.'</b>';
		else
			include 'view/cdr/ajax_show_product_results.php';
		endif;
	}

	// Process cdr_add_product_invoice
	function cdr_add_product_invoice(){
		if(!isset($_SESSION['cdr_products'])) $_SESSION['cdr_products'] = array();


		$customer = db_select('_customers', '*', 'WHERE CustomerID = '.$_POST['cust_id'], true);
		$_SESSION['customer'] = $customer;
		

		if(count($_SESSION['cdr_products']) < 10):
		$_POST['qty'] = doubleval($_POST['qty']);
		$_POST['total'] = doubleval($_POST['qty']*$_POST['price']);
		$_SESSION['cdr_products'][] = array('id'=>$_POST['id'], 'price'=>$_POST['price'], 'unit'=>$_POST['unit'], 'qty'=>$_POST['qty'], 'item' => $_POST['item'], 'total' => $_POST['total']);
		endif;

		include 'view/cdr/ajax_cdr_list.php';

	}

	// remove_cdr_item
	function remove_cdr_item(){
		unset($_SESSION['cdr_products'][$_POST['index']]);
		include 'view/cdr/ajax_cdr_list.php';
	}

	// edit_cdr_item
	function edit_cdr_item(){
		$index = $_GET['index'];
		$item = $_SESSION['cdr_products'][$index];
		include 'view/cdr/cdr_modal_form.php';
	}

	//Update CDR Item
	function update_cdr_item(){
		$index = $_POST['index'];
		$_SESSION['cdr_products'][$index] = array('qty'=>$_POST['qty'], 'item'=>$_POST['item'], 'price'=>$_POST['price'], 'unit'=>$_POST['unit'], 'total'=>$_POST['qty']*$_POST['price']);
		include 'view/cdr/ajax_cdr_list.php';
	}

	// Process Invoice
	function process_invoice(){
		db_insert('tbl_receipt', $_POST);
		$record_number = insert_id();
		$_SESSION['record_id'] = $record_number;

		if(!isset($_SESSION['master'])) $_SESSION['master'] = array();
		$_SESSION['master'][] =  $record_number;

		foreach ($_SESSION['cdr_products'] as $key => $prod) {
			db_insert('tbl_receipt_rows', array(
				'RecordNumber' => $record_number,
				'Quantity' => $prod['qty'],
				'Unit' => $prod['unit'],
				'Item' => $prod['item'],
				'UnitPrice' => $prod['price'],
				'Total' => $prod['total']
			));
		}

		unset($_SESSION['customer'], $_SESSION['cdr_products']);

		$_SESSION['msg'] = "Processing Consignment Delivery Receipt Complete...";
		echo $record_number;
	}

	// Update Invoice
	function update_invoice(){
		if(isset($_SESSION['cdr_products'])):
		if(count($_SESSION['cdr_products'])):

		$info = $_SESSION['cdr_info'];
		$qry = db_update('tbl_receipt', $_POST, 'RecordNumber', $info['rnum']);
		db_delete_row('tbl_receipt_rows', 'RecordNumber', $info['rnum']);

		foreach ($_SESSION['cdr_products'] as $key => $prod) {
			db_insert('tbl_receipt_rows', array(
				'RecordNumber' => $info['rnum'],
				'Quantity' => $prod['qty'],
				'Unit' => $prod['unit'],
				'Item' => $prod['item'],
				'UnitPrice' => $prod['price'],
				'Total' => $prod['total']
			));
		}

		endif; endif;
	}

	// Print Record Number
	function print_cdr(){
		if(isset($_GET['record_id'])) $_SESSION['record_id'] = $_GET['record_id'];

		if(isset($_SESSION['record_id']))
		$record_id = $_SESSION['record_id'];
		else $record_id = 0;

		include 'view/cdr/print_cdr.php';
	}

	// Print Drivers Copy
	function print_drivers_copy(){
		$neworder = array();
		$i = 0;
		$_SESSION['order'] = explode(",",$_GET['order']);
		foreach($_SESSION['order'] as $order){
			$neworder[$order] = $_SESSION['master'][$i];
			$i++;
		}
		$_SESSION['driver'] = $neworder;
		ksort($_SESSION['driver']);
		
		include 'view/cdr/print_drivers_copy.php';
	}

	// Print Master List
	function print_master(){
		include 'view/masterlist/print_masterlist.php';
	}

	// Ajax Show Records.. 
	function ajax_show_records(){
		$ref = $_POST['ref'];
		$results = db_select('tbl_receipt, _customers', '*', "WHERE (tbl_receipt.Customer = _customers.CustomerID) AND (_customers.Name LIKE '$ref%' OR tbl_receipt.RecordNumber LIKE '$ref%') ORDER BY RecordNumber DESC LIMIT 30");

		include 'view/masterlist/ajas_show_records.php';
	}

	// Add to master
	function add_to_master(){
		if(!isset($_SESSION['master'])) $_SESSION['master'] = array();

		$_SESSION['master'][] = $_POST['record_number'];
		include 'view/masterlist/show_master_list.php';
	}

	// Remove From Master
	function remove_from_master(){
		$ref = $_POST['ref'];
		if(isset($_SESSION['master']))
		$_SESSION['master'] = array_diff($_SESSION['master'], array($ref));
		include 'view/masterlist/show_master_list.php';
	}

	//Clear Masterlist
	function clear_masterlist(){
		unset($_SESSION['master']);
		include 'view/masterlist/show_master_list.php';
	}

	// Fetch Cdr INFO
	function fetch_cdr_info(){
		$rnum = $_POST['rnum'];
		$r = db_select('tbl_receipt', '*', "WHERE RecordNumber = $rnum", true);
		$c = db_select('_customers', '*', "WHERE CustomerID = ".$r->Customer, true);

		$date = explode(" ",$r->Date);
		$info['r_id'] = $rnum; 
		$info['rnum'] = str_pad($rnum, 10, "0", STR_PAD_LEFT);
		$info['c_name'] = $c->Name;
		$info['c_add'] = $c->Address;
		$info['c_id'] = $c->CustomerID;
		$info['date'] = $date[0];
		$info['status'] = $r->status;

		$_SESSION['cdr_info'] = $info;

		echo json_encode($info);
	}

	// fetch_cdr_items
	function fetch_cdr_items(){
		$_SESSION['cdr_products'] = array(); 
		$rnum = $_POST['rnum'];
		$rows = db_select('tbl_receipt_rows', '*', 'WHERE RecordNumber = '.$rnum);

		while($row = mysql_fetch_object($rows)):
			$_SESSION['cdr_products'][] = array('price'=>$row->UnitPrice, 'unit'=>$row->Unit, 'qty'=>$row->Quantity, 'item' => $row->Item, 'total' => $row->Total);
		endwhile;

		include 'view/cdr/ajax_cdr_list.php';
	}

	// Reset CDR
	function new_cdr(){
		unset($_SESSION['cdr_products']);
		unset($_SESSION['customer']);

		redirect('index.php#create_dr');
	}

	//Ajax Show Customer Search Results
	function ajax_show_customer_results(){
		$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
		$customers = db_select('customers', '*', "WHERE Name LIKE '$keyword%' ORDER BY Name ASC LIMIT 100");
		include 'view/customers/search.php';
	}