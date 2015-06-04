<!-- Modal For Adding New Customer -->
<div class="modal hide fade" id="addCustomers" style="margin-top: -205px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Add New Customer</h3>
    </div>
    <!-- New Customer Form -->
    <form class="form-horizontal" method="POST" action="request.php?ref=new_customer">

    <div style="padding:10px;">
    		
                <!-- Name -->
			  <div class="control-group">
			    <label class="control-label" for="Name">Name</label>
			    <div class="controls">
			      <input type="text" id="Name" name="Name" placeholder="Name">
			    </div>
			  </div>

              <!-- Address -->
			  <div class="control-group">
			    <label class="control-label" for="Address">Address</label>
			    <div class="controls">
			      <input type="text" id="Address" name="Address" placeholder="Address">
			    </div>
			  </div>

              <div class="control-group">
                <label class="control-label" for="Contact">Contact Info</label>
                <div class="controls">
                  <input type="text" id="Contact" name="Contact" placeholder="Contact">
                </div>
              </div>
    </div>
    
    <div class="modal-footer">
        <input type="submit" class="btn" value="Save" />
        <input type="button" class="btn btn-inverse" data-dismiss="modal" value="Close"/>
    </div>

    </form>
    <!-- End form -->
</div>