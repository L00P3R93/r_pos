<?php
header('Content-Type: application/json');
require '../../config.php';

$result = array(); $data = array();
$products = $DB::getQ('r_items',"uid>0",'*',null,'added_date','DESC');
$t = mysqli_num_rows($products);
$products = $DB::getQ('r_items',"uid>0",'*',null,'added_date','DESC',"$_REQUEST[start], $_REQUEST[length]");
while($row = mysqli_fetch_assoc($products)){
    $nest = array();
    $nest[] = $row["item_sku"];
    $nest[] = $UT::uni_name($row["item_name"]);
    $category_id = $row["category_id"];
    $nest[] = $DB::get_value('r_categories',"uid='$category_id'",'category_name');
    $nest[] = number_format($row['item_price'],2);
    $nest[] = $ST->get_username($row['user_id']);
    $nest[] = $row['added_date'];
    $nest[] = $UT::encurl($row["uid"]);
    $data[] = $nest;
}

$result['recordsTotal'] = $t;
$result['recordsFiltered'] =  $t;
$result['data'] = $data;

echo json_encode($result);
