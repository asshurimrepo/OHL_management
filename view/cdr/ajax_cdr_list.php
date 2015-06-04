 <?php
 $grand_total = 0;
 $total_items = 0;
?>

<?php if(isset($_SESSION['cdr_products'])): ?>
<i class="cdr_counter" data-count="<?=count($_SESSION['cdr_products'])?>"></i>
<?php if(count($_SESSION['cdr_products']) >= 10): ?>

 <div id="RowsReachedAlert" class="alert dark-alert fade in">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="icon-info-sign icon-white"></i> Maximum number of <b>TEN (10)</b> transactions reached. To add more transactions please save this receipt and create a new one. Thank you.
                            </div>
<?php endif; ?>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr class="btn-inverse">
                                        <th width="18%">Quantity</th>
                                        <th width="18%">Unit</th>
                                        <th width="18%">Item</th>
                                        <th width="18%">Unit Price</th>
                                        <th width="22%">Total</th>
                                        <th width="100px"></th>
                                    <tr>
                                </thead>
                                <tbody id="receipt_rows">
                                   <?php foreach($_SESSION['cdr_products'] as $index=>$prod): $grand_total += $prod['total']; $total_items += $prod['qty']; ?>
                                   <tr>
                                    <td><?=$prod['qty']?></td>
                                    <td><?=$prod['unit']?></td>
                                    <td><?=$prod['item']?></td>
                                    <td><?=number_format($prod['price'],2)?></td>
                                    <td><?=number_format($prod['total'],2)?></td>
                                    <td>
                                        <a href="javascript:void(0)" class="tips edit_cdr_item" data-index="<?=$index?>" data-original-title="Edit <?=$prod['item']?> from list" data-toggle="modal" data-target="#editCDRProd"><i class="icon-edit icon-white"></i></a>
                                        <a href="javascript:void(0)" class="tips remove_cdr_item" data-index="<?=$index?>"  data-original-title="Remove <?=$prod['item']?> from list"><i class="icon-trash icon-white"></i></a>
                                    </td>
                                    </tr>
                                   <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><b>TOTAL ITEMS: <span id="total_items"><?=$total_items?></span> </b></td>
                                        <td style="text-align:right !important;"><b>GRAND TOTAL: </b></td>
                                        <td colspan="2"><b>Php <span id="grand_total"><?=number_format($grand_total,2)?></span></b></td>
                                    </tr>
                                </tfoot>
                            </table>
<?php  endif; ?>