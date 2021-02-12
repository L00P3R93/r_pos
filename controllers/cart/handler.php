<?php
require '../../config.php';

if($_POST){
    switch ($_POST['action']){
        case "add":
            $cart->add_to_cart();
            break;
        case "minus":
            $cart->minus_from_cart();
            break;
        case "add_customer":
            $cart->add_customer_to_cart();
            break;
        case "remove":
            $cart->remove_from_cart();
            break;
        case "remove_customer":
            $cart->remove_customer_from_cart();
            break;
        case "empty":
            $cart->empty_cart();
            break;
    }
}
?>
<div class="header-cart-content flex-w js-pscroll">

    <?php
        if(isset($_SESSION["cart_item"])){ ?>
        <ul class="header-cart-wrapitem w-full">
    <?php
            foreach($_SESSION["cart_item"] as $it){ ?>
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="uploads/products/<?php echo $it["item_image"] ?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            <?php echo $it["item_name"] ?>
                        </a>

                        <span class="header-cart-item-info">
                        <?php echo $it["quantity"] ?> x <?php echo $it["item_price"]; ?>
                        <button onclick="cart_action('add', '<?php echo $it['item_id'] ?>')"><i class="zmdi zmdi-plus-box fs-25 m-l-40"></i></button>
                        <button onclick="cart_action('minus', '<?php echo $it['item_id'] ?>')"><i class="zmdi zmdi-minus-square fs-25 m-l-20"></i></button>
                        <button onclick="cart_action('remove', '<?php echo $it['item_id'] ?>')"><i class="zmdi zmdi-delete fs-25 m-l-20"></i></button>
                    </span>
                    </div>
                </li>
    <?php   } ?>
        </ul>
        <div class="w-full">
            <div class="header-cart-total w-full p-tb-15">
                <div class="form-group">
                    <input type="text" class="form-control" id="cart_search_customer" placeholder="Search Customers..">
                </div>
                <ul class="results" style="display: none"></ul>
            </div>
            <?php if(isset($_SESSION["cart_customer"])){ ?>
                <div class="header-cart-total w-full p-tb-15" id="cart_customer">
                    <?php foreach($_SESSION["cart_customer"] as $customer){ ?>
                        <ul class="list-group list-group-horizontal-sm">
                            <li class="list-group-item"><?php echo $customer["customer_name"] ?></li>
                            <li class="list-group-item"><button onclick="cart_action('remove_customer','<?php echo $customer["customer_id"] ?>')"><i class="zmdi zmdi-close"></i></button></li>
                        </ul>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="header-cart-total w-full p-tb-40">
                Total: <?php echo "Kes. ".number_format($cart->cart_total, 2); ?>
            </div>

            <div class="header-cart-buttons flex-w w-full">
                <button class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10 js-show-modal1">
                    Check Out
                </button>
            </div>
        </div>
    <?php
        }
        else{ ?>
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-txt p-t-8">
                        <a class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            No Items In Cart !
                        </a>
                    </div>
                </li>
            </ul>
    <?php
        } ?>

</div>

<script>
    $("#cart_search_customer").bind('keyup click', function(e){
        let search_str = $(this).val();
        if(search_str.length > 3){
            let search = `search=${search_str}`;
            console.log(search);
            $(".results").show();
            $(".results").attr('style','');
            search_post('controllers/search/cart_search.php', search,'.results','.results')
        }
    })

    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        $('.js-modal1').addClass('show-modal1');
        let params = "s=1";
        cart_post('controllers/cart/set_order.php',params, '.set_details')
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
        let params = "s=2";
        cart_post('controllers/cart/set_order.php',params, '.set_details')
        //reload();
    });
</script>