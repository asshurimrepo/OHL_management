<?php 
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/authentication.php");
require_once("include/users.php");
require_once("include/customers.php");
require_once("include/receipts.php");

date_default_timezone_set("Asia/Singapore");

$row_ctr = getParm('row_ctr',0);
$txtcustid = getParm('txtcustid','');
$txtdate = getParm('txtdate','');
$cust_address = getParm('cust_address','');
$status = getParm('status', '');
$is_not_master = getParm('is_not_master', '');

$txtrecordnumber = getParm('txtrecordnumber',0);
$row_quantity = explode(",",getParm('row_quantity',0));
$row_unit = explode(",",getParm('row_unit',''));
$row_items = explode(",",getParm('row_items',''));
$row_price = explode(",",getParm('row_price',0));
$row_total = explode(",",getParm('row_total',0));

$totalquantity = 0;
$grandtotal = 0;

foreach($row_quantity as $quantity) {
	$totalquantity += $quantity;
}

foreach($row_total as $total) {
	$grandtotal += $total;
}

//var_dump($row_unit); die;

$objreceipts = new receipts($db);
$objcustomers = new customers($db);

if($objreceipts->getreceipt($txtrecordnumber)) {
	
        $error = '<div class="alert alert-error fade in">';
        $error .= '<button type="button" class="close" data-dismiss="alert">×</button>';
        $error .= 'Invoice not saved. Duplicate Entry. Refresh/Reload the page to create a new Invoice.';
        $error .= '</div>';
		echo $error; die;
		
} else {
	
	$success = $objreceipts->add($txtrecordnumber, $txtcustid, $totalquantity, $grandtotal, $status, $is_not_master);

	if($success) {
		for($i=0;$i<$row_ctr;$i++) {
			$success = $objreceipts->addRow($txtrecordnumber, $txtcustid, $cust_address, $row_quantity[$i], $row_unit[$i], $row_items[$i], $row_price[$i], $row_total[$i]);
		}
		$recordrows = $objreceipts->getreceiptsbyrecord($txtrecordnumber);
		$customer = $objcustomers->getcustomer($txtcustid);
		$customername = $customer->Name;
	}
	
}
?>
	<?php if($recordrows) { array_reverse($recordrows, false); ?>
        <div class="my-alert alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Invoice successfully saved.
        </div>
        <h3 style="text-align:center;">OHL TRADING INCORPORATED</h3>
        <h4 style="text-align:center;">225 - 4834 / 422 - 8309</h4>
        <h4 style="text-align:center;">CONSIGNMENT DELIVERY RECEIPT</h4>
        <table id="invoice_header" class="table table-condensed table-hover" border="0">
            <tbody>
                <tr>
                    <td align="right">Customer:</td>
                    <td><?=$customername?></td>
                    <td align="right">Date:</td>
                    <td><?=$txtdate?></td>
                </tr>
                <tr>
                    <td align="right">Address:</td>
                    <td width="60%"><?=$cust_address?></td>
                    <td align="right">Record #:</td>
                    <td><?=$txtrecordnumber?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <table id="row_table" class="table table-hover table-condensed" border="1" bordercolor="#000000">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Item</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                <tr>
            </thead>
            <tbody>
            <?php foreach($recordrows as $row) { ?>
                <tr>
                    <td><?=number_format($row->Quantity)?></td>
                    <td><?=$row->Unit?></td>
                    <td><?=$row->Item?></td>
                    <td>Php <?=number_format($row->UnitPrice,2)?></td>
                    <td>php <?=number_format($row->Total,2)?></td>
                </tr>
            <?php } ?>
            <?php for($i=0;$i<(10-count($recordrows));$i++) { ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="border-right:none !important;"><b><?=number_format($totalquantity)?> TOTAL ITEMS<span class="pull-right">GRAND TOTAL: </span></b></td>
                    <td style="border-left:none !important;"><b>Php <?=number_format($grandtotal,2)?></b></td>
                </tr>
            </tfoot>
        </table>
        <br />
        <div>Received from OHL Trading the above goods in good order and condition:</div>
        <div class="pull-right">
            <div style="text-align:center !important;">_____________________________________<br />Consignee/Auth. Rep - Print Name and Sign</div>
        </div>
	<?php } else { ?>
        <div class="my-alert alert alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Process Failed.
        </div>
	<?php } ?>