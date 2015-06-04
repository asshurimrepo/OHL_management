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
    <?php while($c = mysql_fetch_object($customers)): ?>
    	<tr>
    		<td class="text-info" style="width:90px;"><?=$c->CustomerID?></td>
    		<td class="text-info"><?=$c->Name?></td>
    		<td class="text-info"><?=$c->Address?></td>
    		<td class="text-info"><?=$c->Contact?></td>
    		<td style="width:40px;"><a href="?editCustomer=1&id=<?=$c->CustomerID?>#customers"><i class="icon-pencil icon-white"></i></a>
            &nbsp;<a href="#delete" data-toggle="modal" data-target="#deleteConfirm" data-link="request.php?ref=destroy_customer&id=<?=$c->CustomerID?>" class="re-delete"><i class="icon-trash icon-white"></i></a></td>
    	</tr>
    <?php endwhile; ?>
    </tbody>
</table>