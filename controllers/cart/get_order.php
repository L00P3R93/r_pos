<?php
require '../../config.php';
if($_POST){
    $order = $DB::get('r_orders',"uid='$_POST[order_id]'");
    $order_items = $DB::getQ('r_order_items',"order_id='$_POST[order_id]'")
    ?>
    <div class="card">
        <div class="card bg-gradient-dark border-dark text-white fs-18">
            <img src="assets/images/paper/paper_5.jpg" class="card-img" alt="IMG_PAPER_BG" height="150">
            <div class="card-img-overlay">
                <h5 class="card-title"><?php echo $order["order_id"]; ?></h5>
                <p class="card-text">Order Amount: Kes. <?php echo number_format($order["order_amount"],2) ?></p>
                <p class="card-text">Created
                    <?php
                        try {echo $UT::time_elapsed_string($order["added_date"]);}
                        catch (Exception $e) {echo $e;}
                    ?>
                </p>
            </div>
        </div>
        <div class="card-body order_items">
            <?php
                if(mysqli_num_rows($order_items) > 0){
                    while($oi = mysqli_fetch_assoc($order_items)){ ?>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="uploads/products/<?php echo $DB::get_value('r_items',"uid='$oi[item_id]'","item_image") ?>" alt="ORDER_ITEM_IMG" width="100" height="100">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $DB::get_value('r_items',"uid='$oi[item_id]'","item_name") ?></h5>
                                        <p class="card-text"><?php echo $oi["item_quantity"] ?> X <?php echo number_format($oi["item_price"],2); ?></p>
                                        <p class="card-text"><small class="text-muted">Added <?php try{echo $UT::time_elapsed_string($oi["added_date"]);}catch (Exception $e){echo $e;} ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }else{
                    echo "<div class='justify-content-center fs-20 text-red'>No Items Available!</div>";
                }
            ?>
        </div>
    </div>
<?php } ?>

<script>
    //$(".order_items").overlayScrollbars({});
</script>
