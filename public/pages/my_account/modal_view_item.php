<?php
$item_list = get_order_item ($db, $this_order_id);
?>
<!--                Modal -->
<div id="Modal<?php echo $modal_id;?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Viewing order ID: <?php echo $this_order_id;?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Will be delivered on: <u><?php echo $this_delivery_date;?></u>
                <br>
                </p>
                <table class='table table-striped text-center'>
                    <tr>
                        <td class='font-weight-bolder'>Item Name</td>
                        <td class='font-weight-bolder'>Quantity</td>
                        <td class='font-weight-bolder'>Item Price (£)</td>
                    </tr>
                <?php for ($j = 0; $j < count($item_list); $j++) {?>
                    <tr>
                        <td><?php echo $item_list[$j]['item_name'];?></td>
                        <td><?php echo $item_list[$j]['quantity'];?></td>
                        <td><?php echo $item_list[$j]['item_price'];?></td>
                    </tr>
                <?php }?>
                </table>

                <p>
                    <br>
                    <strong>Total Price</strong> is: <?php echo $this_total_price;?> (included delivery fee)
                </p>
            </div>

        </div>
    </div>
</div>