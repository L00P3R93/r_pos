<?php
require 'config.php';
$items = $insert_qty = 0;
$products = $DB::getQ('r_items',"uid!='22'");

while($p=mysqli_fetch_assoc($products)){
    $sections = $DB::getQ('r_user_sections',"status=1");
    while($s=mysqli_fetch_assoc($sections)){
        $flds = array('item_id','section_id','quantity');
        $vls = array("$p[uid]","$s[uid]","10");
        $insert_qty += $DB::insert('r_section_quantity',$flds,$vls);
    }
    $items += 1;
}

echo "Inserted Quantities for $insert_qty  $items items";
