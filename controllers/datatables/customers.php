<?php
header('Content-Type: application/json');
require '../../config.php';

$result = array(); $data = array();
$staff = $DB::getQ('r_customers',"status='1'",'*',null,'added_date','DESC');
$t = mysqli_num_rows($staff);
$staff = $DB::getQ('r_customers',"status='1'",'*',null,'added_date','DESC',"$_REQUEST[start], $_REQUEST[length]");

while($row = mysqli_fetch_assoc($staff)){
    $nest = array();
    $nest[] = $row["first_name"];
    $nest[] = $row["second_name"];
    $nest[] = $row["last_name"];
    $nest[] = $row["email"];
    $nest[] = $row["phone"];
    $nest[] = $ST->get_username($row['user_id']);
    $nest[] = $UT::section_name($row["section_id"]);
    $nest[] = $UT::admin_status($row["status"]);
    $nest[] = $row['added_date'];
    $nest[] = $UT::encurl($row["uid"]);
    $data[] = $nest;
}

$result['recordsTotal'] = $t;
$result['recordsFiltered'] =  $t;
$result['data'] = $data;

echo json_encode($result);
