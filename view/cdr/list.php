<?php
    $keyword = isset($_GET['c_keyword']) ? $_GET['c_keyword'] : '';
    $where = isset($_GET['cdr_filter_by_status']) ? "WHERE status LIKE '$_GET[cdr_filter_by_status]%' " : '';

    if($keyword):
        $c_rows = db_select('customers', '*', "WHERE Name LIKE '$keyword%' ");
        $c_ids = array();

        while($c_row = mysql_fetch_object($c_rows)):
            $c_ids[] = $c_row->CustomerID;
        endwhile;

        if(!$where): $where = 'WHERE'; else: $where .= "AND"; endif;
           
        if(count($c_ids) == 0):
            $where .= " Customer IN('') ";
        else:
            $where .= " Customer IN (".implode(',',$c_ids).") ";
        endif;

    endif;

	$rows = db_select('tbl_receipt', '*', $where.' ORDER BY RecordNumber DESC');
?>

<?php if(isset($_GET['cdr_filter_by_status'])): $id_status = "#cdr_".str_replace(" ", "", $_GET['cdr_filter_by_status']); ?>

    <script type="text/javascript">
        $(function() {
            $("<?=$id_status?>").attr('selected', true);
        });
    </script>

<?php endif; ?>

<?php if(isset($_GET['update_cdr_complete'])): ?>

      <script type="text/javascript">
        $(function() {
            setTimeout(function(){ $(".printing_request").hide(500); }, 3000);
        });
    </script>

    <iframe style="display:none;" src="request.php?ref=print_cdr&record_id=<?=$_SESSION['cdr_info']['rnum']?>"></iframe>

    <div class="progress progress-striped active printing_request">
        <div class="bar" style="width: 100%;">Processing Request</div>
    </div>
   
<?php endif; ?>

<div class="control-group input-prepend" style="float:left; margin-right: 20px;"> 
        <span class="add-on"><i class="icon-search"></i></span>
        <input style="width: 600px;" placeholder="Enter Customer Name" type="text" id="search_customer_cdr" value="<?=$keyword?>">
    </div>

<select id="cdr_filter_by_status">
    <option id="cdr_all" value="">All</option>
    <option id="cdr_Paid">Paid</option>
    <option id="cdr_Unpaid">Unpaid</option>
    <option id="cdr_PartiallyPaid">Partially Paid</option>
    <option id="cdr_COD">COD</option>
</select>

<br /> <br />

<table id="drTable" class="table table-condensed table-bordered">
	<thead>
    	<tr class="btn-inverse">
    		<th class="span2">Record Number</th>
    		<th>Customer</th>
    		<th>Total Items</th>
    		<th>Grand Total</th>
    		<th>Status</th>
    		<th>Date</th>
            <th style="width:40px;"></th>
    	</tr>
    </thead>

    <tbody>
    <?php while($row = mysql_fetch_object($rows)): $customer = db_select('_customers', '*', 'WHERE CustomerID='.$row->Customer, true); ?>
    	<tr>
    		<td class="text-info"><?=str_pad($row->RecordNumber, 10, "0", STR_PAD_LEFT)?></td>
    		<td class="text-info"><?=$customer->Name?></td>
    		<td class="text-info"><?=$row->Total_Items?></td>
    		<td class="text-info"><?=number_format($row->Grand_Total, 2)?></td>
    		<td class="text-info"><?=$row->status?></td>
    		<td class="text-info"><?=date('M d, Y', strtotime($row->Date))?></td>
    		<td>
			<a href="javascript:void(0)" id="print_<?=$row->RecordNumber?>" data-href="request.php?ref=print_cdr&record_id=<?=$row->RecordNumber?>" class="tips popupwindow" rel="windowCenter" data-toogle="tooltips" data-original-title="Print CDR"> <i class="icon-print icon-white"></i> </a>

            <a href="#create_dr" class="tips open-receipt" data-record-number="<?=$row->RecordNumber?>" data-toogle="tooltips" data-original-title="Open Receipt"> <i class="icon-list icon-white"></i> </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </tbody>
  </table>