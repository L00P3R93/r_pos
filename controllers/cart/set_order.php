<?php
require '../../config.php';
if($_POST['s'] == '1'){ ?>
    <div class="row">
        <div class="col-md-7">
            <div class="m-l-15 m-r--38 m-lr-0-xl">
                <div class="wrap-table-shopping-cart order-cart-items" >
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Product</th>
                            <th class="column-2"></th>
                            <th class="column-3">Quantity X Price</th>
                            <th class="column-5">Total</th>
                        </tr>
                        <?php
                        if(isset($_SESSION["cart_item"])){
                            foreach($_SESSION["cart_item"] as $item){ ?>
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="uploads/products/<?php echo $item["item_image"] ?>" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2"><?php echo $item["item_name"] ?></td>
                                    <td class="column-3"><?php echo $item["quantity"] ?> X <?php echo number_format($item["item_price"],2); ?></td>
                                    <td class="column-5"><?php echo number_format(($item["quantity"]*$item["item_price"]), 2) ?></td>
                                </tr>
                            <?php   }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-40 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Cart Totals
                </h4>

                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="mtext-101 cl2">
                            Order:
                        </span>
                    </div>

                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            <?php echo $order->create_order(); ?>
                        </span>
                    </div>
                </div>

                <?php if(isset($_SESSION["cart_customer"])){ ?>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Customer:
                            </span>
                        </div>
                        <?php foreach ($_SESSION["cart_customer"] as $customer){ ?>
                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    <?php echo $customer["customer_name"] ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="flex-w flex-t p-t-27 p-b-33">
                    <div class="size-208">
                        <span class="mtext-101 cl2">
                            Total:
                        </span>
                    </div>

                    <div class="size-209 p-t-1">
                        <span class="mtext-110 cl2">
                            <?php echo "Kes. ".number_format($cart->cart_total, 2); ?>
                        </span>
                    </div>
                </div>

                <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer create-order" onclick="create_order()">
                    Create Order
                </button>
                <div class="flex-w flex-t p-t-10 p-b-10 processing_area"></div>
                <div class="flex-w flex-t p-t-15 p-b-10 feedback_area"></div>
            </div>
        </div>
    </div>
<?php }else{

} ?>

<script>
    $('.order-cart-items').overlayScrollbars({});
</script>
