$(function() {
	var profiles = {
		windowCenter: {
			height: 700,
			width: 900,
			center: 1
		}
	};
	
	$(".popupwindow").popupwindow(profiles);

	$(".delete").click(delete_item_record);

	$(".tips").tooltip();

	setInterval(function(){
		$(".tooltip").fadeOut(300);
	}, 2500);

	$(".cdr_content").hide(); //hide Create CDR..

	// Select Customer
	$("#cdr_customer_txt").change(function(){
		var key = $(this).val();
		$.post("request.php?ref=ajax_show_customer_result", {key: key}, function(data){
			$(".customer_results").html(data);
			$(".tips").tooltip();

			// Select Customer...
			$(".cdr_select_customer").click(function(){
				var id = $(this).data('customerid'),
				name = $(this).data('name'),
				address = $(this).data('address');

				// Show Hide
				$(".select_customer").hide(500);
				$(".cdr_content").slideDown(500);

				// Focus Product Search
				$("#cdr_product_txt").val('').focus();

				// Initialized
				$("#customer_name").val(name);
				$("#CustomerID").val(id);
				$("#customer_address").val(address);

			});
		});
	});

	// Select Product
	$("#cdr_product_txt").change(function(){
		var key = $(this).val();
		$.post("request.php?ref=ajax_show_product_result", {key: key}, function(data){
			$(".product_results").html(data);
			$(".tips").tooltip();

			// Add Product
			$(".cdr_add_product").click(function(){
				var name = $(this).data('name');
				var id = $(this).data('prod-id');
				var unit = $("#unit_"+id).val();
				var cust_id =  $("#CustomerID").val();
				var qty = prompt("Enter a Quantity for "+name);
				var price = qty && !isNaN(qty) ? prompt("Enter a  Unit Price for "+name) : false;

				if(price && !isNaN(price)){
					var total = price*qty;

					$("#cdr_product_txt").val('').focus();
					$(".tooltip").hide();

					// Proccess Request
					$.post('request.php?ref=cdr_add_product_invoice', {id: id, price: price, unit:unit, qty: qty, item: name, total: total, cust_id: cust_id}, function(data){
						$("#add-receipt-row-results").html(data);
						$(".tips").tooltip();
						$(".remove_cdr_item").click(remove_cdr_item);
						$(".edit_cdr_item").click(edit_cdr_item);
					});
				}
				
			});
		});
	});

	// Change Customer
	$(".change_customer").click(function(){
		// Show Hide
		$(".select_customer").show(500);
		$(".cdr_content").slideUp(500);

	});

	// remove CDR Item
	$(".remove_cdr_item").click(remove_cdr_item);

	// Edit CDR Item
	$(".edit_cdr_item").click(edit_cdr_item);

	//Checking CDR for Processing Invoice IN CDR
	$(document).ajaxComplete(function() {
  		var counter = $(".cdr_counter").data('count');
  		if(counter > 0){
  			$(".process-invoice-button").attr('disabled', false);
  		}else{
  			$(".process-invoice-button").attr('disabled', true);
  		}
	});



	// Process Invoice
	$("#process-invoice-button").click(function(){
		var cust_id = $("#CustomerID").val();
		var total_items = $("#total_items").html();
		var grand_total = $("#grand_total").html();
		var status = $("#status").val();
		var date = $("#txtdate").val();
		grand_total = Number(grand_total.replace(/[^0-9\.]+/g,""));


		$.post('request.php?ref=process_invoice', {
			Customer: cust_id, 
			Total_Items: total_items,
			Grand_Total: grand_total,
			status: status,
			Date: date
		}, function(data){
			
			setTimeout(function(){ window.location = "index.php?cdr_complete=1#cdrs"; }, 500);
			setTimeout(function(){ window.location.reload(); }, 1000);
		});
		
	});

	// Search Record for Master
	$("#search_record").change(function(){
		var ref = $(this).val();
		$.post('request.php?ref=ajax_show_records',{ref:ref},function(data){
			$(".record_results").html(data);
			$(".tips").tooltip();
			
			var whTable = $("#whTable").dataTable({
				"bPaginate": true,
				"bLengthChange": true,
				"bFilter": false,
				"bSort": true,
				"bInfo": true,
				"bAutoWidth": false,
				"aaSorting"	: [[0, 'desc']]
			});
			
			$("#prioritizeModal").on("hidden",function() {
				$("#search_record").change();
				//alert(1);
			});

		
			// Asdd to Master List
			$(".add_to_masters").live('click',function(){
				var record_number = $(this).data('record-number');
				$.post('request.php?ref=add_to_master', {record_number: record_number}, function(data){
					// notif('Success');
					$("#add-masterlist-results").html(data);
					$(".tips2").tooltip();

					notif("Successfully Added!");

					//Remove From Master.. 
					$(".remove_from_master").click(remove_master_item);
				});
			});
		});
	});

	$("#search_record").change();
	$(".remove_from_master").click(remove_master_item);
	$(".tips2").tooltip();

	// Filter CDR by Status
	$("#cdr_filter_by_status, #search_customer_cdr").change(function(){
		var keyword = $("#search_customer_cdr").val();
		var cdr_status = $("#cdr_filter_by_status").val();
		window.location = "?c_keyword="+keyword+"&cdr_filter_by_status="+cdr_status+"#cdrs" ;
	});

	// Clear Master List
	$(".clear_masterlist").click(function(){
		$.post("request.php?ref=clear_masterlist",function(data){
			$("#add-masterlist-results").html(data);
		});
	});

	// Open Receipt
	$(".open-receipt").click(function(){
		var r_num = $(this).data('record-number');
		// window.location = "#create_dr";
		$("#create_cdr").click();

		// Show Form
		$(".select_customer").hide(500);
		$(".cdr_content").slideDown(500);
		$(".record-num-row").show(500);

		// Change Btn
		$("#process-invoice-button").hide(500);
		$("#update-invoice").show(500);
		$(".new_cdr").show(500);

		// Get Customer Info
		$.post("request.php?ref=fetch_cdr_info", {rnum:r_num}, function(data){
			// alert(data);
			$("#customer_name").val(data.c_name);
			$("#CustomerID").val(data.c_id);
			$("#txtdate").val(data.date);
			$("#customer_address").val(data.c_add);
			$("#status option[title='"+data.status+"']").attr('selected', true);
			$(".record-num-row .output").html(data.rnum);

			notif("Receipt Information Successfully Loaded.");
		}, "json");

		// Get Products...
		$.post("request.php?ref=fetch_cdr_items", {rnum: r_num}, function(data){
			$("#add-receipt-row-results").html(data);
			$(".tips").tooltip();
			$(".remove_cdr_item").click(remove_cdr_item);
			$(".edit_cdr_item").click(edit_cdr_item);
		});
	});

	// Update Invoice
	$("#update-invoice").click(function(){
		var cust_id = $("#CustomerID").val();
		var total_items = $("#total_items").html();
		var grand_total = $("#grand_total").html();
		var status = $("#status").val();
		var date = $("#txtdate").val();
		grand_total = Number(grand_total.replace(/[^0-9\.]+/g,""));


		$.post('request.php?ref=update_invoice', {
			Customer: cust_id, 
			Total_Items: total_items,
			Grand_Total: grand_total,
			status: status,
			Date: date
		}, function(data){
			notif("Successfully Updated!");
			window.location = "?update_cdr_complete=1#cdrs";
			setTimeout(function(){ window.location.reload(); }, 2000);
		});
		
	});


	// Search Customer
	//$("#customer_results").load("request.php?ref=ajax_show_customer_results", show_customer_results);
	$("#search_customer_record").change(function(){
		var keyword = $(this).val();
		$.post('request.php?ref=ajax_show_customer_results', {keyword:keyword}, function (data){
			$("#customer_results").html(data);
			
			var custTable = $("#custTable").dataTable({
				"bPaginate": true,
				"bLengthChange": true,
				"bFilter": false,
				"bSort": true,
				"bInfo": true,
				"bAutoWidth": false,
				"aaSorting"	: [[0, 'desc']]
			});
		
			$(".re-delete").live('click',delete_item_record);
		});
	});
	
	$("#search_customer_record").change();
	$(".re-delete").click(delete_item_record);
	
	
	// From main js
	window.prettyPrint && prettyPrint();
	var currentDate = new Date()
	var day = currentDate.getDate();
	var month = currentDate.getMonth() + 1;
	var year = currentDate.getFullYear();
	var now = year + "-" + month + "-" + day;
		
	
	$('#dp9').datepicker();
	
	if ($('#dp9').attr('data-date') == "") {
		$('#dp9').datepicker('setValue', now);
	}

	var $myalert = $('.my-alert').alert();
	setTimeout(function () {
	  $myalert.fadeTo(500, 0).slideUp(500, function(){ $myalert.alert('close'); }); 
	}, 5000);
	
	var activeTab = $('[href=' + location.hash + ']');
   		activeTab && activeTab.tab('show');
		
	/*var $alertcf = $('.alert.center, .alert.notif').alert();
		setTimeout(function () {
		  $alertcf.fadeTo(500, 0).slideUp(500, function(){ $alertcf.alert('close'); }); 
		}, 2500);*/
	var $alertc = $('.alert.center').alert();
		setTimeout(function () {
		  $alertc.fadeTo(500, 0).slideUp(500, function(){ $alertc.alert('close'); }); 
		}, 2500);
	// End From main js
	
});

function delete_item_record(){
	//alert(1);
	var link = $(this).data("link");
	$(".del-link").attr("href", link);
}

function remove_cdr_item(){
	var index = $(this).data('index');
	$.post('request.php?ref=remove_cdr_item', {index:index}, function(data){
		$("#add-receipt-row-results").html(data);
		$(".tips").tooltip();
		$(".remove_cdr_item").click(remove_cdr_item);
		$(".edit_cdr_item").click(edit_cdr_item);
		$(".tooltip").fadeOut(500);
	});
}

function edit_cdr_item(){
	var index = $(this).data('index');
	$("#editCDRProd .modal-form").load('request.php?ref=edit_cdr_item&index='+index, function(){
		$(".save_cdr_item").submit(function(){
			$.post('request.php?ref=update_cdr_item', {index:index, unit:this.unit.value, item:this.item.value, price:this.price.value, qty:this.qty.value}, function(data){
				$("#add-receipt-row-results").html(data);
				$(".tips").tooltip();
				$(".remove_cdr_item").click(remove_cdr_item);
				$(".edit_cdr_item").click(edit_cdr_item);
				$("#editCDRProd").modal('hide');
			});
		});
	});
}

function remove_master_item(){
	var index = $(this).data('index');
	$.post('request.php?ref=remove_from_master', {ref: index}, function(data){
		$("#add-masterlist-results").html(data);
		$(".tips2").tooltip();
		$(".remove_from_master").click(remove_master_item);
		$(".tooltip").hide();
	});
}

// Notification Area
function notif(msg){
	$(".notif").html(msg);
	$(".notif").fadeIn(500).delay(1000).fadeOut(500);
}


// From main js

function queryCustomers(mode,customerid)
{
	var xmlhttp;
	var returntext="";
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$('#cust_address').val(xmlhttp.responseText);
		}
	  }
	  
	xmlhttp.open("POST","queryCustomers.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("mode="+mode+"&customerid="+customerid);
	
}

function processInvoiceDR()
{
	var xmlhttp,
	row_ctr = $('#row_ctr').val(),
	txtcustid = $('#txtcustid').val(),
	txtdate = $('#txtdate').val(),
	cust_address = $('#cust_address').val(),
	txtrecordnumber = $('#txtrecordnumber').val(),
	status = $("#status").val(),
	is_not_master = $('#is_not_master').is(':checked') ? 1 : 0;
	
	var row_quantity = new Array(),row_unit = new Array(),row_items = new Array(),row_price = new Array(),row_total = new Array();
	row_quantity = $('#receipt_rows input[name=row_quantity]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_unit = $('#receipt_rows input[name=row_unit]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_items = $('#receipt_rows input[name=row_items]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_price = $('#receipt_rows input[name=row_price]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_total = $('#receipt_rows input[name=row_total]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	
	//alert("Quantity: "+row_quantity.length+"\n"+"Unit: "+row_unit.length+"\n"+"Items: "+row_items.length+"\n"+"Price: "+row_price.length+"\n"+"Total: "+row_total.length);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$('#invoice-modal-body').html(xmlhttp.responseText);
			var $alert = $('#invoice-modal-body > .my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 2500);
		} else {
			$('#invoice-modal-body').html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
		}
	  }
	  
	xmlhttp.open("POST","processInvoiceDR.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("row_ctr="+row_ctr+"&txtcustid="+txtcustid+"&txtdate="+txtdate+"&cust_address="+cust_address+"&txtrecordnumber="+txtrecordnumber+"&row_quantity="+row_quantity+"&row_unit="+row_unit+"&row_items="+row_items+"&row_price="+row_price+"&row_total="+row_total+"&status="+status+"&is_not_master="+is_not_master);
	
}

function addReceiptRow()
{
	var xmlhttp;
	row_ctr = parseInt($('#row_ctr').val());
	if($('#txtquantity').val()){
		txtquantity = parseFloat($('#txtquantity').val());
	} else {
		txtquantity = 0;
	}
	txtunit = $('#txtunit').val();
	txtitems = $('#txtitems').val();
	if($('#txtprice').val()){
		txtprice = parseFloat($('#txtprice').val());
	} else {
		txtprice = 0;
	}
	txttotal = parseFloat($('#txttotal').val());
	
		row = '<tr id="row_'+row_ctr+'" class="receipt_row">';
		row += '<td>'+txtquantity+'<input name="row_quantity" type="hidden" value="'+txtquantity+'" /></td>';
		row += '<td>'+txtunit+'<input name="row_unit" type="hidden" value="'+txtunit+'" /></td>';
		row += '<td>'+txtitems+'<input name="row_items" type="hidden" value="'+txtitems+'" /></td>';
		row += '<td>Php '+addCommas(txtprice.toFixed(2))+'<input name="row_price" type="hidden" value="'+txtprice+'" /></td>';
		row += '<td>Php '+addCommas(txttotal.toFixed(2))+'<input name="row_total" type="hidden" value="'+txttotal+'" /></td>';
		row += '<td><a style="line-height: 20pt; cursor:pointer;" onclick="deleteReceiptRow(\'row_'+row_ctr+'\')"><i class="icon-trash icon-white"></i></a></td>';
		row += '</tr>';
		
		$("#receipt_rows").append(row);
		
		getTotalNumerofItems();
		getGrandTotal();
	
		row_ctr += 1;
		$('#row_ctr').val(row_ctr);

		if($(".receipt_row").length==10) {
			$("#RowsReachedAlert").css({"display":"block"});
			$("#AddButton").css({"display":"none"});
			$("#DisabledAddButton").css({"display":"block"});
			var $alert = $('#RowsReachedAlert').alert();
			setTimeout(function () {
			  $alert.fadeTo(1000, 0).slideUp(1000, function(){ $alert.alert('close'); }); 
			}, 2500);
		}
		
		if($(".receipt_row").length>0) {
			$("#process-invoice-button").removeAttr("disabled");
		} else {
			$("#process-invoice-button").attr("disabled","disabled");
		}
}

function deleteReceiptRow(row) {
	row_ctr = parseInt($('#row_ctr').val());
	//alert(row);
	$("#"+row).live('click', function() {
		$(this).remove();
		row_ctr -= 1;
		$('#row_ctr').val(row_ctr);
		getTotalNumerofItems();
		getGrandTotal();
		if($(".receipt_row").length<=0) {
			$("#process-invoice-button").attr("disabled","disabled");
		}
	} );
}

function getTotalNumerofItems() {
	total = 0;
	$('#receipt_rows input[name=row_quantity]').each( function () { 
		total += parseFloat($(this).val());
	});
	$("#total_items").html(total);
	//alert(total);
}

function getGrandTotal() {
	total = 0;
	$('#receipt_rows input[name=row_total]').each( function () { 
		total += parseFloat($(this).val());
	});
	$("#grand_total").html(addCommas(total.toFixed(2)));
	//alert(total);
}

$(function() {
	computeTotal()
});
	
function computeTotal()
{
	
	quantity = parseFloat($('#txtquantity').val());
	price = parseFloat($('#txtprice').val());
	total = quantity*price;
	
	if(isNaN(total)) {
		total = 0;
	}
	
	$('#txttotal').val(total);
	$('#display_txttotal').html(addCommas(total.toFixed(2)));
}

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function savePassword(userid,oldpassword,newpassword,mode)
{
	var xmlhttp;
	
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('alert').style.display = "block";
			document.getElementById('alert').innerHTML = xmlhttp.responseText;
			var $alert = $('.my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 5000);
		}
	  };
	  
	xmlhttp.open("POST","save_password.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("userid="+userid+"&oldpassword="+oldpassword+"&newpassword="+newpassword+"&useraction="+mode);
	
}

function requiredChangePasswordValidator() {
	
	var oldpassword = document.getElementById('oldpassword').value;
	var newpassword = document.getElementById('newpassword').value;
	var cnewpassword = document.getElementById('cnewpassword').value;
	
	var valid = true;
	
	if (oldpassword == ''||newpassword == ''||cnewpassword == '') {
		document.getElementById('lblErrPass').innerHTML = "<div class=\"well well-small\"> Please Fill in all the fields.</div>";
		valid = false;
	} else if(newpassword!=cnewpassword) {
		document.getElementById('lblErrPass').innerHTML = "<div class=\"well well-small\"> Confirmation Password doesn't match.</div>";
		valid = false;
	} else {
		document.getElementById('lblErrPass').innerHTML = "";
	}
	
	return valid;
}

function setUserAction(mode,second_mode) {
	
	var loginform = document.getElementById('loginform');
	var frmuser = document.getElementById('frmuser');
	var regform = document.getElementById('regform');
	var useraction = document.getElementById('useraction');
	var rateform = document.getElementById('rateform');
	var datepickerform = document.getElementById('datepicker-form');

	switch (mode) {

		case 'login':

			useraction.value = mode;
			loginform.submit();
			
			break;
			
		case 'register':

			if(requiredFieldValidator()){
				useraction.value = mode;
				regform.submit();
			}
			break;
			
		case 'cancel':

			useraction.value = mode;
			regform.submit();
			//loginform.reset();

			break;
			
		case 'save_pass':

			if(requiredChangePasswordValidator()){
				var userid = document.getElementById('userid').value;
				var oldpassword = document.getElementById('oldpassword').value;
				var newpassword = document.getElementById('newpassword').value;
				savePassword(userid,oldpassword,newpassword,mode);
			}
			break;
			
		case 'closeRefresh':

			$("#prioritizeModal").on("hidden",function() {
				$("#search_record").keyup();
				alert(1);
			});

			break;
			
		case 'logout':

			useraction.value = mode;
			frmuser.submit();

			break;
			
	}
	
	return false;

}

//End From main js
