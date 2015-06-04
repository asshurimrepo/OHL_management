<?php //this is the footer ?>
        <div id="footer" class="clearfix navbar navbar-inverse">
            <div class="navbar-inner">
                <span class="footer_content"><span class="pull-left">OHL Systems - Point of Sales © Copyright 2013. All Rights Reserved- by OHL Trading. Developed by Elery Robert N. Libo-on</span><span class="pull-right">www.ohlsystems.com</span></span>
            </div>
        </div>
    </div>
</body>
<script src="js/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		var drTable = $("#drTable").dataTable({
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false,
			"aaSorting"	: [[0, 'desc']]
		});
		
		var prodTable = $("#prodTable").dataTable({
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": false,
			"aaSorting"	: [[0, 'desc']]
		});
		
		$("#cdr_customer_txt").focus();
		
	});
</script>
<style type="text/css">
	div.dataTables_info {
		float: left;
		padding: 8px;
	}
	div.dataTables_paginate {
		float: right;
		margin: 0px;
		padding: 8px;
	}	
	.row {
		margin-left: 5px;
	}
	div.dataTables_paginate ul.pagination {
		list-style: none;
		height:auto !important;
	}
	div.dataTables_paginate ul.pagination li {
		list-style: none;
		display: inline-block;
		padding:5px 8px;
		box-sizing:border-box;
		background:rgba(0,0,0,0.2);
		margin:0px 1px;
	}
</style>
</html>
