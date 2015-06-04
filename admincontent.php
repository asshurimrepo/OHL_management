<?php
			/*$objdepartment = new department($db);
			$alldepartments = $objdepartment->getAll();
			$dep_tableheaders = $db->get_col_info();

			$objrates = new rates($db);
			$allrates = $objrates->getAll();
			$rate_tableheaders = $db->get_col_info();

			$objattendance = new attendance($db);*/

            

?>
        	<div id="content_for_admin">
                <ul id="myTabs" class="nav nav-tabs">
                    
                    <li class="active">
                        <a href="#create_dr" id="create_cdr" data-toggle="tab" onclick="window.location.hash = 'create_dr'">Create Delivery Reciept</a>
                    </li>
                    <li>
                        <a href="#cdrs" data-toggle="tab" onclick="window.location.hash = 'cdrs'">Delivery Reciepts</a>
                    </li>
                    <li>
                        <a href="#generate_masterlist" data-toggle="tab" onclick="window.location.hash = 'generate_masterlist'">Warehouse Copy</a>
                    </li>

                    <!-- Added By ash..  -->
                    <li><a href="#customers" data-toggle="tab" onclick="window.location.hash = 'customers'">Customers</a></li>
                    <li><a href="#products" data-toggle="tab" onclick="window.location.hash = 'products'">Products</a></li>
                    <!-- End -->
                </ul>
                <div class="lh-layout tab-content">
                    
                    <!-- Create CDR -->
                    <div id="create_dr" class="lh-layout_content tab-pane active in">
                       <?php include 'view/cdr/new.php'; ?> 
                    </div>
                    <div id="cdrs" class="lh-layout_content tab-pane">
                        <?php include 'view/cdr/list.php'; ?>
                    </div>
                    <div id="generate_masterlist" class="lh-layout_content tab-pane">
                        <?php include 'view/masterlist/new.php'; ?>
                    </div>
                    <!-- Added By ash -->
                    <div id="customers" class="lh-layout_content tab-pane">
                        <?php include 'view/customers/index.php'; ?>
                    </div>
                    <div id="products" class="lh-layout_content tab-pane">
                        <?php include 'view/products/index.php'; ?>
                    </div>
                    <!-- End -->

                </div>
                <div class="modal hide fade" id="editPassModal" tabindex="-1" role="dialog" aria-labelledby="editPassModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                        <h3 id="editPassModalLabel">Change Password</h3>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn" value="Save Changes" data-loading-text="Saving..." onClick="return setUserAction('save_pass');" />
                        <input type="button" class="btn btn-inverse" data-dismiss="modal" aria-hidden="true" value="Close"/>
                    </div>
                </div>
                <div class="modal hide fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="resetPage()" style="margin-bottom:-11px;" >×</button>
                    </div>
                    <div class="modal-body" id="invoice-modal-body" style="clear:both;" >
                    </div>
                    <div class="modal-footer">
                        <button class="btn" onclick="printReceiptDiv('invoice-modal-body')"><i class="icon-print icon-white"></i> Print</button>
                        <input type="button" class="btn btn-inverse" value="Close" data-dismiss="modal" aria-hidden="true" onclick="resetPage()" />
                    </div>
                </div>
            </div>
