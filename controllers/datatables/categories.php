<?php
header('Content-Type: application/json');
require '../../config.php';

$result = array(); $data = array();
$staff = $DB::getQ('r_categories',"status='1'",'*',null,'added_date','DESC');
$t = mysqli_num_rows($staff);
while($row = mysqli_fetch_assoc($staff)){
    $nest = array();
    $nest[] = $UT::uni_name($row["category_name"]);
    $nest[] = $ST->get_username($row['user_id']);
    $nest[] = $row['added_date'];
    $nest[] = $UT::admin_status($row['status']);
    $nest[] = $UT::encurl($row["uid"]);
    $data[] = $nest;
}

$result['recordsTotal'] = $t;
$result['recordsFiltered'] =  $t;
$result['data'] = $data;

echo json_encode($result);
