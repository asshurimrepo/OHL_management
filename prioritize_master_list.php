<?php
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");

include 'include/db_func.php'; alerts();
?>
<?php if(isset($_SESSION['master'])): if(count($_SESSION['master'])): $masterlist = $_SESSION['master']; ?>
<?php $results = db_select('tbl_receipt, _customers', '*', "WHERE (tbl_receipt.Customer = _customers.CustomerID) AND tbl_receipt.RecordNumber IN(".implode(',',$masterlist).")"); ?>
<?php $new_master = array(); $ctr=1; ?>
<div class="well well-small">
<span class="warning"><b>Note:</b> Make sure all priority numbers are unique.</span>
<div align="right">Total Receipts: <?=db_num_rows($results)?></div>
<table class="table table-condensed table-hover" style="width: 100%;" >
                                <thead>
                                    <tr class="btn-inverse">
                                        <th width="18%">Record Number</th>
                                        <th>Customer Name</th>
                                        <th>Total Items</th>
                                        <th>Priority #</th>
                                    <tr>
                                </thead>

                                <tbody>
                        <?php while($row = mysql_fetch_object($results)): $new_master[] = $row->RecordNumber;?>
                                <tr data-index="<?=$row->RecordNumber?>" >
                                    <td><?=str_pad($row->RecordNumber, 10, "0", STR_PAD_LEFT)?></td>
                                    <td><?=$row->Name?></td>
                                    <td><?=$row->Total_Items?></td>
                                    <td><input style="width:52px; text-align:center;" type="text" name="pnum[]" value="<?=$ctr?>" /></td>
                                </tr>
                        <?php $ctr++; endwhile; $_SESSION['master'] = $new_master; ?>
                                </tbody>
</table>
</div>
<button id="set-pn" data-pnums="" class="btn">Accept and Set Priority Numbers</button>
<button id="pdc" disabled="disabled" data-href="" rel="windowCenter" class="btn popupwindow"><i class="icon-print icon-white"></i> Continue to Print</button>
<?php endif; endif; ?>
<?php //var_dump($_SESSION['master']); ?>
<script type="text/javascript" src="js/jquery.popupwindow.js"></script>

<script type="text/javascript">
	var profiles = {
		windowCenter: {
			height: 700,
			width: 900,
			center: 1
		}
	};
	
	$(".popupwindow").popupwindow(profiles);
	
	$("input[name='pnum\\[\\]']").keyup(function() {
		//if($(this).val().trim()===""||isNaN($(this).val())) {
			$("#pdc").attr("disabled","disabled");
		//}
	});
	
	$("#set-pn").click(function () {
		var valid = true;
		var values = $("input[name='pnum\\[\\]']").map(function(){return $(this).val();}).get();
		//console.log(values);
		$("#pdc").data("href","request.php?ref=print_drivers_copy&order="+values);

		$("input[name='pnum\\[\\]']").each(function() {
        	if($(this).val().trim()===""||isNaN($(this).val())) {
				valid = false;
			}
		});
		if(valid){
			$("#pdc").removeAttr("disabled");
		} else {
			$("#pdc").attr("disabled","disabled");
		}
	});
	$("#pdc").click(function(){
		$(this).attr("disabled","disabled");
	});
</script>
