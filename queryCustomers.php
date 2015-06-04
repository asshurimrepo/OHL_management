<?php
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/authentication.php");
require_once("include/customers.php");

$customerid = getParm('customerid','');
$mode = getParm('mode','');

$objcustomers = new customers($db);

switch($mode) {
	
	case "get_address":
	
		$customer = $objcustomers->getcustomer($customerid);
		echo $customer->Address;
		break;
	
	default:
}
?>