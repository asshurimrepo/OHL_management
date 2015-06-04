                       
<div class="search_record">
    <div class="control-group input-prepend" > 
        <span class="add-on"><i class="icon-search"></i></span>
        <input style="width: 95%;" placeholder="Enter Customer Name or Record Number" type="text" id="search_record" />
    </div>

    <div class="record_results"></div>
</div>


    <div style="margin-top: 30px;" id="add-masterlist-results" class="well">
        <?php include 'view/masterlist/show_master_list.php'; ?>
    </div>

    <a href="javascript:void(0)" class="btn clear_masterlist"><i class="icon-remove-sign icon-white"></i> Clear List</a>  
    <a href="prioritize_master_list.php" class="btn" data-toggle="modal" data-target="#prioritizeModal"><i class="icon-print icon-white"></i> Print Driver's Copy</a>  

    <a href="javascript:void(0)" data-href="request.php?ref=print_master" rel="windowCenter" class="btn popupwindow"><i class="icon-tasks icon-white"></i> Generate Warehouse Copy</a> 

   <!--  <div class="clearfix">
        <br />
    	<button data-href="request.php?ref=print_master" rel="windowCenter" autofocus class="popupwindow btn btn-block btn-large" id="generate-masterlist-button" name="generate-masterlist-button" onclick="generateMasterList(getMStart_Date(),getMEnd_Date(),getMTimePickerOne(),getMTimePickerTwo())">
        	<i class="icon-tasks icon-white"></i> GENERATE&nbsp;&nbsp;MASTERLIST
        </button>
    </div> -->

<div id="view-masterlist-results">
	<!-- Masterlist Query Results Will Appear Here -->
</div>