<!--                Modal -->
<div id="Modal<?php echo $modal_id;?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $title;?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <b name="price" value="<?php echo $price;?>">Price: £<?php echo $price;?></b>/unit<br>
                <b name="item" value="<?php echo $title;?>">Description: </b><?php echo $des;?><br>
            </div>
            <form method="post" action="">
                <div class="modal-footer" >
                    <h4>Quantity: </h4>
                    <select name="quantity">
                        <?php
                        for ($x = 1; $x < 6; $x++) {
                            echo "<option value='" . $x . "'>&nbsp&nbsp " . $x . "&nbsp&nbsp</option>";
                        }
                        ?>
                    </select>

                    <!-- <h4>Quantity: <input type="number" name="quantity" id="quantity_<?php echo $modal_id;?>" min="1" max="5" required></h4>-->
                    <!-- <button type="button" class="btn-secondary rounded" onclick="quantityValidation(<?php echo $modal_id;?>)" data-dismiss="modal">Add</button>-->
                    <button type="button" class="btn-secondary rounded" onclick="addProduct(<?php echo $modal_id;?>)" data-dismiss="modal">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
