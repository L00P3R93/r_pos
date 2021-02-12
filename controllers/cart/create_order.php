<?php
require '../../config.php';
date_default_timezone_set('Africa/Nairobi');
if($_POST){
    $order_no = $order->create_order();
    $counter = $order->counter;
    $order_items = $cart->cart_count;
    $order_amount = $cart->cart_total;
    $user_id = $UT::decurl($_SESSION["pos_"]);
    if(isset($_SESSION["cart_customer"]))
        $customer_id = $_SESSION["cart_customer"]["customer_id"];
    else
        $customer_id = 0;
    $fields = array('order_id','order_items','order_amount','user_id','customer_id','status','counter');
    $values = array("$order_no","$order_items","$order_amount","$user_id","$customer_id","1","$counter");
    $create_order = $DB::insert('r_orders',$fields,$values);
    if($create_order){
        $order_id = $DB::get_value('r_orders',"order_id='$order_no'","uid");
        $insert_order_items = 0;
        foreach($_SESSION["cart_item"] as $item){
            $item_sub_total = $item["quantity"]*$item["item_price"];
            $fds = array('order_id','item_id','item_quantity','item_price','item_sub_total');
            $val = array("$order_id","$item[item_id]","$item[quantity]","$item[item_price]","$item_sub_total");
            $insert_order_items += $DB::insert('r_order_items',$fds,$val);
        }
        if($insert_order_items == $order_items){
            echo $UT::success("Order: $order_no created Successfully!");
            if(isset($_SESSION["cart_item"]) or isset($_SESSION["cart_customer"])){
                unset($_SESSION["cart_item"]);
            }
        }
        elseif($insert_order_items < $order_items){
            echo $UT::warning("Order: $order_no created with $insert_order_items Items");
            if(isset($_SESSION["cart_item"]) or isset($_SESSION["cart_customer"])){
                unset($_SESSION["cart_item"]);
            }
        }
        else{
            echo $UT::error("Order: $order_no created with $insert_order_items Items.");
        }

    }else{
        echo $UT::error("Order could not be created!");
    }
}else{
    echo $UT::error("Oops! Something went wrong.");
}
?>

<script>setTimeout(function(){reload()},3000);</script>
