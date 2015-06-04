<!-- List of Customers -->
  <table id="custTable" class="table table-condensed table-bordered">
	<thead>
    	<tr class="btn-inverse">
    		<th>Customer Id</th>
    		<th>Name</th>
    		<th>Address</th>
    		<th>Contact</th>
            <th></th>
    	</tr>
    </thead>

    <tbody>
    <?php while($c = mysql_fetch_object($results)): ?>
    	<tr>
    		<td class="text-info" style="width:90px;"><?=$c->CustomerID?></td>
    		<td class="text-info"><?=$c->Name?></td>
    		<td class="text-info"><?=$c->Address?></td>
    		<td class="text-info"><?=$c->Contact?></td>

    		<td style="width:20px;"><a href="javascript:void(0)" class="cdr_select_customer tips" 
                data-CustomerID="<?=$c->CustomerID?>" data-name="<?=$c->Name?>" data-address="<?=$c->Address?>" data-toogle="tooltip" data-original-title="Create a Consignment Report for this Customer"><i class="icon-plus icon-white"></i></a></td>
    		
    	</tr>
    <?php endwhile; ?>
    </tbody>
</table>
