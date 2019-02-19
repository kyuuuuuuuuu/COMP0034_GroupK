<div >
    <!-- Modal content-->
    <div >
        <div class="">
            <h4 class=""><?php echo $des;?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div >
            <b>Price: <?php echo $p;?></b>/unit<br>
            <b>Description: </b>This is a description of this item.<br>
        </div>
        <form method="post" action="" onsubmit="return validateQ();">
            <div class="" >
                <h4>Quantity: <input type="number" id="burgerQuantity" min="1" max="5" ></h4>
                <!--                                required above doesnt work-->
                <button type="submit" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                <!--                                <p class="text-danger" id="error_para_quantity"></p>-->
            </div>
        </form>
    </div>
</div>