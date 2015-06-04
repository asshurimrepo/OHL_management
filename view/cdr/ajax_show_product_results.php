<?php $units = array('SACHET(S)', 'SACK(S)', 'LITER(S)', 'GALLON(S)', 'CONTAINER(S)', 'PACK(S)', 'BOX(ES)', 'BUNDLE(S)', 'DOZEN(S)', 'PIECE(S)'); ?>
<table id="receipt_row_input" class="table table-condensed table-bordered">
                                <thead>
                                    <tr class="btn-inverse">
                                        <th>Item</th>
                                        <th>Unit</th>
                                        <th></th>
                                    <tr>
                                </thead>

                                <tbody>
                            <?php while($row = mysql_fetch_object($results)): ?>
                                    <tr class="add_to_cdr">
                                        <td class="text-info"><?=$row->name?></td>
                                        
                                        
                                        <td class="text-info">
                                            <select id="unit_<?=$row->id?>">
                                            <?php foreach($units as $unit): ?>
                                                <option <?=$unit == $row->unit ? 'selected' : ''?> ><?=$unit?></option>
                                            <?php endforeach; ?>
                                                
                                            </select>
                                        </td>

                                        <td style="width:20px;"><a href="javascript:void(0)" class="cdr_add_product tips" data-toogle="tooltip" data-original-title="Add <?=$row->name?>" data-prod-id="<?=$row->id?>" data-name="<?=$row->name?>"><i class="icon-plus icon-white"></i></a></td>
                                    </tr>
                            <?php endwhile; ?>
                                </tbody>
</table>