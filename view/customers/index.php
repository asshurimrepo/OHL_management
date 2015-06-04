
	<div class="pull-right" style="margin-bottom: 10px;">
	   	 <a href="add_employee.php" class="btn" data-toggle="modal" data-target="#addCustomers"><sup>+</sup><i class="icon-user icon-white"></i> Add New Customer</a>  
    </div>

    <br clear="all">

    <div class="control-group input-prepend"> 
        <span class="add-on"><i class="icon-search"></i></span>
        <input style="width: 95%;" placeholder="Enter Customer Name" type="text" id="search_customer_record">
    </div>

    

    <div id="customer_results">Loading...</div>



<?php if(isset($_GET['editCustomer'])): include 'view/customers/edit.php'; endif; ?>
<?php include 'view/customers/new.php'; ?>
