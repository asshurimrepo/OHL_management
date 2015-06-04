<?php 
	$receipt = db_select('tbl_receipt', '*', 'WHERE RecordNumber = '.$record_id, true);
	$customer = db_select('_customers', '*', 'WHERE CustomerId = '.$receipt->Customer, true);
	$rows = db_select('tbl_receipt_rows', '*', 'WHERE RecordNumber = '.$record_id.' ORDER BY RecordID ASC');
?>

<html>
<head>
	<title>Print CDR</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css" />

	<style type="text/css">
		body{padding: 10px !important;}
		<?php if(isset($_GET['print'])): ?>
		.progress{display: none;}
		<?php else: ?>
		#printSection{display: none;}
		<?php endif; ?>
	</style>

	<script type="text/javascript">
		<?php if(isset($_GET['print'])): ?> 
		window.print(); 
		<?php else: ?>
		setTimeout(function(){ window.location = "request.php?ref=print_cdr&print=1"; }, 3000);
		<?php endif; ?>
	</script>
</head>
<body>

<div class="progress progress-striped active" style="padding:10px;">
  <div class="bar" style="width: 100%;">Processing Request..</div>
</div>

<div id="printSection">
  
	<h4 style="text-align:center;" class="ohl_heading">OHL TRADING INCORPORATED</h4>
        <h4 style="text-align:center;">225 - 4834 / 422 - 8309</h4>
        <h4 style="text-align:center;">CONSIGNMENT DELIVERY RECEIPT</h4>
        <br />

        <div class="r_info" style="float:right"><span>Date:</span>  <?=date('M d, Y', strtotime($receipt->Date))?> </div>
        <div class="r_info" stlye="float:left"><span>Customer:</span> <?=$customer->Name?> </div>
        <div class="r_info" style="float:right"><span>Record #:</span> <?=str_pad($record_id, 10, "0", STR_PAD_LEFT)?> </div>
        <div class="r_info" stlye="float:left"><span>Address:</span> <?=$customer->Address?> </div>
       

        <table id="row_table" class="table table-hover table-condensed" border="1" bordercolor="#000000" style="margin-top: 2px;">
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
                <tr>
                    <td style="line-height: .5em !important;">&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            	<?php while($row = mysql_fetch_object($rows)): ?>
            	<tr class="td_center">
            		<td><?=$row->Quantity?></td>
            		<td><?=$row->Unit?></td>
            		<td><?=$row->Item?></td>
            		<td><?=number_format($row->UnitPrice,2)?></td>
            		<td><?=number_format($row->Total,2)?></td>
            	</tr>
            	<?php endwhile; ?>

            	<?php for($i = db_num_rows($rows); $i < 10; $i++): ?>
            	<tr>
            		<td>&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td>
            	</tr>
            	<?php endfor; ?>

                <tr>
                    <td style="line-height: .5em !important;">&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="border-right:none !important; font-size: 10pt !important;"> TOTAL ITEMS: <?=number_format($receipt->Total_Items)?> <span class="pull-right" style="font-size: 10pt !important;">GRAND TOTAL: </span></td>
                    <td style="border-left:none !important; font-size: 10pt !important; ">Php <?=number_format($receipt->Grand_Total,2)?></td>
                </tr>
            </tfoot>
        </table>
    
        <div class="footer_sign" style="margin-top: 5px !important;">Received from OHL Trading the above goods in good order and condition:</div>
        <div class="pull-right footer_sign" style="margin-top:10px; ">
            <div class="footer_sign" style="text-align:center !important;">_____________________________________<br />Consignee/Auth. Rep - Print Name and Sign</div>
        </div>
</div>
</body>
</html>