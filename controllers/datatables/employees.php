<?php
header('Content-Type: application/json');
require '../../config.php';

$result = array(); $data = array();
$staff = $DB::getQ('r_staff',"uid>0");
$t = mysqli_num_rows($staff);
while($row = mysqli_fetch_assoc($staff)){
    $nest = array();
    $nest[] = $row["first_name"];
    $nest[] = $row["last_name"];
    $nest[] = $row["primary_email"];
    $nest[] = $row["primary_phone"];
    $nest[] = $row["user_name"];
    $nest[] = $UT::userGroups($row["user_group"]);
    $nest[] = $UT::section_name($row["section"]);
    $nest[] = $UT::admin_status($row["status"]);
    $nest[] = $UT::encurl($row["uid"]);
    $data[] = $nest;
}

$result['recordsTotal'] = $t;
$result['recordsFiltered'] =  $t;
$result['data'] = $data;

echo json_encode($result);
