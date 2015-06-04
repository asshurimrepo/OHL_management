<script type="text/javascript">
    window.print();
</script>
<link rel="stylesheet" href="css/bootstrap-table.css" />
<style type="text/css">
    *{
        font-family: Arial;
        font-size: 12px;
    }
    .drivers_copy *{
        font-size: 11px;
        font-family: Arial;
    }
    .drivers_copy{
        width: 48%;
        display: inline-block;
        margin-left: 10px;
    }
    /*.drivers_copy td{
        border: 1px solid #000;
        padding: 3px;
    }
    .drivers_copy th{
        border: 1px solid #000;
        padding: 3px;
    }*/

    .drivers_copy td{
        padding: 1px !important;
        padding-left: 10px !important;
    }
    .drivers_copy table{
        width: 100%
    }
</style>

<?php if(isset($_SESSION['driver'])): $num = count($_SESSION['driver']); $pages = ceil($num/6); 
	//var_dump($_SESSION['driver']);
    $flag_page = 0; $page_count = 0;
?> 



<?php foreach($_SESSION['driver'] as $key=>$record_id): 
    $receipt = db_select('tbl_receipt', '*', 'WHERE RecordNumber = '.$record_id, true);
    $customer = db_select('_customers', '*', 'WHERE CustomerId = '.$receipt->Customer, true);
?>

<?php if($flag_page == 0): $page_count++; ?>
<h4 style="text-align:right;">DRIVER'S COPY</h4>  
            <h4 style="text-align:center; font-size:15px;">OHL TRADING INCORPORATED</h4>
            <br />
<?php endif; ?>

<?php $flag_page = ($key)%6; ?>
<?php $rows = db_select('tbl_receipt_rows', '*', 'WHERE RecordNumber = '.$record_id.' ORDER BY RecordID ASC'); ?>

        <div id="drivers_copy" class="drivers_copy">
        <h2 style="font-size:13px;">DELIVERY PRIORITY #: <?=$key?></h2>
        <div class="r_info" style="float:right"><span>Date:</span>  <?=date('M d, Y', strtotime($receipt->Date))?> </div>

        <div class="r_info" stlye="float:left"><span>Customer:</span> <?=$customer->Name?> </div>
        <div class="r_info" style="float:right"><span>Record #:</span> <?=str_pad($record_id, 10, "0", STR_PAD_LEFT)?> </div>
        <div class="r_info" stlye="float:left"><span>Address:</span> <?=$customer->Address?> </div>

         <table id="row_table" class="table table-hover table-condensed table-bordered" border="0" style="margin-top: 2px;" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Item</th>
                <tr>
            </thead>
            <tbody>
            	<?php while($row = mysql_fetch_object($rows)): ?>
            	<tr class="td_center">
            		<td><?=$row->Quantity?></td>
            		<td><?=$row->Unit?></td>
            		<td><?=$row->Item?></td>
            	</tr>
            	<?php endwhile; ?>

            	<?php for($i = db_num_rows($rows); $i < 10; $i++): ?>
            	<tr>
            		<td>&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td>
            	</tr>
            	<?php endfor; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><b> TOTAL ITEMS: <?=number_format($receipt->Total_Items)?></td>
                </tr>
            </tfoot>
        </table>
        </div>

        <?php if($flag_page == 0 || $page_count == $pages):?>
        <?php if(!$page_count == 1 || $key == $num || $pages > $page_count): ?>
            <div align="right" style="margin-bottom:0px; margin-top:-15px;">Page <?=$page_count?> of <?=$pages?></div>
        <?php endif; ?>
        <?php endif; ?>

<?php endforeach; ?>
<?php endif; ?>