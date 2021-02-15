<?php
require '../../config.php';
if($_POST){
    $product_id = $UT::decurl($_POST["product_id"]);
    $user_id = $UT::decurl($_SESSION["pos_"]);
    $delete = $DB::delete('r_items',"uid='$product_id'");

    if($delete){
        $delete_qty = $DB::delete('r_section_quantity', "item_id='$product_id'");
        if($delete_qty){
            echo "$product_id Deleted Successfully";
            $DB::log("$product_id Deleted", $user_id);
        }
    }
}
?>

<script>setTimeout(function(){reload()}, 2000)</script>
