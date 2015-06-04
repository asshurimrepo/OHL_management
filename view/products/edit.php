<?php 
    $units = array('SACHET(S)', 'SACK(S)', 'LITER(S)', 'GALLON(S)', 'CONTAINER(S)', 'PACK(S)', 'BOX(ES)', 'BUNDLE(S)', 'DOZEN(S)', 'PIECE(S)');
    $product = db_select('products', '*', 'WHERE id = '.$_GET['id'], true);
?>

<script type="text/javascript">
    $(function() {
        $("#editProducts").modal('show');
    });
</script>

<!-- Modal For Updating Products -->
<div class="modal hide fade" id="editProducts" style="margin-top: -205px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Edit Product</h3>
    </div>
    <!-- New Customer Form -->
    <form class="form-horizontal" method="POST" action="request.php?ref=put_product&id=<?=$product->id?>">

    <div style="padding:10px;">
            
                <!-- Name -->
              <div class="control-group">
                <label class="control-label" for="name">Product Name</label>
                <div class="controls">
                  <input type="text" id="name" name="name" placeholder="Product Name" value="<?=$product->name?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="unit_price">Unit</label>
                <div class="controls"> 
                  <select name="unit">
                      <?php foreach($units as $unit): ?>
                        <option <?=$unit == $product->unit ? 'selected' : ''?> ><?=$unit?></option>
                    <?php endforeach; ?>
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