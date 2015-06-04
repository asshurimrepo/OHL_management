<!-- Modal For Adding New Products -->
<div class="modal hide fade" id="addProducts" style="margin-top: -205px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Add New Product</h3>
    </div>
    <!-- New Customer Form -->
    <form class="form-horizontal" method="POST" action="request.php?ref=new_product">

    <div style="padding:10px;">
    		
                <!-- Name -->
			  <div class="control-group">
			    <label class="control-label" for="name">Product Name</label>
			    <div class="controls">
			      <input type="text" id="name" name="name" placeholder="Product Name">
			    </div>
			  </div>

              <div class="control-group">
                <label class="control-label" for="unit_price">Unit</label>
                <div class="controls">
               
                  <select name="unit">
                  	  <option value="SACHET(S)">SACHET(S)</option>
                      <option value="SACK(S)">SACK(S)</option>
                      <option value="LITER(S)">LITER(S)</option>
                      <option value="GALLON(S)">GALLON(S)</option>
                      <option value="CONTAINER(S)">CONTAINER(S)</option>
                      <option value="PACK(S)">PACK(S)</option>
                      <option value="BOX(ES)">BOX(ES)</option>
                      <option value="BUNDLE(S)">BUNDLE(S)</option>
                      <option value="DOZEN(S)">DOZEN(S)</option>
                      <option value="PIECE(S)">PIECE(S)</option>
                  </select>
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