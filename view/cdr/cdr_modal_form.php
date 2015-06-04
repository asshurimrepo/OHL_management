    <?php 
        $units = array('SACHET(S)', 'SACK(S)', 'LITER(S)', 'GALLON(S)', 'CONTAINER(S)', 'PACK(S)', 'BOX(ES)', 'BUNDLE(S)', 'DOZEN(S)', 'PIECE(S)'); 
        $items = db_select('products', '*');
    ?>
    

    <form class="form-horizontal save_cdr_item" method="POST" action="javascript:void(0);">

    <div style="padding:10px;">
            <div class="control-group">
                <label class="control-label" for="qty">Item</label>
                <div class="controls">
                  <input list="items" type="text" id="item" name="item" placeholder="Item" value="<?=$item['item']?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="unit">Unit</label>
                <div class="controls">
                    <select name="unit" id="unit">
                        <?php foreach($units as $unit): ?>
                            <option <?=$unit == $item['unit'] ? 'selected' : ''?> ><?=$unit?></option>
                        <?php endforeach; ?>    
                    </select>
                </div>
              </div>
    		
			  <div class="control-group">
			    <label class="control-label" for="qty">Quantity</label>
			    <div class="controls">
			      <input  type="text" id="qty" name="qty" placeholder="Quantity" value="<?=$item['qty']?>">

                  <datalist id="items">
                     <?php while($row = mysql_fetch_object($items)): ?>
                      <option value="<?=$row->name?>"></option>
                     <?php endwhile; ?>
                  </datalist>

			    </div>
			  </div>

        <div class="control-group">
                <label class="control-label" for="price">Unit Price</label>
                <div class="controls">
                  <input type="text" id="price" name="price" placeholder="Unit Price" value="<?=$item['price']?>">
                </div>
              </div>
    </div>
    
    <div class="modal-footer">
        <input type="submit" class="btn" value="Save" />
        <input type="button" class="btn btn-inverse" data-dismiss="modal" value="Close"/>
    </div>

    </form>
    <!-- End form -->