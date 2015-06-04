
<?php
if(isset($_SESSION['master'])): if(count($_SESSION['master'])): 
	$masterlist_qry = db_select('tbl_receipt_rows', 'SUM(Quantity) AS sum_quantity, Item', "WHERE RecordNumber IN (".implode(',',$_SESSION['master']).") GROUP BY Item");
    $masterlist_qry2 = db_select('tbl_receipt_rows', 'SUM(Quantity) AS sum_quantity, Item', "WHERE RecordNumber IN (".implode(',',$_SESSION['master']).") GROUP BY Item");

    // unset($_SESSION['master']);
    $total_items = 0;
?>

<html>
<head>
	<title>Print Master List</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css" />

	<style type="text/css">
		body{padding: 10px !important; background: #FFF !important;}
	</style>

    <script type="text/javascript">
        window.print();
    </script>

</head>
<body>



<div id="printSection">

<!-- Copy1 -->
<div class="printleft" style="float:left; width:50%;">
    
    <h4 align="center">OHL TRADING WAREHOUSE COPY <br /> <br /> <u>DELIVERIES</u></h4> <br />
    <h4>Date: <?=date('M d, Y')?></h4>
   

    <div style="color: #000000;">
        <?php  while($row = mysql_fetch_object($masterlist_qry)): $total_items += $row->sum_quantity; ?>
        <span style="display:inline-block; width: 15px; text-align:center;"><?=$row->sum_quantity?></span> <span style="letter-spacing:-2px;">---------------&nbsp;&nbsp;&nbsp;</span> <?=$row->Item?> <br />
        <?php endwhile; ?>
    </div>

    <h4>TOTAL ITEMS: <?=$total_items?></h4>

</div>

<!-- Copy 2 -->
<?php $total_items = 0; ?>
<div class="printright" style="float:right; width:50%;">
    
    <h4 align="center">OHL TRADING WAREHOUSE COPY <br /> <br /> <u>DELIVERIES</u></h4> <br />
    <h4>Date: <?=date('M d, Y')?></h4>
   

    <div style="color: #000000;">
        <?php  while($row = mysql_fetch_object($masterlist_qry2)): $total_items += $row->sum_quantity; ?>
        <span style="display:inline-block; width: 15px; text-align:center;"><?=$row->sum_quantity?></span> <span style="letter-spacing:-2px;">---------------&nbsp;&nbsp;&nbsp;</span> <?=$row->Item?> <br />
        <?php endwhile; ?>
    </div>

    <h4>TOTAL ITEMS: <?=$total_items?></h4>

</div>

</div>
</body>
</html>
<?php else: echo 'No masterlist to print'; endif; else: echo 'No masterlist to print'; endif; ?>