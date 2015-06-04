<?php if(1 == 1): ?>

<?php if(isset($_SESSION['customer'])): $customer = $_SESSION['customer']; ?>  
<script type="text/javascript">
    $(function() {
        $("#customer_name").val('<?=$customer->Name?>');
        $("#CustomerID").val('<?=$customer->CustomerID?>');
        $("#customer_address").val('<?=$customer->Address?>');
        $(".select_customer").slideUp(200);
        $(".cdr_content").fadeIn(500);
        $("#cdr_product_txt").keyup();
    });
</script>
<?php endif; ?>

<div class="select_customer">
    <div class="control-group input-prepend" > 
        <span class="add-on"><i class="icon-search"></i></span>
        <input tabindex="1" style="width: 95%;" placeholder="Enter Customer Name" type="text" id="cdr_customer_txt" autofocus>
    </div>

    <div class="customer_results"></div>

</div>


<div class="cdr_content"> 


<div style="text-align: right">
       <button class="btn change_customer"> <i class="icon-user"></i> Change Customer</button>
       <a href="request.php?ref=new_cdr" class="btn new_cdr"> <i class="icon-plus"></i> Create New CDR</a> 
    </div>

                        <h4 style="text-align:center;">OHL TRADING INCORPORATED</h4>
                        <h5 style="text-align:center;">225 - 4834 / 422 - 8309</h5>
                        <h5 style="text-align:center;">CONSIGNMENT DELIVERY RECEIPT</h5>
                        <form id="create_dr_form" method="post">
                            <table class="table table-condensed table-hover">
                                <tbody>
                                    <tr class="record-num-row" style="display:none;">
                                        <td align="right">Record Number:</td>
                                        <td colspan="4" class="output"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Customer:</td>
                                        <td>
                                           <input type="text" id="customer_name" value="" readonly />
                                           <input type="hidden" id="CustomerID" name="CustomerID" />
                                        </td>
                                        <td align="right">Date:</td>
                                        <td>
                                        
                                        <!-- Edited By Ash -->
                                        <div class="input-append date" id="dp9" data-date="" data-date-format="yyyy-mm-dd">
                                            <input type="text" value="" id="txtdate" name="txtdate" class="input-small" readonly="">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>

                                    </tr>

                                    <tr>
                                        <td>Address:</td>
                                        <td>
                                           <input type="text" id="customer_address" value="" readonly />
                                        </td>
                                        <td>Status:</td>
                                        <td><select id="status" name="status">
                                                <option value="PAID" title="Paid">PAID</option>
                                                <option value="2" selected="" title="Unpaid">UNPAID</option>
                                                <option value="4" title="Partially Paid">PARTIALY PAID</option>
                                                <option value="5" title="COD">COD</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br />

                            <!-- Select Products -->
                            <div class="select_product">
                                <div class="control-group input-prepend" > 
                                    <span class="add-on"><i class="icon-search"></i></span>
                                    <input style="width: 95%;" placeholder="Enter Product Name" type="text" id="cdr_product_txt">
                                </div>

                                <div class="product_results"></div>

                            </div>

                            <br>

                            
                        <div id="add-receipt-row-results" class="well">
                           <!-- Receipt Results -->
                           <?php include 'view/cdr/ajax_cdr_list.php'; ?>
                        </div>
                        </form>
                        <div class="clearfix">
                            <button autofocus class="btn btn-block btn-large popupwindow process-invoice-button" id="process-invoice-button" name="process-invoice-button" data-href="request.php?ref=print_cdr" rel="windowCenter" disabled>
                                <i class="icon-tasks icon-white"></i> PROCESS&nbsp;&nbsp;INVOICE
                            </button>

                             <button style="display:none;" class="btn btn-block btn-large process-invoice-button" id="update-invoice" disabled>
                                <i class="icon-tasks icon-white"></i> UPDATE&nbsp;&nbsp;INVOICE
                            </button>

                            <a style="display:none;" href="#hello" data-href="request.php?ref=update_cdr" rel="windowCenter" class="popupwindow udpate_cdr_print">Hidden Popup for Update CDR</a>
                        </div>
</div>  
<?php endif; include 'view/cdr/edit_product_list.php'; ?>