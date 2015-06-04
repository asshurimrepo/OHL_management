
<table id="whTable" class="table table-condensed table-bordered">
	<thead>
    	<tr class="btn-inverse">
    		<th class="span2">Record Number</th>
    		<th>Customer</th>
    		<th>Total Items</th>
    		<th>Grand Total</th>
    		<th>Status</th>
    		<th class="span2">Date</th>
    	</tr>
    </thead>

    <tbody>
    <?php while($row = mysql_fetch_object($results)): $customer = db_select('_customers', '*', 'WHERE CustomerID='.$row->Customer, true); ?>
    	<tr class="add_to_cdr tips add_to_masters" data-record-number="<?=$row->RecordNumber?>" data-toogle="tooltips" data-original-title="Add to Masterlist">
    		<td class="text-info"><?=str_pad($row->RecordNumber, 10, "0", STR_PAD_LEFT)?></td>
    		<td class="text-info"><?=$customer->Name?></td>
    		<td class="text-info"><?=$row->Total_Items?></td>
    		<td class="text-info"><?=number_format($row->Grand_Total, 2)?></td>
    		<td class="text-info"><?=$row->status?></td>
    		<td class="text-info"><?=date('M d, Y', strtotime($row->Date))?></td>
    	</tr>
    <?php endwhile; ?>
    </tbody>
</table>
<div class="modal hide fade" id="prioritizeModal" tabindex="-1" role="dialog" aria-labelledby="prioritizeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
        <h3 id="prioritizeModalLabel">Prioritize Delivery</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-inverse" value="Cancel" data-dismiss="modal" aria-hidden="true" />
    </div>
</div>
<script type="text/javascript">
(function(){
	$("#prioritizeModal").on("hidden",function() {
		$("#search_record").keyup();
		//alert(1);
	});
});
</script>