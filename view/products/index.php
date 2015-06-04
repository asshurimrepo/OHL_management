<?php 
	$products = db_select('products', '*', 'ORDER BY name ASC');
?>

	<div class="pull-right" style="margin-bottom: 10px;">
	   	 <!--<a href="add_employee.php" class="btn" data-toggle="modal" data-target="#addProducts"><sup>+</sup><i class="icon-user icon-white"></i> Add New Product</a> --> 
         <a href="#" class="btn" data-toggle="modal" data-target="#addProducts"><sup>+</sup><i class="icon-user icon-white"></i> Add New Product</a> 
    </div>

    <br clear="all">



<!-- List of Products -->
  <table id="prodTable" class="table table-condensed table-bordered">
	<thead>
    	<tr class="btn-inverse">
    		<th>Product Id</th>
    		<th>Product Name</th>
            <th>Unit</th>
            <th></th> 
    	</tr>
    </thead>

    <tbody>
    <?php while($row = mysql_fetch_object($products)): ?>
    	<tr>
    		<td class="text-info" style="width:90px;"><?=$row->id?></td>
    		<td class="text-info"><?=$row->name?></td>
            <td class="text-info"><?=$row->unit?></td>
    		<td style="width:40px;"><a href="?editProduct=1&id=<?=$row->id?>#products"><i class="icon-pencil icon-white"></i></a>
            &nbsp;<a href="#delete" data-toggle="modal" data-target="#deleteConfirm" data-link="request.php?ref=destroy_products&id=<?=$row->id?>" class="delete"><i class="icon-trash icon-white"></i></a></td>
    	</tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php if(isset($_GET['editProduct'])): include 'view/products/edit.php'; endif; ?>
<?php include 'view/products/new.php'; ?>

