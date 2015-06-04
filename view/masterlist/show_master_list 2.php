<?php if(isset($_SESSION['master'])): if(count($_SESSION['master'])): $masterlist = $_SESSION['master']; ?>
<?php $results = db_select('tbl_receipt, _customers', '*', "WHERE (tbl_receipt.Customer = _customers.CustomerID) AND tbl_receipt.RecordNumber IN(".implode(',',$masterlist).")"); ?>
<?php $new_master = array(); ?>

<div align="right">Total Receipts: <?=db_num_rows($results)?></div>
<table class="table table-condensed table-hover" style="width: 100%;" >
                                <thead>
                                    <tr class="btn-inverse">
                                        <th width="18%">Record Number</th>
                                        <th>Customer Name</th>
                                        <th>Total Items</th>
                                    <tr>
                                </thead>

                                <tbody>
                        <?php foreach($masterlist as $master): $row = db_select('tbl_receipt, _customers', '*', "WHERE (tbl_receipt.Customer = _customers.CustomerID) AND tbl_receipt.RecordNumber = $master", true); ?>
                                <tr style="cursor: pointer;" class="tips2 remove_from_master" data-original-title="Click to Remove from List" data-index="<?=$row->RecordNumber?>">
                                    <td><?=str_pad($row->RecordNumber, 10, "0", STR_PAD_LEFT)?></td>
                                    <td><?=$row->Name?></td>
                                    <td><?=$row->Total_Items?></td>
                                </tr>
                        <?php endforeach; ?>
                                </tbody>
</table>
<?php endif; endif; ?>